<?php
    session_start(); 
    if (empty($_SESSION['email']) or empty($_SESSION['password'])){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include_once ("php/head.php");?>
  <title>Cliente</title>
  <style type="text/css">
  .masthead {
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 1rem 0;
    background: linear-gradient(to bottom, rgba(155, 0, 199, 0.3) 0%, rgba(105, 0, 199, 0.7) 80%, #6900c7 100%), url("img/img.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
  }
  </style>
</head>
<body>
<div class="masthead">
<!--nav-->
        <ul class="ulnav py-2 navbar-nav align-items-center fixed-top shadow shadow-lg ml-auto tct">
          <div class="row justify-content-center">
            <li class="nav-item mr-2"><a class="btn alert-secondary text-secondary rounded-pill  border-0" href="#!"><i class="mr-2 material-icons-round">emoji_people</i>Clientes</a>
            </li>
            <li class="nav-item mr-2"><a class="btn btn-transparent-dark rounded-pill" href="form_doctor.php"><i class="mr-2 material-icons-round">person</i>Doctores</a>
            </li>
            <li class="nav-item mr-2"><a class="btn btn-transparent-dark rounded-pill" href="form_mascota.php"><i class="mr-2 material-icons-round">pets</i>Mascotas</a>
            </li>
          </div>
        </ul>
<!--nav-fin-->
  <div style="margin-top:3rem;" >
<!--formulario-->
      <div class="row p-2 justify-content-center">
        <div class="card border-0 shadow" style="width: 25rem;">
        <div class="display-5 card-header text-secondary tct">Formulario Cliente</div>    
        <div class="card-body tct">                
        <form action="php/insertar/insertar_cliente.php" method="post"> 
          <fieldset>
              <div class="form-group row">
                <div class="col">
                  <label>Nombre Completo</label><input type="txt" class="form-control" name="nombre_completo" id="nombre" required>
                </div>
              </div>
                <div class="form-group row">
                <div class="col">
                   <label>Direccion</label><input class="form-control" type="text" name="direccion" id="direccion" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col">
                  <label>Telefono</label><input type="text" class="form-control" name="telefono" id="telefono" required>
                </div>
              </div>
            </fieldset>       
        </div>
          <div class="card-footer" align="center">
            <button type="submit" class="btn btn-sm tct btn-outline-secondary shadow shadow-lg rounded-pill">Agregar<i class="material-icons-round">add_circle</i></button>          
            <button type="reset" class="btn btn-sm tct btn-transparent-dark rounded-pill">Limpiar<i class="material-icons-round">refresh</i></button>
          </div>
        </form>
      </div>
      <!--imagen-->
      <div class="d-none d-md-block mt-2 lift-img-X-r"><img class="img-fluid" src="img/cliente.png" style="margin-left: -1rem; max-width: 12rem;"/></div>
      <!--imagen fin-->
      </div>
<!--formulario-fin-->
<!--boton-volver-->
        <div class="row justify-content-center m-2">
          <a href="menu.php" class="btn shadow shadow-lg btn-light rounded-pill lift-img-X-l">
          <i class="material-icons-round">arrow_back</i><strong>Regresar al menú</strong></a>
        </div>
<!--boton-volver-fin-->
<!--Tabla-->
        <div class="row p-2 justify-content-center">
        <div class="card" style="width: 70rem;">
              <div class="display-5 card-header text-secondary tct">Gestión de copias de respaldo</div> 
                  <div class="datatable table-responsive">
                      <table class="table table-hover" width="100%">
                        <thead>
                          <tr>
                            <td><strong>id</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Dirección</strong></td>
                            <td><strong>Teléfono</strong></td>
                            <td align="right"><strong>Acciones</strong></td>
                          </tr>
                        </thead>
                        <?php include('php/funciones/funciones_clientes.php');
                        $l = listarClientes();
                        if($l && count($l)){
                            foreach ($l as $key => $value) {
                        ?>
                        <tbody>
                          <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->nombre_completo; ?></td>
                            <td><?php echo $value->direccion; ?></td>
                            <td><?php echo $value->telefono; ?></td>
                            <td align="right">
                            <a class="btn btn-sm tct text-white btn-secondary rounded-pill lift-img-X-l" title="Editar: <?php echo $value->nombre_completo; ?>" href="php/modificar/modificar_cliente.php?id=<?php echo $value->id; ?>"><i class="material-icons-round">create</i>Editar</a>
                            <a class="btn btn-sm tct text-white btn-danger rounded-pill" title="Eliminar: <?php echo $value->nombre_completo; ?>" onclick="document.forms.cliente_<?php echo $value->id; ?>.submit();"><i class="material-icons-round">delete</i>Eliminar</a>
                            <form name="cliente_<?php echo $value->id; ?>" action="php/eliminar.php" method="post"><input type="hidden" name="id" value="<?php echo $value->id; ?>"></form>
                            </td>              
                          </tr>
                          <?php                            
                              }
                            }
                          ?>     
                        </tbody>
                      </table>
                  </div>              
        </div>
        </div>
<!--Tabla-fin-->
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html> 


 