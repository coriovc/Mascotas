<?php
// Este archivo se encarga de conectar a la base de datos y un objeto PDO
$contraseña = "123456";
$usuario = "postgres";
$nombreBaseDeDatos = "mascotas";
$rutaServidor = "localhost";
$puerto = "5432";
$base_de_datos = null;
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
 