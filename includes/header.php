<?php require_once __DIR__ . '/config.php'; ?>
<?php
function nav_active(string $file): string
{
    return basename($_SERVER['PHP_SELF']) === $file ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sabich y Asociados - <?= $pageTitle ?? 'Estudio Contable' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet"
        href="<?= BASE_URL; ?>assets/css/styles.css?v=<?= filemtime(__DIR__ . '/../assets/css/styles.css'); ?>">
</head>

<body>

<header class="fixed-top shadow-sm">

    <!-- ============================= -->
    <!-- BARRA SUPERIOR (NEGRA) -->
    <!-- ============================= -->
    <div class="bg-dark text-white">
        <div class="container py-3 d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">
                <img
                    src="<?= BASE_URL; ?>assets/images/logo_sabich.png?v=<?= filemtime(__DIR__ . '/../assets/images/logo_sabich.png'); ?>"
                    alt="Sabich y Asociados"
                    width="140"
                    class="me-3"
                >
                <div class="small">
                    <div>Teléfono: 11-5724-2842</div>
                    <div>Email: estudiocontablesyg@live.com</div>
                </div>
            </div>

        </div>
    </div>

    <!-- ============================= -->
    <!-- BARRA DE NAVEGACIÓN (AZUL) -->
    <!-- ============================= -->
    <div class="bg-primary">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-dark px-0">

                <button class="navbar-toggler ms-auto my-2"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#mainMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link <?= nav_active('index.php') ?>" href="<?= BASE_URL ?>">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link <?= nav_active('mi_estudio.php') ?>" href="<?= BASE_URL ?>pages/mi_estudio.php">Mi Estudio</a></li>
                        <li class="nav-item"><a class="nav-link <?= nav_active('servicios.php') ?>" href="<?= BASE_URL ?>pages/servicios.php">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link <?= nav_active('actualidad.php') ?>" href="<?= BASE_URL ?>pages/actualidad.php">Actualidad</a></li>
                        <li class="nav-item"><a class="nav-link <?= nav_active('recursos.php') ?>" href="<?= BASE_URL ?>pages/recursos.php">Recursos</a></li>
                        <li class="nav-item"><a class="nav-link <?= nav_active('contacto.php') ?>" href="<?= BASE_URL ?>pages/contacto.php">Contacto</a>    </li>
                    </ul>
                </div>

            </nav>

        </div>
    </div>

</header>

