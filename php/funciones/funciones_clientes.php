<?php
// Este archivo se encarga de conectar a la base de datos y un objeto PDO
//Cliente------------------------------------------------------------------------------------
function insertarCliente($n,$d,$t){
	require "../../conexion.php";
	    $sql = "INSERT INTO clientes(nombre_completo,direccion,telefono,borrado,fecha_add) VALUES ('$n','$d','$t','n',current_date);";
    $consulta = $base_de_datos->query( $sql );
    
}

function actualizarCliente($i,$n,$d,$t){
	require "../../conexion.php";
	    $sql = "UPDATE clientes SET nombre_completo='$n',direccion='$d',telefono='$t' WHERE id='$i'";
    $consulta = $base_de_datos->query( $sql );
}

function eliminarCliente($i){
	require "../conexion.php";
	    $sql = "UPDATE clientes SET borrado='s' WHERE id='$i'";
    $consulta = $base_de_datos->query( $sql );
}

function listarClientes(){
	require "conexion.php";
	    $sql = "SELECT * FROM clientes WHERE borrado='n' order by id";
    $consulta = $base_de_datos->query( $sql );
    return $consulta->fetchAll(PDO::FETCH_OBJ);
}

function buscarCliente($id){
	require "../../conexion.php";
	$sql = "SELECT * FROM clientes WHERE borrado='n' AND id='$id'";
    $consulta = $base_de_datos->query( $sql );
    $r = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $r[0];
}
