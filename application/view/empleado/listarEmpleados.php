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
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Documento</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Cargo</th>
                                            <th>Teléfono</th>
                                            <th>Profesión</th>
                                            <th>Salario</th>
                                            <th>Ficha de Riesgo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($empleados as $empleado): ?>
                                    <tr>
                                        <td><?= $empleado['documento'] ?></td>
                                        <td><?= $empleado['nombre'] ?></td>
                                        <td><?= $empleado['apellido'] ?></td>
                                        <td><?= $empleado['nombre_Cargo'] ?></td>
                                        <td><?= $empleado['telefono'] ?></td>
                                        <td><?= $empleado['profesion'] ?></td>
                                        <td><?= $empleado['salario'] ?></td>
                                        <td><button onclick="cargarFichaRiesgo(this)" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon glyphicon-file" style="color:#2F7FF6"></span></button></td>
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