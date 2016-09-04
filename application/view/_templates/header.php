<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Emploiter</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL; ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo URL; ?>font-awesome-4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo URL; ?>css/select2.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL; ?>css/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?= URL; ?>css/datepicker3.css">

    <!-- Custom Fonts -->
    <link href="<?php echo URL; ?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo URL; ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo URL; ?>bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Emploiter</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="modal" data-target="#modalRegProfesion" onclick="listTableProf();" href="#">
                            <i style="color: #00cc00; font-size: 100%;" class="fa fa-user-md" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="modal" data-target="#regZona" onclick="listTableZona();" href="#">
                            <i style="color: #F0E62B; font-size: 100%;" class="fa fa-industry" aria-hidden="true"></i>
                        </a>
                    </li>
                    <!-- /.dropdown -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a class="active" href="<?= URL ?>home/index"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> Empleados<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a class="active" href="<?= URL ?>ctrEmpleado/regEmpleado">Registrar Empleado</a>
                                    </li>
                                    <li>
                                        <a href="<?= URL ?>ctrEmpleado/listarEmpleados">Listar Empleados</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a class="active" href="<?= URL ?>ctrCargo/registrarCargo"><i class="fa fa-user-plus"></i>  Cargos</a>
                            </li>
                            <li>
                                <a class="active" href="<?= URL ?>ctrProceso/registrarProceso"><i class="fa fa-cogs"></i>  Procesos</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-exclamation-triangle"></i>   Peligros<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a class="active" href="<?= URL ?>ctrPeligro/regPeligro">Registrar Peligro</a>
                                    </li>
                                    <li>
                                        <a href="<?= URL ?>ctrPeligro/listarPeligros">Listar Peligros</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a class="active" href="<?= URL ?>ctrIncapacidad/incapacidad"><i class="fa fa-stethoscope"></i>  Incapacidades</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>


            <div class="modal fade" tabindex="-1" role="dialog" id="modalRegProfesion">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="font-weight: bold; text-align: center;" class="modal-title">Registrar Profesión</h3>
                </div>
                <div class="modal-body">
                    <!--             <form action="<?= URL; ?>ctrEmpleado/regProfesion" method="POST"> -->
                    <div class="row col-sm-12">
                        <div class="form-group col-sm-12">
                          <div style="text-align:center;" class="col-sm-2">
                            <i style="color: #00cc00; font-size: 300%;" class="fa fa-user-md" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-8">  
                            <input placeholder="Ingrese profesión" type="text" id="txtProfesion" class="form-control" required="" style="border-radius:5px;">
                        </div> 
                        <div class="col-sm-2">
                         <button onclick="registrarProfesion()" class="btn btn-primary">Registrar</button>
                     </div> 
                 </div>
             </div> 
             <!--            </form>   -->
             <div class="row col-sm-12" style="margin-right: 0; padding-left: 8%">
               <div class="dataTable_wrapper table-responsive">
                  <table width="100%" class="table table-striped table-hover" id="tblProfesion">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th style="text-align: center;">Profesión</th>
                        <th>Eliminar</th>
                        <th>Modificar</th>
                        <th>Guardar</th>
                        <th style="display: none;"></th>
                    </tr>
                </thead>
                <tbody id="tbody-profesion">
 <!--                  <?php $cont = 0; ?>
                  <?php foreach ($profesiones as $profesion): ?>
                    <tr>
                      <td><?= $cont += 1;?></td>
                      <td><?= $profesion["nombre"]; ?></td>

                      <td style="text-align: center;"><button id='btnEditProf<?= $profesion["id_profesion"]?>' onclick="editarProfesion(this, <?= $profesion["id_profesion"]?>);" class="btn btn-box-tool"><i style="color: green;" class="fa fa-pencil-square-o" arial-hidden="true"></i></button></td>

                      <td style="text-align: center;"><button onclick="borrarProfesion(<?= $profesion["id_profesion"]?>); $(this).parent().parent().remove();" data-dismiss="alert" class="btn btn-box-tool"><i style="color: red;" class="fa fa-times" arial-hidden="true"></i></button></td>

                      <td style="text-align: center;"><button disabled="true" id='btnGuardarProf<?= $profesion["id_profesion"]?>' onclick="guardarCambiosProf(this, <?= $profesion["id_profesion"]?>);" type="button" class="btn btn-box-tool"><i class="fa fa-check" arial-hidden="true"></i></button></td>
                      <td style="display: none;"><?= $profesion["id_profesion"]?></td>
                    </tr>
                <?php endforeach ?> -->
            </tbody>
        </table>
    </div>
</div>
</div>
<div>
  <div class="modal-footer" style="border-top:none; border-bottom:1px solid;">
<!--             <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
-->          </div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<div class="modal fade" tabindex="-1" role="dialog" id="regZona">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 style="font-weight: bold; text-align: center;" class="modal-title">Registrar Zona</h3>
    </div>
    <div class="modal-body">
      <div class="row col-sm-12">
        <div class="form-group col-sm-12">
          <div style="text-align:center;" class="col-sm-2">
            <i style="color: #00cc00; font-size: 300%;" class="fa fa-industry" aria-hidden="true"></i>
        </div>
        <div class="col-sm-8">  
            <input placeholder="Ingrese zona" type="text" id="txtZona" class="form-control" required="" style="border-radius:5px;">
        </div> 
        <div class="col-sm-2">
         <button onclick="registrarZona()" class="btn btn-primary">Registrar</button>
     </div> 
 </div>
</div> 
<div class="row col-sm-12" style="margin-right: 0; padding-left: 8%">
   <div class="dataTable_wrapper table-responsive">
      <table width="100%" class="table table-striped table-hover" id="tblProfesion">
        <thead>
          <tr>
            <th>Código</th>
            <th style="text-align: center;">Zona</th>
            <th>Eliminar</th>
            <th>Modificar</th>
            <th>Guardar</th>
            <th style="display: none;"></th>
        </tr>
    </thead>
    <tbody id="tbody-zona">
    </tbody>
</table>
</div>
</div>
</div>
<div>
  <div class="modal-footer" style="border-top:none; border-bottom:1px solid;">
  </div>
</div>
</div>
</div>
</div>

