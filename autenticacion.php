<?php
    session_start();
    include_once('conexion.php');
    $email = $_POST["email"];
    $passwd  = $_POST['clave'];
    $password  = $passwd;//crypt($passwd,"##");
    $sql = "SELECT * FROM usuarios  WHERE email =  '$_REQUEST[email]'";
    $consulta = $base_de_datos->query( $sql );
    $fila = $consulta->fetchAll(PDO::FETCH_OBJ);
  
    if ( $fila[0]->clave == $password ) {
        $_SESSION["email"]    = $fila[0]->email;
        $_SESSION["password"] = $fila[0]->clave;
        header("location:menu.php");
        die();
    }
    else{
    header("location: index.php?error=1");
} die();
        
