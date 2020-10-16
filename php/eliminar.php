<?php 
include "funciones/funciones_clientes.php";
eliminarCliente($_POST['id'] );
include "funciones/funciones_doctores.php";
eliminarDoctor($_POST['id'] );
include "funciones/funciones_mascotas.php";
eliminarMascota($_POST['id'] );
header("Location:" . $_SERVER['HTTP_REFERER']);