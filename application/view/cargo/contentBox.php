<div style="display: none;" id="regCargo">
  <form id="frmRegCargo" onsubmit="return enviar();" action="<?= URL; ?>ctrCargo/registrarCargo" method="POST">
  <div class="row col-lg-12">
    <div class="col-lg-12" style="text-align: center;">
      <h3 style="font-weight: bold; margin-bottom: 5%; margin-top: 0;">Registrar Cargo</h3>
    </div>
  </div>
      <div  style="text-align: right; padding-left: 0;" class="row col-sm-12">
        <div style="margin-left: 0;"  class="col-sm-12">  
          <div style="margin-left: 0;" class="col-sm-6">  
            <input placeholder="Ingrese cargo" type="text" name="txtCargo" class="form-control" required="" style="border-radius:5px;">
          </div> 
          <div class="col-sm-5">
          <div class="form-group input-group">
            <span class="input-group-addon">$</span>
            <input placeholder="Ingrese salario" type="number" name="txtSalario" class="form-control" required="">
          </div>  
          </div>
          <div  class="col-sm-1">
            <button style="text-align: right;" data-toggle="modal" data-target="#asoProceso"  type="button" class="btn btn-box-tool"><i style="color: green; font-size: 200%;" class="fa fa-cogs" aria-hidden="true"></i></button>
          </div> 
        </div>  
      </div>

      <div  style="padding-left: 0;" class="row col-sm-12">
        <div style="margin-left: 0;"  class="col-sm-12">  
          <div style="margin-left: 0;" class="col-sm-6">
            <label>Nivel de riesgo: </label> 
            <select onchange="seleRiesgo(this);" id="" name="selectRiesgo" required="" style="width: 60%;" class="form-control">
              <option value="" selected="">Nivel de riesgo</option>
              <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
              <option value="4">IV</option>
              <option value="5">V</option>
            </select>
          </div> 
          <div style="margin-left: 0;" class="col-sm-6">
            <label>Tarifa: </label>  
            <div class="form-group input-group">
            <span class="input-group-addon">%</span>
            <input id="inpTarifa" placeholder="Tarifa" readonly="" type="number" class="form-control">
          </div>
          </div> 
        </div>  
      </div>
      <div  style="margin-bottom: 3%; padding-left: 0;" class="row col-sm-12">
        <div style="margin-left: 0;"  class="col-sm-12">  
          <div style="margin-left: 0;" class="col-sm-12"> 
            <label>Actividades: </label>
            <textarea id="textAct" readonly="" placeholder="Actividades" class="form-control"></textarea>
          </div>
        </div>
      </div>    
      <div class="row col-sm-12">
      <div  class="col-sm-12">
        <div  id="di" style="display: none;" class="dataTable_wrapper table-responsive">
          <table  class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th style="text-align: center;"  colspan="4">PROCESOS</th>
              </tr>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Zona</th>
                <th style="text-align: center;">Quitar</th>
              </tr>
            </thead>
            <tbody id="tbody-cargo">
            </tbody>
          </table>
        </div>
        </div>
      </div>
    <div style="border-top: 1px solid; border-color: #D8D8D8;" class="row col-sm-12" >
        <div class="col-sm-9">
          <span><h6 id="spanRed" style="color: red;">Debes asociar procesos</h6></span>
        </div>
        <div style="text-align: right; margin-top: 2%" class="col-sm-3">
          <input id="inpProces" type="hidden" name="procesos[]">
            <button onclick="arrayProces();" id="btnRegCargo" style="display: none;" name="regCargo" type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </div>
  </form>
</div>






<div style="display: none;" id="listCargo">
  <div class="row col-sm-12">
    <div  class="col-sm-12">
      <div class="dataTable_wrapper table-responsive">
        <table  class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th style="text-align: center;"  colspan="6">CARGOS REGISTRADOS</th>
              </tr>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Salario</th>
                <th>Nivel de riesgo</th>
                <th>Tarifa</th>
<!--                 <th style="text-align: center;">Modificar</th>
 -->                <th style="text-align: center;">Elimnar</th>
              </tr>
            </thead>
            <tbody>
                <?php $cont = 0; ?>
                <?php foreach ($cargos as $cargo): ?>
                  <tr>
                  <td><?= $cont += 1; ?></td>
                  <td><?= $cargo["nombre"]; ?></td>
                  <td><?= $cargo["salario"]; ?></td>
                  <td style="text-align: center;"><?= $cargo["clase"]; ?></td>
                  <td><?= $cargo["tarifa"]; ?></td>
<!--                   <td style="text-align: center">
                      <button data-toggle="modal" data-target="#modEditEmpleado" class="btn btn-box-tool">
                        <i style="color: green; font-size: 150%;" class="fa fa-pencil-square-o"></i>
                      </button>
                  </td>
 -->                  <td style="text-align: center;">
                      <button onclick="borrarCargo(<?= $cargo["id_cargo"]; ?>)" class="btn btn-box-tool">
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
  




