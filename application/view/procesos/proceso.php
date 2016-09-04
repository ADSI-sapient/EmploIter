    <div id="page-wrapper" style="min-height: 292px;">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header"><i style="color: green;" class="fa fa-cogs"></i>   Procesos</h2>
        </div>
      </div>
      <div clas="row">
        <div class="col-lg-8">
          <div class="panel panel-green">
            <div class="panel-heading">
              <i style="color: green;" class="fa fa-cogs"></i>
              <div class="pull-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                  <li><button onclick="agreRegProc()" class="btn btn-box-tool"> Registrar nuevo proceso </button>
                    </li>
                    <li><button  onclick="agreLisProc()" class="btn btn-box-tool"> Listar procesos existentes </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.panel-heading -->
            <div style="padding-right: 0;" class="panel-body">
            <div id="regProc">
                <form onsubmit="return enviarProc();" action="<?= URL; ?>ctrProceso/registrarProceso" method="POST">
                <div class="row col-lg-12">
                  <div class="col-lg-12" style="padding-left: 30%">
                          <h3 style="font-weight: bold; margin-bottom: 5%; margin-top: 0;">Registrar Proceso</h3>
                  </div>
                </div>
                     <div style="margin-right: 0; margin-bottom: 3%;" class="row col-sm-12">
                        <div class="col-sm-9">
                          <label>Nombre: </label>
                          <input required="" class="form-control" type="textarea" name="nomProces">
                        </div>
                        <div class="col-sm-3">
                          <label>¿Rutinario?</label> 
                          <select name="rutina" class="form-control">
                            <option>SI</option>
                            <option>NO</option>
                          </select>
                        </div>
                        
                    </div>
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                          <label>   Zona: </label> 
                          <div class="input-group"> 
                            <select name="zona" required="" id="selectZona" class="form-control">
                            </select>
                            <span onclick="listTableZona();" data-toggle="modal" data-target="#regZona" class="input-group-btn">
                            <button style="background-color: #D8D8D8;" class="btn btn-default" type="button"><i class="fa fa-search" arial-hidden="true"></i></button>
                            </span>
                           </div> 
                        </div> 
                        <div  style="margin-top: 4%; text-align: right;" class="col-sm-6">
                          <button  data-toggle="modal" data-target="#asocPeligro"  type="button" class="btn btn-box-tool"><i style="font-size: 200%; color: #F0E62B;" class="fa fa-exclamation-triangle"></i></button>
                        </div> 
                    </div>
                    <div style="margin-top: 3%; margin-bottom: 3%" class="row col-sm-12">
                        <div class="col-sm-12">
                          <label>Tareas: </label>
                          <textarea id="textAreaProc" class="form-control"></textarea>
                          <input id="inpText" type="hidden" type="text" name="txtArea">
                        </div>
                    </div>

                    <div class="row col-sm-12">
                    <div class="col-sm-12">
                      <div id="tableOcultaProces" style="display: none;" class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th style="text-align: center;"  colspan="5">PELIGROS</th>
                            </tr>
                            <tr>
                              <th style="display: none;"></th>
                              <th>#</th>
                              <th>Descripción</th>
                              <th>Clasificación</th>
                              <th>Nivel de riesgo</th>
                              <th style="text-align: center;">Quitar</th>
                            </tr>
                          </thead>
                          <tbody id="tbody-proceso">
                          </tbody>
                        </table>
                      </div>
                      </div>
                    </div>
                    <div style="border-top: 1px solid; border-color: #D8D8D8;" class="row col-sm-12">
                      <div class="col-sm-9">
                        <span><h6 style="color: red;">Debes asociar peligros</h6></span>
                      </div>
                      <div style="text-align: right; margin-top: 2%; " class="col-sm-3">
                        <input id="inpPeligro" type="hidden" name="peligros[]">
                        <button onclick="arrayPeligro();" name="regProc" type="submit" class="btn btn-primary">Registrar</button>
                      </div>
                    </div>
                </form>
                </div>








                <div style="display: none;" id="lisProc">
                <div class="row col-sm-12">
                  <div  class="col-sm-12">
                  <div id="tableOcultaProces" class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th style="text-align: center;"  colspan="6">PROCESOS</th>
                            </tr>
                            <tr>
                              <th style="display: none;"></th>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Rutinario</th>
                              <th>Zona</th>
                              <th style="text-align: center;">Modificar</th>
                              <th style="text-align: center;">Quitar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $cont = 0; ?>
                            <?php foreach ($procesos as $proceso): ?>
                              <tr>
                                <td><?= $cont+=1; ?></td>
                                <td><?= $proceso["nobre"] ?></td>
                                <td><?= $proceso["rutinaria"] ?></td>
                                <td><?= $proceso["zona"] ?></td>
                                <td style="text-align: center">
                                    <button data-toggle="modal" data-target="" class="btn btn-box-tool">
                                      <i style="color: green; font-size: 150%;" class="fa fa-pencil-square-o"></i>
                                    </button>
                                </td>
                                <td style="text-align: center;">
                                    <button onclick="borrarProceso(<?= $proceso["id_proceso"] ?>)" class="btn btn-box-tool">
                                      <i style="color: red; font-size: 150%;" class="fa fa-times"></i>
                                    </button>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                      </div>
                    </div>
                </div>







            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-bell fa-fw"></i> Notifications Panel
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="list-group">
                <a href="#" class="list-group-item">
                  <i class="fa fa-comment fa-fw"></i> New Comment
                  <span class="pull-right text-muted small"><em>4 minutes ago</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                  <span class="pull-right text-muted small"><em>12 minutes ago</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-envelope fa-fw"></i> Message Sent
                  <span class="pull-right text-muted small"><em>27 minutes ago</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-tasks fa-fw"></i> New Task
                  <span class="pull-right text-muted small"><em>43 minutes ago</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-upload fa-fw"></i> Server Rebooted
                  <span class="pull-right text-muted small"><em>11:32 AM</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                  <span class="pull-right text-muted small"><em>11:13 AM</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-warning fa-fw"></i> Server Not Responding
                  <span class="pull-right text-muted small"><em>10:57 AM</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                  <span class="pull-right text-muted small"><em>9:49 AM</em>
                  </span>
                </a>
                <a href="#" class="list-group-item">
                  <i class="fa fa-money fa-fw"></i> Payment Received
                  <span class="pull-right text-muted small"><em>Yesterday</em>
                  </span>
                </a>
              </div>
              <!-- /.list-group -->
              <a href="#" class="btn btn-default btn-block">View All Alerts</a>
            </div>
            <!-- /.panel-body -->
          </div>
        </div>
      </div>
    </div>







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







    <div class="modal fade" tabindex="-1" role="dialog" id="asocPeligro">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 style="text-align: center;" class="modal-title"><b>Peligros para asociar</b></h4>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" style="margin-top: 2%;">
                <thead>
                  <tr>
                    <th style="text-align: center;" colspan="5">PELIGROS</th>
                  </tr>
                  <tr class="active">
                    <th style="display: none;"></th>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Clasificación</th>
                    <th>Nivel de riesgo</th>
                    <th style="text-align: center;">Agregar</th>
                  </tr>
                </thead>
                <tbody id="tbody-modPeligro">
                  <?php $cont = 0;?>
                  <?php foreach ($peligros as $peligro): ?>
                    <tr>
                      <td style="display: none;"><?= $peligro['id_peligro'];?></td>
                      <td><?= $cont += 1;?></td>
                      <td><?= $peligro["descripcion"];?></td>
                      <td><?= $peligro["clasificacion"];?></td>
                      <td style="text-align: center;"><?= $peligro["riesgo"];?></td>
                      <td style="text-align: center;">
                        <button id="btn<?= $peligro['id_peligro'];?>" type="button" class="btn btn-box-tool" onclick="asociarPeligro(this)"><i style="color: blue;" class="fa fa-plus"></i></button>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><b>Aceptar</b></button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
