<?php 
include "../funciones/funciones_mascotas.php";
insertarMascota($_POST['nombre'],$_POST['tipo'],$_POST['genero'],$_POST['fecha_nac'],$_POST['estado'],$_POST['propietario']);
header("Location:" . $_SERVER['HTTP_REFERER']);
