<?php
    session_start(); 
    if (empty($_SESSION['email']) or empty($_SESSION['password'])){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header("location:index.php");
    }
        include("../funciones/funciones_mascotas.php");
        include("../funciones/funciones_clientes.php");
        $value = buscarMascota($_GET['id']); 
        $propietarios = listarClientes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset ="UTF -8">
  <meta name ="viewport" content ="width=device-width,initial-scale=1.0">
  <meta author ="jodocha">
  <title>Modificar - <?php echo $value->nombre; ?></title>
  <!-- Estilos-->
  <link rel="icon"                       href="../../img/favicon.png"> 
  <link rel="stylesheet"                 href="../../css/estilos.css">
  <link rel="stylesheet" type="text/css" href="../../css/nav-style.css">
  <link rel="stylesheet"                 href="../../css/blur.css">
  <link rel="stylesheet"                 href="../../css/styles-new.css">
  <link rel="stylesheet" type="text/css" href="../../vendor/fontawesome-free/css/all.css" >
  <link rel="stylesheet"                 href="../../css/icon.css">
  <link rel="stylesheet"                 href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" >
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Roboto&display=swap" rel="stylesheet">
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
      <div class="row p-2 justify-content-center">
      <!--imagen-->
      <div class="d-none d-md-block"><img class="img-fluid" src="../../img/mascota.png" style="margin-right: -5rem; margin-top: 15rem; max-width: 20rem;"/></div>
      <!--imagen fin-->
      <div class="card border-0 shadow" style="width: 30rem;">
        <div class="display-5 card-header text-secondary tct">Formulario Mascotas</div>    
          <div class="card-body tct">                
        <form action="../guardarcambios/guardarcambios_mascota.php" method="post"> 
          <fieldset>
              <div class="form-group row">
                <div class="col">
                  <label>Nombre</label><input type="txt" class="form-control" name="nombre" id="nombre" value="<?php echo $value->nombre; ?>" required>
                </div>              
              </div>
                <div class="form-group row">
                <div class="col was-validated">                  
                  <label>Tipo</label>
                  <select class="form-control custom-select form-control-solid" name="tipo" required>
                    <option value="<?php echo $value->tipo; ?>"><?php echo $value->tipo; ?></option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                  </select>
                </div>
                
                <div class="col was-validated">                  
                  <label>Genero</label>
                  <select class="form-control custom-select form-control-solid" name="genero" required>
                    <option value="<?php echo $value->genero; ?>"><?php echo $value->genero; ?></option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                  </select>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-5 was-validated">                  
                  <label>Estado</label>
                  <select class="form-control custom-select form-control-solid" name="estado" required>
                    <option value="<?php echo $value->estado; ?>"><?php echo $value->estado; ?></option>
                    <option value="Vivo">Vivo</option>
                    <option value="Muerto">Muerto</option>
                  </select>
                </div>
                
                <div class="col">
                  <label>Fecha de nacimiento</label>
                  <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" value="<?php echo $value->fecha_nac; ?>" required>
                </div>
                </div>
              <div class="form-group row">                
              <div class="col was-validated">
                  <label>Propietario</label>
                  <select class="form-control custom-select form-control-solid" name=propietario required>
                  <?php 
    if(count($propietarios)) foreach($propietarios as $p){ 
        echo '<option value="'.$p->id.'" '.($value->propietario == $p->id ? 'selected':'').'>'.$p->nombre_completo.'</option>';
     } ?>              </select>
            </div>
            </fieldset>    
        </div>
         <div class="card-footer" align="center">          
          <button type="submit" class="btn btn-sm tct btn-outline-secondary rounded-pill">
            Actualizar<i class="material-icons-round">check_circle</i></button>                 
        </div>

        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
        </form>
      </div>
      </div>
<!--formulario-fin-->
<!--boton regresar -->
        <div class="row justify-content-center mt-5 mb-2">
        <a href="javascript:history.back()" class="btn tct shadow shadow-lg btn-light rounded-pill lift"><i class="material-icons-round">arrow_back</i>Regresar</a>
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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../js/sb-admin-2.min.js"></script>
  <script src="../../https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html> 


 