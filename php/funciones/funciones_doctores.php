<?php
// Este archivo se encarga de conectar a la base de datos y un objeto PDO
// Doctor------------------------------------------------------------------------------------
function insertarDoctor($n,$d,$t){
	require "../../conexion.php";
	    $sql = "INSERT INTO doctores(nombre_completo,direccion,telefono,borrado,fecha_add) VALUES ('$n','$d','$t','n',current_date);";
    $consulta = $base_de_datos->query( $sql );
}

function actualizarDoctor($i,$n,$d,$t){
	require "../../conexion.php";
	    $sql = "UPDATE doctores SET nombre_completo='$n',direccion='$d',telefono='$t' WHERE id='$i'";
    $consulta = $base_de_datos->query( $sql );
}

function eliminarDoctor($i){
	require "../conexion.php";
	    $sql = "UPDATE doctores SET borrado='s' WHERE id='$i'";
    $consulta = $base_de_datos->query( $sql );
}

function listarDoctores(){
	require "conexion.php";
	    $sql = "SELECT * FROM doctores WHERE borrado='n' order by id";
    $consulta = $base_de_datos->query( $sql );
    return $consulta->fetchAll(PDO::FETCH_OBJ);
}

function buscarDoctor($id){
	require "../../conexion.php";
	$sql = "SELECT * FROM doctores WHERE borrado='n' AND id='$id'";
    $consulta = $base_de_datos->query( $sql );
    $r = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $r[0];
}