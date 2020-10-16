<?php 
include "../funciones/funciones_doctores.php";
actualizarDoctor($_POST['id'],$_POST['nombre_completo'],$_POST['direccion'],$_POST['telefono']);
header("Location:../../form_doctor.php");