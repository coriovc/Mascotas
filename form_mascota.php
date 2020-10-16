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
  <title>Mascota</title>
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
            <li class="nav-item mr-2"><a class="btn btn-transparent-dark rounded-pill" href="form_cliente.php"><i class="mr-2 material-icons-round">emoji_people</i>Clientes</a>
            </li>
            <li class="nav-item mr-2"><a class="btn btn-transparent-dark rounded-pill" href="form_doctor.php"><i class="mr-2 material-icons-round">person</i>Doctores</a>
            </li>
            <li class="nav-item mr-2"><a class="btn alert-secondary text-secondary rounded-pill border-0" href="#!"><i class="mr-2 material-icons-round">pets</i>Mascotas</a>
            </li>
          </div>
        </ul>
<!--nav-fin-->
  <div style="margin-top:3rem;">
<!--formulario-->
      <div class="row p-2 justify-content-center">
      <!--imagen-->
      <div class="d-none d-md-block lift-img-X-l"><img class="img-fluid" src="img/mascota.png" style="margin-right: -5rem; margin-top: 15rem; max-width: 20rem;"/></div>
      <!--imagen fin-->
      <div class="card border-0 shadow" style="width: 30rem;">
        <div class="display-5 card-header text-secondary tct">Formulario Mascotas</div>    
          <div class="card-body tct">                
          <form action="php/insertar/insertar_mascota.php" method="post"> 
            <fieldset>
              <div class="form-group row">
                <div class="col">
                  <label>Nombre</label><input type="txt" class="form-control" name="nombre" id="nombre" required>
                </div>              
              </div>
                <div class="form-group row">
                <div class="col was-validated">                  
                  <label>Tipo</label>
                  <select class="form-control custom-select form-control-solid" name="tipo" required>
                    <option value="">seleccionar</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                  </select>
                </div>
                
                <div class="col was-validated">                  
                  <label>Genero</label>
                  <select class="form-control custom-select form-control-solid" name="genero" required>
                    <option value="">seleccionar</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                  </select>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-5 was-validated">                  
                  <label>Estado</label>
                  <select class="form-control custom-select form-control-solid" name="estado" required>
                    <option value="">seleccionar</option>
                    <option value="Vivo">Vivo</option>
                    <option value="Muerto">Muerto</option>
                  </select>
                </div>
                
                <div class="col">
                  <label>Fecha de nacimiento</label>
                  <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" required>
                </div>
                </div>
              <div class="form-group row">                
              <div class="col was-validated">
                  <label>Propietario</label>
                  <select class="form-control custom-select form-control-solid" name=propietario required>
                    <option value="">seleccionar</option>
                    <?php include('php/funciones/funciones_clientes.php');
                        $l = listarClientes();
                        if($l && count($l)){
                            foreach ($l as $key => $value) {
                        ?><option value="<?php echo $value->id; ?>"><?php echo $value->nombre_completo; ?></option><?php
                              }
                            }
                          ?>
                  </select>
              </div>
            </fieldset>       
        </div>
        <div class="card-footer" align="center">
          <button type="submit" id="submit" class="btn btn-sm tct btn-outline-secondary shadow shadow-lg rounded-pill">Agregar<i class="material-icons-round">add_circle</i></button>          
          <button type="reset" class="btn btn-sm tct btn-transparent-dark rounded-pill">Limpiar<i class="material-icons-round">refresh</i></button>        
        </div>
        </form>
      </div>
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
          <div class="display-5 card-header text-secondary tct">Gestión de copias de respaldo Mascotas</div> 
                    <div class="datatable table-responsive">
                        <table class="table" >
                          <thead class="thead-dark">
                          <tr>
                            <td><strong>id</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Tipo</strong></td>
                            <td><strong>Genero</strong></td>
                            <td><strong>Fecha de nacimiento</strong></td>
                            <td><strong>Estado</strong></td>
                            <td><strong>Propietario</strong></td>
                            <td align="right"><strong>Acciones</strong></td>
                          </tr>
                        </thead>
                        <?php include('php/funciones/funciones_mascotas.php');
                        $l = listarMascotas();
                        if($l && count($l)){
                            foreach ($l as $key => $value) {
                        ?>
                        <tbody>
                          <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->nombre; ?></td>
                            <td><?php echo $value->tipo; ?></td>
                            <td><?php echo $value->genero; ?></td>
                            <td><?php echo $value->fecha_nac; ?></td>
                            <td><?php echo $value->estado; ?></td>
                            <td><?php echo $value->nombre_completo; ?></td>
                            <td align="right">
                            <a class="btn btn-sm tct text-white btn-secondary rounded-pill lift-img-X-l" title="Editar: <?php echo $value->nombre; ?>" href="php/modificar/modificar_mascota.php?id=<?php echo $value->id; ?>"><i class="material-icons-round">create</i>Editar</a>
                            <a class="btn btn-sm tct text-white btn-danger rounded-pill" title="Eliminar: <?php echo $value->nombre; ?>" onclick="document.forms.mascota_<?php echo $value->id; ?>.submit();"><i class="material-icons-round">delete</i>Eliminar</a>
                            <form name="mascota_<?php echo $value->id; ?>" action="php/eliminar.php" method="post"><input type="hidden" name="id" value="<?php echo $value->id; ?>"></form>
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


 