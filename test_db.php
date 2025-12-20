<?php
require_once __DIR__ . '/includes/config.php';
try {
    $pdo = getPDO();
    echo "Conexión OK a DB: " . DB_NAME . "<br>";
    $r = $pdo->query("SELECT NOW() as now")->fetch();
    echo "Servidor MySQL responde: " . $r['now'];
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
