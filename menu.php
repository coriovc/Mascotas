<?php
    session_start(); 
    if (empty($_SESSION['email']) or empty($_SESSION['password'])){
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once ("php/head.php");?>
<title>Menu</title>
<style type="text/css">
  body{
    background-color: #fff;
  }
</style>
</head>
<body>
<!--nav-->
      <nav class="fixed-top">
			  <ul class="ulnav py-2 align-items-center shadow shadow-lg tct">
			    <div class="row justify-content-center">
			    	<li class="nav-item mr-2">
				        <a class="btn alert-secondary text-secondary rounded-pill  border-0" href="#!">
				          Inicio</a>
				    </li>

				    <li class="nav-item mr-2">
				    <a class="btn btn-transparent-dark rounded-pill dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tablas</a>
	                    
                      <div class="tct dropdown-menu dropdown-menu-left py-0 o-hidden mr-n15 mt-3 mr-lg-0 animated--fade-in-up" aria-labelledby="alertsDropdown">
	                        <a class="dropdown-item d-flex py-2" href="form_cliente.php">
	                            <div class="icon-stack bg-secondary-soft text-secondary mr-4"><i class="material-icons-round">emoji_people</i></div><div>Clientes</div>
	                        </a>
	                        <a class="dropdown-item d-flex py-2" href="form_doctor.php">
	                            <div class="icon-stack bg-secondary-soft text-secondary mr-4"><i class="material-icons-round">person</i></div><div>Doctores</div>
	                        </a>
	                        <a class="dropdown-item d-flex py-2" href="form_mascota.php">
	                            <div class="icon-stack bg-secondary-soft text-secondary mr-4"><i class="material-icons-round">pets</i></div><div>Mascotas</div>
	                        </a>
	                    </div>
					  </li>

				    <li class="nav-item mr-2">
				        <a class="btn btn-transparent-dark rounded-pill" href="#!">
				          Procesos</a>
				    </li>

				    <li class="nav-item mr-2">
				        <a class="btn btn-transparent-dark rounded-pill" href="#!">
				          Reportes</a>
				    </li>

				    <li class="nav-item mr-2">
				        <a class="btn btn-transparent-dark rounded-pill" href="#!">
				          mantenimiento</a>
				    </li>

				    <li class="nav-item mr-2">
				        <a class="btn btn-transparent-dark rounded-pill lift-img-X-r" href="salir.php">
				          Salir<i class="material-icons-round">close</i></a>
				    </li>
			    </div>
			  </ul>
      </nav>
<!--nav fin-->
<!--tabla 1-->
        <div style="margin-top: 4rem" class="row p-3 justify-content-center">
        <div class="card border-0 shadow shadow-lg" style="width: 50rem;">
          <div class="display-5 card-header bg-secondary tct"><a id="cliente" class="text-white" href="form_cliente.php">Tabla Clientes<i class="ml-1 material-icons-round">emoji_people</i></a><div class="mdl-tooltip tct" data-mdl-for="cliente">Ir al formulario Cliente</div></div>
                  <div class="datatable">
                      <table class="table table-hover">
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
                            <a class="btn btn-sm tct text-white btn-secondary rounded-pill" href="php/modificar/modificar_cliente.php?id=<?php echo $value->id; ?>"><i class="material-icons-round">create</i>Editar</a>
                            <a class="btn btn-sm tct text-white btn-danger rounded-pill" onclick="document.forms.cliente_<?php echo $value->id; ?>.submit();"><i class="material-icons-round">delete</i>Eliminar</a>
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
<!--tabla 1 fin-->
<!--tabla 2-->
        <div class="row p-3 justify-content-center">
        <div class="card border-0 shadow shadow-lg" style="width: 50rem;">
          <div class="display-5 card-header bg-secondary tct"><a id="doctor" class="text-white" href="form_doctor.php">Tabla Doctores<i class="ml-1 material-icons-round">person</i></a><div class="mdl-tooltip tct" data-mdl-for="doctor">Ir al formulario Doctor</div></div> 
                  <div class="datatable">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <td><strong>id</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Dirección</strong></td>
                            <td><strong>Teléfono</strong></td>
                            <td align="right"><strong>Acciones</strong></td>
                          </tr>
                        </thead>
                        <?php include('php/funciones/funciones_doctores.php');
                        $l = listarDoctores();
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
                            <a class="btn btn-sm tct text-white bg-secondary rounded-pill" href="php/modificar/modificar_doctor.php?id=<?php echo $value->id; ?>"><i class="material-icons-round">create</i>Editar</a>
                            <a class="btn btn-sm tct text-white bg-danger rounded-pill" onclick="document.forms.doctor_<?php echo $value->id; ?>.submit();"><i class="material-icons-round">delete</i>Eliminar</a>
                            <form name="doctor_<?php echo $value->id; ?>" action="php/eliminar.php" method="post"><input type="hidden" name="id" value="<?php echo $value->id; ?>"></form>
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
<!--tabla 2 fin-->
<!--tabla 3--> 
        <div class="row p-3 justify-content-center">
        <div class="card border-0 shadow shadow-lg" style="width: 60rem;">
          <div class="display-5 card-header bg-secondary tct"><a id="mascota" class="text-white" href="form_mascota.php">Tabla Mascotas <i class="ml-1 material-icons-round">pets</i></a><div class="mdl-tooltip tct" data-mdl-for="mascota">Ir al formulario Mascota</div></div> 
                  <div class="datatable">
                      <table class="table table-hover">
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
                            <td><?php echo $value->propietario; ?></td>
                            <td align="right">
                            <a class="btn btn-sm tct text-white btn-secondary rounded-pill" href="php/modificar/modificar_mascota.php?id=<?php echo $value->id; ?>"><i class="material-icons-round">create</i>Editar</a>
                            <a class="btn btn-sm tct text-white btn-danger rounded-pill" onclick="document.forms.cliente_<?php echo $value->id; ?>.submit();"><i class="material-icons-round">delete</i>Eliminar</a>
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
<!--tabla 3 fin-->
<div class="d-none d-md-block fixed-bottom lift-img"><img src="img/patas.png" align="right" style=" margin-right: 2rem; max-width: 25rem; margin-bottom: -1rem;" /></div>
<!--footer-->
<div class="footer">
    <div style="margin-left: 38%">
    <div class="text-center tct text-gray-600 small">Designed by Victor corio CI-26.866.132 © 2020 Copyright.</div>
    <div class="text-center tct text-gray-600 small">Ocor.Inc</div>
    </div>
</div>
<!--footer-fin-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script> 
</body>
</html>
