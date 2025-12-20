<?php
$pageTitle = "Contacto";
require_once __DIR__ . "/../includes/config.php";
include __DIR__ . "/../includes/header.php";
?>

<main class="container py-5">

    <section class="mb-5">
        <h2 class="mb-3">Contacto</h2>
        <p>Complete el siguiente formulario y nos pondremos en contacto a la brevedad.</p>
    </section>

    <div class="card shadow-sm p-4">
        <form id="form-contacto" method="post" action="#">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono (opcional)</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>

            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-dark">Enviar consulta</button>
        </form>
    </div>

</main>

<?php include __DIR__ . "/../includes/footer.php"; ?>