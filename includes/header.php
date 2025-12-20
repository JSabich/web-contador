<?php require_once __DIR__ . '/config.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sabich y Asociados - <?= $pageTitle ?? 'Estudio Contable' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">
</head>

<body>

    <header class="main-header fixed-top bg-dark text-white shadow-sm">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center py-3">

            <div class="d-flex align-items-center mb-3 mb-md-0">
                <img src="<?= BASE_URL ?>assets/images/logo_sabich.png" alt="Logo" width="140" class="me-3">
                <div class="small">
                    <div>Teléfono: 11-5724-2842</div>
                    <div>Email: estudiocontablesyg@live.com</div>
                </div>
            </div>

            <!-- MENÚ FIJO -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid p-0">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="mainMenu">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>pages/mi_estudio.php">Mi Estudio</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>pages/servicios.php">Servicios</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>pages/actualidad.php">Actualidad</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>pages/links_de_interes.php">Links de interés</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>pages/contacto.php">Contacto</a></li>
                        </ul>
                    </div>

                </div>
            </nav>

        </div>
    </header>

    <!-- Espaciado para compensar el header fijo -->
    <div style="height: 140px;"></div>