<?php
echo extension_loaded("sqlsrv") ? "SQLSRV instalado" : "SQLSRV NO instalado";

$serverName = "Isai\SQLEXPRESS01";

$connectionInfo = array(
    "Database" => "prematricula_colegio1",
    "UID" => "ISAI\DELL",              // o tu usuario
    "PWD" => "",   // tu contraseña
    "CharacterSet" => "UTF-8"
);
$conexion = sqlsrv_connect($serverName, $connectionInfo);

if ($conexion === false) {
    echo "<pre>";
    print_r(sqlsrv_errors());
    echo "</pre>";
    exit;
}

echo "Conexión exitosa";
?>