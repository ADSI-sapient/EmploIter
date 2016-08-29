        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Listar Empleados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Empleados Registrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Dirección</th>
                                            <th>No. Identificación</th>
                                            <th>Profesión</th>
                                            <th>Salario</th>
                                            <th>Ficha de Riesgo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($empleados as $empleado): ?>
                                            <tr>
                                                <td><?= $empleado['empleado'] ?></td>
                                                <td><?= $empleado['cargo'] ?></td>
                                                <td><?= $empleado['direccion'] ?></td>
                                                <td><?= $empleado['documento'] ?></td>
                                                <td><?= $empleado['profesion'] ?></td>
                                                <td><?= $empleado['salario'] ?></td>
                                                <td><button class="btn btn-box-tool" onclick="cargarFichaRiesgo(this)" data-toggle="modal" data-target="#myModal"><i style="color: blue; font-size: 150%;" class="fa fa-file-code-o"></i></button>
                                                   <button onclick="consFichaRies(this, <?= $empleado['id_cargo'] ?>)" data-toggle="modal" data-target="#modalDetalle"  class="btn btn-box-tool"><i style="color: green; font-size: 150%;" class="fa fa-eye"></i>
                                                   </button>   
                                               </td>
                                           </tr>
                                       <?php endforeach ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <!-- /.panel-body -->
                   </div>
                   <!-- /.panel -->
               </div>
               <!-- /.col-lg-12 -->
           </div>
       </div>
       <!-- /#page-wrapper -->
   </div>
   <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ficha de Riesgo de: <p id="nomb"></p></h4>
        </div>
        <div class="modal-body">
            <div class="row col-sm-12">
                <div class="form-group col-sm-6">
                    <label for="docu" class="">*Documento:</label>
                    <input type="text" id="docu" class="form-control" readonly="" style="border-radius:5px;">
                </div>
                <div class="form-group col-sm-6">
                    <label for="carg" class="">*Cargo:</label>
                    <input type="text" id="carg" class="form-control" readonly="" style="border-radius:5px;">
                </div>
            </div>
            <div class="row col-sm-12">
                <div class="form-group" style="margin-left:20px">
                    <img onclick="javascript:this.width=500;this.height=400" ondblclick="javascript:this.width=100;this.height=80" src="<?= URL ?>img/img1.png" width="100"/>
                    <img onclick="javascript:this.width=500;this.height=400" ondblclick="javascript:this.width=100;this.height=80" src="<?= URL ?>img/img2.png" width="100"/>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="border-top:none; border-bottom:1px solid;">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" tabindex="-1" role="dialog" id="modalDetalle">
  <div class="modal-dialog" style="width: 100%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div style="text-align: center;" class="modal-title"><strong>Ficha de riesgos</strong></div>
      </div>
      <div class="modal-body">
        <div class="row col-sm-12">
            <div style="font-size: 70%;" class="dataTable_wrapper">
                <table width="100%" class="table table-striped table-bordered table-hover" id="">
                    <thead>
                        <div id="titleMod"></div>
                        <tr>
                            <th style="text-align: center;" colspan="18">Proceso</th>
                        </tr>
                        <tr>
                            <th colspan="18">Tareas: </th>
                        </tr>
                        <tr>
                            <th colspan="5">Rutinaria: </th>
                            <th colspan="13">Zona: </th>
                        </tr>
                        <tr>
                            <th colspan="3">Peligro</th>
                            <th colspan="8">Evaluación de riesgo</th>
                            <th colspan="3">Controles existentes</th>
                            <th colspan="2">Criterios para establecer controles</th>
                            <th colspan="2">Medidas de intervención</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Descripción</td>
                            <td>Clasificación</td>
                            <td>Efectos posibles</td>

                            <td>ND</td>
                            <td>NE</td>
                            <td>NP</td>
                            <td>Interp</td>
                            <td>NC</td>
                            <td>NR</td>
                            <td>Interp</td>
                            <td>Aceptabilidad del riesgo</td>

                            <td>Fuente</td>
                            <td>Medio</td>
                            <td>Individuo</td>
                            
                            <td>Peor consecuencia</td>
                            <td>Requisito legal asociado</td>

                            <td>Control ingenieria</td>
                            <td>Señalización</td>

                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        <div class="row col-sm-12">
        </div>
      </div>
      <div class="modal-footer" style="border-top:none; border-bottom:1px solid;">
      </div>
    </div>
  </div>
</div>