<?php
// --------------------------------------------------
// ADMIN - LISTADO DE CONSULTAS
// --------------------------------------------------

$pageTitle = "Consultas recibidas";

// Configuración + conexión DB
require_once __DIR__ . "/../../includes/config.php";

// Header común del sitio
include __DIR__ . "/../../includes/header.php";

// --------------------------------------------------
// TRAER CONSULTAS DE LA BASE
// --------------------------------------------------

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
?>

<main class="container py-5">

    <h2 class="mb-4">Consultas recibidas</h2>

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
                            <td><?= htmlspecialchars($c['estado']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>

</main>

<?php include __DIR__ . "/../../includes/footer.php"; ?>
