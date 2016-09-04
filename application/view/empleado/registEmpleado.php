    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="page-header"><i style="color: #0000cc;" class="fa fa-users" aria-hidden="true"></i> Registrar Empleado</h2>
          </div>
        </div>

        <form action="<?php echo URL; ?>ctrEmpleado/regEmpleado" method="POST"">
        <div class="panel panel-primary">
        <div class="panel-heading">
          <i class="fa fa-bar-chart-o fa-fw"></i>
          Empleado
        </div>
        <div class="panel-body">
          <div style="margin-top: 3%" class="row col-lg-12">
            <div class="form-group col-lg-4">
              <label for="documento" class="">*Documento:</label>
              <input type="text" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
            </div>
            <div class="form-group col-lg-4">
              <label for="nombre" class="">*Nombre:</label>
              <input type="text" name="nombre" class="form-control" required="" style="border-radius:5px;">
            </div>
            <div class="form-group  col-lg-4">
              <label for="apellido" class="">*Apellidos:</label>
              <input type="text" name="apellido" class="form-control" required="" style="border-radius:5px;">
            </div>
          </div>
          <div class="row col-lg-12">
            <div class="form-group col-lg-4">  
              <label for="profesion" class="">*Profesión:</label>

              <div class="input-group">  
                <select name="profesion" class="form-control" id="SelectProfesion" required="" style="border-radius:5px;">
                 <!--  <option selected="" data-icon="fa-adn">Seleccionar</option>
                  <?php foreach ($profesiones as $profesion): ?>
                    <option value="<?= $profesion["id_profesion"]?>"><?= $profesion["nombre"]?></option> 
                  <?php endforeach ?> -->
                </select>
                <span data-toggle="modal" onclick="listTableProf();" data-target="#modalRegProfesion" class="input-group-btn">
                <button style="background-color: #D8D8D8;" class="btn btn-default" type="button"><i class="fa fa-search" arial-hidden="true"></i></button>
                </span>
              </div>
            </div>


            <div class="form-group col-lg-4">
              <label for="cargo" class="" >*Cargos:</label>

              <div>
                <select  class="form-control" name="cargo" required="" style="border-radius:5px;">
                  <option selected=""></option>
                  <?php foreach ($cargos as $cargo): ?>
                    <option value="<?= $cargo["id_cargo"]?>"><?= $cargo["nombre"]?></option>     
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group col-lg-4">  
              <label for="telefono" class="">*Teléfono:</label>
              <input type="text" name="telefono" class="form-control" required="" style="border-radius:5px;">
            </div>
          </div>
          <div class="row col-lg-12">

            <div class="form-group col-lg-4">  
              <label for="direccion" class="">*Dirección:</label>
              <input type="text" name="direccion" class="form-control" required="" style="border-radius:5px;">
            </div>
          </div>
          </div>
          <div style="background: transparent; padding-bottom: 0" class="panel-footer">
          <div class="row"> 
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-primary col-lg-offset-9" style="margin-bottom: 0;" name="btnRegistrarEmp"><b>Registrar</b></button>
              <button type="reset" class="btn btn-danger" style="margin-left: 3%; margin-bottom: 0;"><b>Limpiar</b></button>
            </div>
          </div>
          </div>
          </div>
        </form>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->





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









