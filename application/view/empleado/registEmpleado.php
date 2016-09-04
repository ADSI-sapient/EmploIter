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















