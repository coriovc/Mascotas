<?php 
include "../funciones/funciones_mascotas.php";
actualizarMascota($_POST['id'],$_POST['nombre'],$_POST['tipo'],$_POST['genero'],$_POST['fecha_nac'],$_POST['estado'],$_POST['propietario']);
header("Location:../../form_mascota.php");