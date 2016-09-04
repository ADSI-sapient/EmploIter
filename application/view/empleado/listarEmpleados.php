<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header"><i style="color: #0000cc;" class="fa fa-users" aria-hidden="true"></i>   Listar Empleados</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Empleados Registrados
        </div>
        <div class="panel-body">
          <div class="dataTable_wrapper">
            <table width="100%" class="table table-striped table-bordered table-hover" id="">
              <thead>
                <tr>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                    <th>#</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Profesión</th>
                    <th>Salario</th>
                    <th>Nivel de riesgo</th>
                    <th>Incapacidades</th>
                    <th>Ficha de Riesgo</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th style="display: none;"></th>
                    <th style="display: none;"></th>
                </tr>
              </thead>
              <tbody>
                <?php $cont = 0; ?>
                <?php foreach ($empleados as $empleado): ?>
                  <tr>
                    <td style="display: none;"><?= $empleado['nomEmpleado'] ?></td>
                    <td style="display: none;"><?= $empleado['apellido'] ?></td>
                    <td><?= $cont += 1; ?></td>
                    <td><?= $empleado['documento'] ?></td>
                    <td><?= $empleado['nomApe'] ?></td>
                    <td><?= $empleado['cargo'] ?></td>
                    <td><?= $empleado['profesion'] ?></td>
                    <td><?= $empleado['salario'] ?></td>
                    <td style="text-align: center;"><?= $empleado['clase'] ?></td>
                    <td style="text-align: center;">
                      <button class="btn btn-box-tool" onclick="incaEmpl(this)" data-toggle="modal" data-target="#modIncapacidades">
                        <i style="color: blue; font-size: 150%;" class="fa fa-stethoscope"></i> 
                      </button>
                    </td>
                    <td style="text-align: center;">
                      <button class="btn btn-box-tool" onclick="consFichaRies(this, <?= $empleado['id_cargo'] ?>)">
                        <i style="color: red; font-size: 150%;" class="fa fa-file-pdf-o"></i> 
                      </button> 
                    </td>
                    <td style="text-align: center">
                      <button onclick="modEmpleado(this, <?= $empleado['id_cargo'] ?>, <?= $empleado['id_profesion'] ?>)" data-toggle="modal"  data-target="#modEditEmpleado" class="btn btn-box-tool">
                        <i style="color: green; font-size: 150%;" class="fa fa-pencil-square-o"></i>
                      </button>
                    </td>
                    <td style="text-align: center;">
                      <button onclick="borrarEmpleado('<?= $empleado['documento'] ?>');" class="btn btn-box-tool">
                        <i style="color: red; font-size: 150%;" class="fa fa-times"></i>
                      </button>
                    </td>
                    <td style="display: none;"><?= $empleado['telefono'] ?></td>
                    <td style="display: none;"><?= $empleado['direccion'] ?></td>
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



<div class="modal fade" tabindex="-1" role="dialog" id="modIncapacidades">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button onclick="limpForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 style="text-align: center;" class="modal-title"> Incapacidades </h3>
      </div>
      <div class="modal-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th style="text-align: center;" id="nomEmpInca" colspan="7"></th>
              </tr>
              <tr>
                <th>#</th>
                <th>Razón</th>
                <th>Fecha inicio</th>
                <th>Fecha fín</th>
                <th>Días</th>
                <th>Valor</th>
                <th>Detalle</th>
              </tr>
            </thead>
            <tbody id="tbodyIncEmp">
            </tbody>
          </table>  
        </div>
        <div class="row col-lg-12">
          <div class="form-group col-lg-6">
            <label>Grupo enfermedad: </label>
            <input id="enfInca" readonly="" type="text" class="form-control" name="">  
          </div>
          <div class="form-group col-lg-6">
            <label>Clase accidente: </label>
            <input id="accInca" readonly="" type="text" class="form-control" name="">  
          </div>
        </div>
        <div class="row col-lg-12">
          <div class="form-group col-lg-12">
            <textarea id="descIncap" placeholder="Descripción incapacidad" readonly="" class="form-control"></textarea>
          </div>  
        </div>      
      </div>
      <div class="modal-footer" style="border-top:none; border-bottom:1px solid;">
          <button onclick="limpForm()" data-dismiss="modal" type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" tabindex="-1" role="dialog" id="modEditEmpleado">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 style="text-align: center;" class="modal-title"> Modificar empleado </h3>
      </div>
      <form method="POST" action="<?= URL; ?>ctrEmpleado/modificarEmpleado">
      <div class="modal-body">
        <div style="margin-top: 3%" class="row col-lg-12">
            <div class="form-group col-lg-4">
              <label for="documento" class="">*Documento:</label>
              <input readonly="" id="cedEmpMod" type="text" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
            </div>
            <div class="form-group col-lg-4">
              <label for="nombre" class="">*Nombre:</label>
              <input id="nomEmpEdit" type="text" name="nombre" class="form-control" required="" style="border-radius:5px;">
            </div>
            <div class="form-group  col-lg-4">
              <label for="apellido" class="">*Apellidos:</label>
              <input id="apeEmpEdit" type="text" name="apellido" class="form-control" required="" style="border-radius:5px;">
            </div>
          </div>
          
      

      <div class="row col-lg-12">
            <div class="form-group col-lg-4">  
              <label for="profesion" class="">*Profesión:</label>
                <select id="selProEmpEdit" name="profesion" class="form-control" required="" style="border-radius:5px;">
                  <?php foreach ($profesiones as $profesion): ?>
                    <option value="<?= $profesion["id_profesion"]?>"><?= $profesion["nombre"]?></option> 
                  <?php endforeach ?> 
                </select>
            </div>
            <div class="form-group col-lg-4">
              <label for="cargo" class="" >*Cargos:</label>

              <div>
                <select id="selCarEmpEdit"  class="form-control" name="cargo" required="" style="border-radius:5px;">
                  <?php foreach ($cargos as $cargo): ?>
                    <option value="<?= $cargo["id_cargo"]?>"><?= $cargo["nombre"]?></option>     
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group col-lg-4">  
              <label for="telefono" class="">*Teléfono:</label>
              <input id="telEmpEdit" type="text" name="telefono" class="form-control" required="" style="border-radius:5px;">
            </div>
          </div>
          <div class="row col-lg-12">
            <div class="form-group col-lg-4">  
              <label for="direccion" class="">*Dirección:</label>
              <input id="dirEmpEdit" type="text" name="direccion" class="form-control" required="" style="border-radius:5px;">
            </div>
          </div>
          </div>
      <div class="modal-footer" style="border-top: 0; border-bottom:1px solid;">
        <div class="row col-lg-12">
          <div style="text-align: right;" class="col-lg-10">
              <button type="submit" class="btn btn-primary col-lg-offset-9"><b>Registrar</b></button>
          </div>
          <div class="col-lg-2">
              <button data-dismiss="modal" type="button" class="btn btn-danger"><b>Cancelar</b></button>
          </div>  
        </div>    
      </div>
      </form>
    </div>
  </div>
</div>