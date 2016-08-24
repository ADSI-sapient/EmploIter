    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header"><i style="color: #0000cc;" class="fa fa-users" aria-hidden="true"></i>        Registrar Empleado</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <form action="<?php echo URL; ?>ctrEmpleado/regEmpleado" method="POST"">
          <div class="row col-lg-12">
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
                <select  class="form-control" name="profesion" required="" style="border-radius:5px;">
                  <option selected="">Seleccionar</option>
                  <?php foreach ($profesiones as $profesion): ?>
                    <option value="<?= $profesion["id_profesion"]?>"><?= $profesion["nombre"]?></option> 
                  <?php endforeach ?>
                </select>
                <div data-toggle="modal" data-target="#modalRegProfesion" class="input-group-addon">
                  <i class="fa fa-plus-circle fa-lg" arial-hidden="true"></i>
                </div>
              </div>

            </div>


            <div class="form-group col-lg-4">
              <label for="cargo" class="" >*Cargos:</label>

              <div class="input-group">
                <select  class="form-control" name="cargo" required="" style="border-radius:5px;">
                  <option selected="">Seleccionar</option>
                  <?php foreach ($cargos as $cargo): ?>
                    <option value="<?= $cargo["id_cargo"]?>"><?= $cargo["nombre"]?></option>     
                  <?php endforeach ?>
                </select>
                <div  data-toggle="modal" data-target="#modalRegCargo" class="input-group-addon">
                  <i  class="fa fa-plus-circle fa-lg" arial-hidden="true"></i>
                </div>
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
          <br>
          <div class="row"> 
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-primary col-lg-offset-9" style="margin-top: 15px;" name="btnRegistrarEmp"><b>Registrar</b></button>
              <button type="reset" class="btn btn-danger" style="margin-left: 15px; margin-top: 15px;"><b>Limpiar</b></button>
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
            <h4 style="text-align: center;" class="modal-title">Registrar Profesión</h4>
          </div>
          <div class="modal-body">
            <form action="<?= URL; ?>ctrEmpleado/regProfesion" method="POST">
              <div class="row col-sm-12">
                <div class="form-group col-sm-12">
                  <div class="col-sm-3">
                    <i style="color: #0000cc; font-size: 300%;" class="fa fa-users" aria-hidden="true"></i>
                  </div>
                  <div class="col-sm-7">  
                    <input placeholder="Ingrese profesión" type="text" name="txtProfesion" class="form-control" required="" style="border-radius:5px;">
                  </div> 
                  <div class="col-sm-2">
                   <button type="submit" class="btn btn-primary">Aceptar</button>
                 </div> 
               </div>
             </div>
           </form>  
            <!-- <div class="row col-sm-12">
                
          </div> -->
        </div>
        <div>
          <div class="modal-footer" style="border-top:none; border-bottom:1px solid;">
<!--             <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
-->          </div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<div class="modal fade" tabindex="-1" role="dialog" id="modalRegCargo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style="text-align: center;" class="modal-title">Registrar Cargo</h4>
      </div>
      <div class="modal-body">
        <form action="<?= URL; ?>ctrEmpleado/regCargo" method="POST">
          <div  style="padding-right: 0;" class="row col-sm-12">
            <div class="form-group">
              <div class="col-sm-2">
                <i style="color: #0000cc; font-size: 300%;" class="fa fa-users" aria-hidden="true"></i>
              </div>
              <div class="col-sm-5">  
                <input placeholder="Ingrese cargo" type="text" name="txtCargo" class="form-control" required="" style="border-radius:5px;">
              </div> 
              <div  class="col-sm-5">
                <input placeholder="Ingrese salario" type="text" name="txtSalario" class="form-control" required="" style="border-radius:5px;">
              </div> 
            </div>
          </div>
        </div>
        <div>
          <div class="modal-footer" style="border-top:none; border-bottom:1px solid;">
            <button style="margin-right: 5%; margin-top: 2%;" type="submit" class="btn btn-primary">Registrar</button>
          </div>
        </div>
      </form>  
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





