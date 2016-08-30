<div style="display: none;" id="regCargo">
  <form action="<?= URL; ?>ctrCargo/registrarCargo" method="POST">
  <div class="row col-lg-12">
    <div class="col-lg-12" style="text-align: center;">
      <h3 style="font-weight: bold; margin-bottom: 5%; margin-top: 0;">Registrar Cargo</h3>
    </div>
  </div>
      <div  style="text-align: right; margin-bottom: 3%; padding-left: 0;" class="row col-sm-12">
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


<div id="listCargo">
</div>





