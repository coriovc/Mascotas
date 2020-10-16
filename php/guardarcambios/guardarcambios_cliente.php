<?php 
include "../funciones/funciones_clientes.php";
actualizarCliente($_POST['id'],$_POST['nombre_completo'],$_POST['direccion'],$_POST['telefono']);
header("Location:../../form_cliente.php");