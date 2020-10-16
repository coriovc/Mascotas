<?php
// Este archivo se encarga de conectar a la base de datos y un objeto PDO
//Mascota------------------------------------------------------------------------------------
function insertarMascota($n,$t,$g,$fn,$e,$p){
	require "../../conexion.php";
	    $sql = "INSERT INTO mascotas(nombre,tipo,genero,fecha_nac,estado,propietario,borrado,fecha_add) VALUES ('$n','$t','$g','$fn','$e','$p','n',current_date);";
    $consulta = $base_de_datos->query( $sql );
}

function actualizarMascota($i,$n,$t,$g,$fn,$e,$p){
	require "../../conexion.php";
	    $sql ="UPDATE mascotas SET nombre='$n',tipo='$t',genero='$g',fecha_nac='$fn',estado='$e',propietario='$p' WHERE id='$i'";
    $consulta = $base_de_datos->query( $sql );
}

function eliminarMascota($i){
	require "../conexion.php";
	    $sql = "UPDATE mascotas SET borrado='s' WHERE id='$i'";
    $consulta = $base_de_datos->query( $sql );
}

function listarMascotas(){
	require "conexion.php";
	   $sql = "SELECT mascotas.*,clientes.nombre_completo FROM mascotas 
		INNER JOIN clientes ON mascotas.propietario = clientes.id
	    WHERE mascotas.borrado='n' AND clientes.borrado='n'";
    $consulta = $base_de_datos->query( $sql );
    return $consulta->fetchAll(PDO::FETCH_OBJ);
}

function buscarMascota($id){
	require "../../conexion.php";
	$sql = "SELECT mascotas.*,clientes.nombre_completo FROM mascotas 
		INNER JOIN clientes ON mascotas.propietario = clientes.id
	    WHERE mascotas.borrado='n' AND clientes.borrado='n' AND mascotas.id='$id'";
    $consulta = $base_de_datos->query( $sql );
    $r = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $r[0];
}


 