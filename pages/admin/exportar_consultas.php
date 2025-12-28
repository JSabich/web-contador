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
// OBTENER DATOS
// ==================================================
if (!isset($mysqli)) {
    die("Conexión a base de datos no disponible.");
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

if (!$result) {
    die("Error al obtener datos.");
}

// ==================================================
// CABECERAS CSV
// ==================================================
$filename = 'consultas_' . date('Ymd_His') . '.csv';

header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// BOM para Excel (UTF-8)
echo "\xEF\xBB\xBF";

// ==================================================
// SALIDA CSV
// ==================================================
$output = fopen('php://output', 'w');

// Encabezados
fputcsv($output, [
    'ID',
    'Nombre',
    'Email',
    'Teléfono',
    'Mensaje',
    'Estado',
    'Fecha'
]);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['nombre'],
        $row['email'],
        $row['telefono'],
        $row['mensaje'],
        $row['estado'],
        $row['created_at']
    ]);
}

fclose($output);
exit;
