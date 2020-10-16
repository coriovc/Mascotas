<?php
    session_start(); 
    if (!empty($_SESSION['email']) && !empty($_SESSION['password'])){
        header('Location: menu.php'); 
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include_once ("php/head.php");?>
  <title>Bienvenido</title>
  <style type="text/css">
    .footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center !important;
  align-items: center !important;
  display: flex;      
  }
  </style>
</head>
<body>
<!--cabecera-->
        <header class="masthead">
            <div class="container d-flex tct h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="display-1 mx-auto my-0 text-white text-uppercase">Bienvenido</h1>                  
                    <a  href="#" data-toggle="modal" data-target="#staticBackdrop"class="btn shadow shadow-lg btn-light rounded-pill lift"><i class="material-icons-round">accessibility_new</i><strong>Iniciar</strong></a>
                </div>
            </div>
        </header>
<!--cabecera-fin-->
<div align="center" class="d-none d-md-block fixed-bottom justify-content-center mx-auto lift-img"><img src="img/patas.png" style="max-width: 30rem; margin-bottom: -1rem;" /></div>
<!--Modal-->
<div class="modal fade filter-dark tct" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal">
      <div class="modal-dialog" style="margin-top: 10rem;">
      <div class="modal-content">
                <div class="modal-body text-center ">
                <h1 class="p-2" id="staticBackdropLabel">Login</h1>
                <form method="post" action="autenticacion.php">
                  <div class="form-group">
                  <input class="form-control form-control-solid" type="email" id="email" name="email" required placeholder="Ejemplo: usuario@servidor.com"/>
                  </div>
                  <div class="form-group">
                  <input class="form-control form-control-solid" type="password" id="clave" name="clave" pattern="[A-Za-z0-9P.$_&]{6,8}" required placeholder="clave"/>
                  </div>            
                </div>
      </div>
      </div>
      <div class="row justify-content-center">
          <button type="submit" class="btn btn-primary shadow shadow-lg rounded-pill btn-sm shadow m-1">Acceder <i class="material-icons-round">send</i></button>

          <button type="reset"  class="btn btn-secondary shadow shadow-lg rounded-pill btn-sm shadow m-1">Limpiar <i class="material-icons-round">refresh</i></button>
                </form>
          <a href="#" data-dismiss="modal" class="btn shadow shadow-lg btn-icon btn-light m-1"><i class="material-icons-round">close</i></a>
      </div>
      <!--footer--> 
        <div style="margin-top: 8rem;" class="justify-content-center text-white mx-auto">
        <div class="text-center small">Designed by Victor corio CI-26.866.132 © 2020 Copyright.</div>
        <div class="text-center small">Ocor.Inc</div>
        </div><!--footer-fin-->
</div><!--Modal-fin-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</div>
</body>
</html>   
