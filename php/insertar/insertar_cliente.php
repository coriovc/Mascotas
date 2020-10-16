<?php 
include "../funciones/funciones_clientes.php";
insertarCliente($_POST['nombre_completo'],$_POST['direccion'],$_POST['telefono']);
header("Location:" . $_SERVER['HTTP_REFERER']);
