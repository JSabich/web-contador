<?php
// --------------------------------------------------
// CONFIGURACIÓN INICIAL
// --------------------------------------------------
$pageTitle = "Contacto";

require_once __DIR__ . "/../includes/config.php";
include __DIR__ . "/../includes/header.php";

// --------------------------------------------------
// PROCESAMIENTO DEL FORMULARIO
// --------------------------------------------------
$mensaje_ok = false;
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ----------------------------------------------
    // HONEYPOT ANTI-SPAM
    // ----------------------------------------------
    if (!empty($_POST['empresa'])) {
        exit; // bot detectado
    }

    // ----------------------------------------------
    // DATOS
    // ----------------------------------------------
    $nombre   = trim($_POST["nombre"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $telefono = trim($_POST["telefono"] ?? "");
    $mensaje  = trim($_POST["mensaje"] ?? "");

    // ----------------------------------------------
    // VALIDACIONES
    // ----------------------------------------------
    if ($nombre === "" || $email === "" || $mensaje === "") {
        $mensaje_error = "Por favor complete los campos obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje_error = "El correo electrónico no es válido.";
    } elseif (strlen($mensaje) > 2000) {
        $mensaje_error = "El mensaje es demasiado largo.";
    } else {

        // ------------------------------------------
        // INSERT EN BASE DE DATOS
        // ------------------------------------------
        if (!isset($mysqli)) {
            error_log("Conexión MySQL no disponible");
            $mensaje_error = "Ocurrió un error. Intente más tarde.";
        } else {

            $stmt = $mysqli->prepare(
                "INSERT INTO consultas
                 (nombre, email, telefono, mensaje, ip, user_agent)
                 VALUES (?, ?, ?, ?, ?, ?)"
            );

            if (!$stmt) {
                error_log("Prepare error: " . $mysqli->error);
                $mensaje_error = "Ocurrió un error. Intente más tarde.";
            } else {

                $ip = $_SERVER["REMOTE_ADDR"] ?? null;
                $user_agent = $_SERVER["HTTP_USER_AGENT"] ?? null;

                $stmt->bind_param(
                    "ssssss",
                    $nombre,
                    $email,
                    $telefono,
                    $mensaje,
                    $ip,
                    $user_agent
                );

                if ($stmt->execute()) {
                    $mensaje_ok = true;
                    $_POST = [];
                } else {
                    error_log("Execute error: " . $stmt->error);
                    $mensaje_error = "Ocurrió un error. Intente más tarde.";
                }

                $stmt->close();
            }
        }
    }
}
?>

<main class="container py-5">

    <section class="mb-5">
        <h2 class="mb-3">Contacto</h2>
        <p>Complete el siguiente formulario y nos pondremos en contacto a la brevedad.</p>
    </section>

    <?php if ($mensaje_ok): ?>
        <div class="alert alert-success">
            La consulta fue enviada correctamente.
        </div>
    <?php elseif ($mensaje_error): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($mensaje_error) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm p-4">
        <form method="post" action="">
            
            <!-- Honeypot anti-spam -->
            <input type="text" name="empresa" style="display:none">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text"
                           class="form-control"
                           id="nombre"
                           name="nombre"
                           value="<?= htmlspecialchars($_POST["nombre"] ?? "") ?>"
                           required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"
                           required>
                </div>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono (opcional)</label>
                <input type="text"
                       class="form-control"
                       id="telefono"
                       name="telefono"
                       value="<?= htmlspecialchars($_POST["telefono"] ?? "") ?>">
            </div>

            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control"
                          id="mensaje"
                          name="mensaje"
                          rows="5"
                          required><?= htmlspecialchars($_POST["mensaje"] ?? "") ?></textarea>
            </div>

            <button type="submit" class="btn btn-dark">
                Enviar consulta
            </button>
        </form>
    </div>

</main>

<?php include __DIR__ . "/../includes/footer.php"; ?>
