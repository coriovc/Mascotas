<?php
    session_start(); 
    if (empty($_SESSION['email']) or empty($_SESSION['password'])){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header("location:index.php");
    }
        require("../funciones/funciones_clientes.php");
        $value = buscarCliente($_GET['id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset ="UTF -8">
  <meta name ="viewport" content ="width=device-width,initial-scale=1.0">
  <meta author ="jodocha">
  <title>Modificar - <?php echo $value->nombre_completo; ?></title>
  <!-- Estilos-->
  <link rel="icon"                       href="../../img/favicon.png"> 
  <link rel="stylesheet"                 href="../../css/estilos.css">
  <link rel="stylesheet" type="text/css" href="../../css/nav-style.css">
  <link rel="stylesheet"                 href="../../css/blur.css">
  <link rel="stylesheet"                 href="../../css/styles-new2.css">
  <link rel="stylesheet"                 href="../../css/styles-new.css">
  <link rel="stylesheet" type="text/css" href="../../vendor/fontawesome-free/css/all.css" >
  <link rel="stylesheet"                 href="../../css/icon.css">
  <link rel="stylesheet"                 href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" >
  <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css" >
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Roboto&display=swap" rel="stylesheet">
  <!-- scripts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
  .masthead {
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 1rem 0;
    background: linear-gradient(to bottom, rgba(155, 0, 199, 0.3) 0%, rgba(105, 0, 199, 0.7) 80%, #6900c7 100%), url("../../img/img.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
  }
  </style>
</head>
<body>
<div class="masthead">
<div style="margin-top:1rem;">
<!--formulario-->
        <div class="row justify-content-center">
        <div class="card border-0 shadow" style="width: 25rem;">
        <div class="display-4 card-header text-secondary tct">Modificar</div>    
        <div class="card-body tct">                
        <form action="../guardarcambios/guardarcambios_cliente.php" method="post"> 
          <fieldset>
            <div class="form-group row">
              <div class="col">
                <label>Nombre Completo</label><input type="txt" class="form-control" name="nombre_completo" id="nombre" value="<?php echo $value->nombre_completo; ?>" required>
              </div>
            </div>
              <div class="form-group row">
              <div class="col">
                 <label>Direccion</label><input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $value->direccion; ?>" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col">
                <label>Telefono</label><input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $value->telefono; ?>" required>
              </div>
            </div>
          </fieldset>       
        </div>
        <div class="card-footer" align="center">          
          <button type="submit" class="btn btn-sm tct btn-outline-secondary rounded-pill lift">
            Actualizar<i class="material-icons-round">check_circle</i></button>                 
        </div>

        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
        </form>
      </div>
      <!--imagen-->
      <div class="d-none d-md-block mt-2 lift-img-X-r"><img class="img-fluid" src="../../img/cliente.png" style="margin-left: -1rem; max-width: 12rem;"/></div>
      <!--imagen fin-->
      </div>
<!--formulario-fin-->
<!--boton regresar -->
        <div class="row justify-content-center mt-5 mb-2">
        <a href="javascript:history.back()" class="btn shadow shadow-lg btn-light rounded-pill"><i class="material-icons-round">arrow_back</i><strong>Regresar</strong></a>
        </div>
<!--boton regresar fin-->
</div>
<!--footer-->
<div class="footer">
    <div class="justify-content-center mx-auto">
    <div class="text-center tct text-white small">Designed by Victor corio CI-26.866.132 © 2020 Copyright.</div>
    <div class="text-center tct text-white small">Ocor.Inc</div>
    </div>
</div>
<!--footer-fin-->
</div>
<!-- scripts-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html> 


 