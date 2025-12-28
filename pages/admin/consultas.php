<?php
// ==================================================
// CONFIGURACIÓN + CONEXIÓN
// ==================================================
require_once __DIR__ . "/../../includes/config.php";

// ==================================================
// PROTECCIÓN BÁSICA DEL ADMIN (HTTP AUTH)
// ==================================================
$ADMIN_USER = 'admin';
$ADMIN_PASS = 'WebContador2025!';

if (
    !isset($_SERVER['PHP_AUTH_USER']) ||
    $_SERVER['PHP_AUTH_USER'] !== $ADMIN_USER ||
    $_SERVER['PHP_AUTH_PW'] !== $ADMIN_PASS
) {
    header('WWW-Authenticate: Basic realm="Area Administrativa"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Acceso restringido.';
    exit;
}

// ==================================================
// ACTUALIZAR ESTADO DE CONSULTA (POST)
// ==================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['consulta_id'], $_POST['estado'])
) {
    $consulta_id = (int) $_POST['consulta_id'];
    $estado = $_POST['estado'];

    $estados_validos = ['nueva', 'respondida', 'cerrada'];

    if (in_array($estado, $estados_validos, true)) {

        $stmt = $mysqli->prepare(
            "UPDATE consultas SET estado = ? WHERE id = ?"
        );

        if ($stmt) {
            $stmt->bind_param("si", $estado, $consulta_id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// ==================================================
// OBTENER CONSULTAS
// ==================================================
$pageTitle = "Consultas recibidas";

$consultas = [];

if (!isset($mysqli)) {
    die("Error: conexión a base de datos no disponible.");
}

$sql = "
    SELECT
        id,
        nombre,
        email,
        telefono,
        mensaje,
        estado,
        created_at
    FROM consultas
    ORDER BY created_at DESC
";

$result = $mysqli->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $consultas[] = $row;
    }
    $result->free();
} else {
    die("Error al obtener consultas.");
}

// ==================================================
// HEADER
// ==================================================
include __DIR__ . "/../../includes/header.php";
?>

<main class="container py-5">

    <h2 class="mb-4">Consultas recibidas</h2>
    <div class="mb-3">
    <a href="<?= BASE_URL ?>pages/admin/exportar_consultas.php"
       class="btn btn-success">
        Exportar a CSV
    </a>
</div>


    <?php if (empty($consultas)): ?>
        <div class="alert alert-info">
            No hay consultas registradas.
        </div>
    <?php else: ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Mensaje</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $c): ?>
                        <tr>
                            <td><?= (int)$c['id'] ?></td>
                            <td><?= htmlspecialchars($c['created_at']) ?></td>
                            <td><?= htmlspecialchars($c['nombre']) ?></td>
                            <td><?= htmlspecialchars($c['email']) ?></td>
                            <td><?= htmlspecialchars($c['telefono'] ?? '') ?></td>
                            <td style="max-width: 400px;">
                                <?= nl2br(htmlspecialchars($c['mensaje'])) ?>
                            </td>
                            <td>
                                <form method="post" class="d-flex gap-2 align-items-center m-0">
                                    <input type="hidden" name="consulta_id" value="<?= (int)$c['id'] ?>">

                                    <select name="estado" class="form-select form-select-sm">
                                        <option value="nueva" <?= $c['estado'] === 'nueva' ? 'selected' : '' ?>>
                                            Nueva
                                        </option>
                                        <option value="respondida" <?= $c['estado'] === 'respondida' ? 'selected' : '' ?>>
                                            Respondida
                                        </option>
                                        <option value="cerrada" <?= $c['estado'] === 'cerrada' ? 'selected' : '' ?>>
                                            Cerrada
                                        </option>
                                    </select>

                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Guardar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>

</main>

<?php include __DIR__ . "/../../includes/footer.php"; ?>

