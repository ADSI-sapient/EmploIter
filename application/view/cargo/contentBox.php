<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="modal fade" tabindex="-1" role="dialog" id="modalRegProfesion">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">

          <div id="regCargo">
            <div class="row">
              <div class="col-lg-12" style="padding-left: 30%">
                <h3 style="font-weight: bold; margin-bottom: 5%; margin-top: 0;">Registrar Cargo</h3>
              </div>
            </div>
            <form action="<?= URL; ?>ctrCargo/registrarCargo" method="POST">
              <div>
                <div style="padding-right: 0;" class="row col-sm-12">
                  <div class="form-group">
                    <div class="col-sm-5">  
                      <input placeholder="Ingrese cargo" type="text" name="txtCargo" class="form-control" required="" style="border-radius:5px;">
                    </div> 
                    <div class="col-sm-5">
                      <input placeholder="Ingrese salario" type="text" name="txtSalario" class="form-control" required="" style="border-radius:5px;">
                    </div>
                    <div class="col-sm-2">
                      <button data-toggle="modal" data-target="#asoProceso"  type="button" class="btn btn-box-tool"><i style="color: green; font-size: 200%;" class="fa fa-cogs" aria-hidden="true"></i></button>
                    </div> 
                  </div>
                </div>
                <br>
                <br>
                <br>
                <div class="row col-sm-12">
                  <div id="di" style="display: none;" class="dataTable_wrapper table-responsive">
                    <table width="100%" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Número</th>
                          <th>Nombre</th>
                          <th>Zona</th>
                          <th>Quitar</th>
                        </tr>
                      </thead>
                      <tbody id="tbody-cargo">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-9">
                    <span><h6 id="spanRed" style="color: red;">Debes asociar procesos</h6></span>
                  </div>
                  <div class="col-sm-3">
                    <input id="inpProces" type="hidden" name="procesos[]">
                    <button onclick="arrayProces();" id="btnRegCargo" style="display: none" name="regCargo" type="submit" class="btn btn-primary">Registrar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>







  
  <div id="listCargo">
    
  </div>
</body>
</html>





