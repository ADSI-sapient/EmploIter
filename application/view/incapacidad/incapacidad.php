    <div id="page-wrapper" style="min-height: 292px;">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header"><i style="color: green;" class="fa fa-stethoscope"></i>   Incapacidades</h2>
        </div>
      </div>
      <div clas="row">
        <div class="col-lg-12">
          <div class="panel panel-green">
            <div class="panel-heading">
              <i style="color: green;" class="fa fa-stethoscope"></i>
              <div class="pull-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><button onclick="asigRegInc()" class="btn btn-box-tool"> Registrar nueva incapacidad </button>
                    </li>
                    <li><button onclick="asigLisInc()" class="btn btn-box-tool"> Listar incapacidades existentes </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.panel-heading -->
            <div style="padding-right: 0;" class="panel-body">
              <div id="regIncap">
                <form action="<?= URL; ?>ctrIncapacidad/regIncapacidad" method="POST">
                  <div class="row col-lg-12">
                    <div class="col-lg-12" style="padding-left: 30%">
                      <h3 style="font-weight: bold; margin-bottom: 5%; margin-top: 0;">Registrar Incapacidad</h3>
                    </div>
                  </div>
                  <div style="margin-right: 0; margin-bottom: 3%;" class="row col-sm-12">
                    <div class="col-sm-6">
                      <label>Incapacidad por: </label>
                      <select required="" id="tipoInc" class="form-control" name="razonInc">
                        <option value="">Seleccionar</option>
                        <option>Enfermedad laboral</option>
                        <option>Accidente de trabajo</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label>Empleado: </label>
                      <select name="incEmpl" required="" id="selEmp" onchange="selectEmpl()" class="form-control sel">
                        <option value="">Seleccione empleado </option>
                        <?php foreach ($empleados as $empleado): ?>
                          <option value="<?= $empleado["documento"]; ?>"><?= $empleado["nomApe"]; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="row col-sm-12">
                    <div class="col-sm-6">
                      <label>Grupo de enfermedad: </label> 
                      <select name="enfermedad" id="grupEnf" disabled="" class="sel form-control">
                        <option value="">Seleccione un grupo</option>
                        <option value="1">Grupo I</option>
                        <option value="2">Grupo II</option>
                        <option value="3">Grupo III</option>
                        <option value="4">Grupo IV</option>
                        <option value="5">Grupo V</option>
                        <option value="6">Grupo VI</option>
                        <option value="7">Grupo VII</option>
                        <option value="8">Grupo VIII</option>
                        <option value="9">Grupo IX</option>
                        <option value="10">Grupo X</option>
                        <option value="11">Grupo XI</option>
                        <option value="12">Grupo XII</option>
                        <option value="13">Grupo XIII</option>
                        <option value="14">Grupo XIV</option>
                        <option value="15">Grupo XV</option>
                      </select>
                    </div> 
                    <div class="col-sm-6">
                      <label>Clase de accidente: </label> 
                      <select name="accidente" id="claseAccident" disabled="" class="form-control sel">
                        <option value="" selected="">Seleccione un tipo</option>
                        <?php foreach ($accidentes as $accidente): ?>
                          <option value="<?= $accidente["id_accidente"]; ?>"><?= $accidente["causa"]; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div> 
                  </div>
                  <div style="margin-top: 3%; margin-bottom: 3%;" class="row col-sm-12">
                    <div class="col-sm-12">
                      <textarea id="descGrupEnf" readonly="" placeholder="Descripcion del grupo de enfermedad o clase de accidente" class="form-control"></textarea>
                    </div>
                  </div>
                  <div style="margin-right: 0;" class="row col-sm-12">
                   <div class="col-sm-6">
                    <label>Fecha Inicio: </label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="fechaInicio" type="text" class="form-control pull-right fecha"  required="" style="border-radius:5px;">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label>Fecha fín: </label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input  type="text" class="form-control pull-right fecha" name="fechaFin"  style="border-radius:5px;">
                    </div>
                  </div>
                </div>
                <div style="margin-top: 3%;" class="row col-sm-12">
                  <div class="col-sm-6">
                    <label>Días de incapacidad: </label>
                    <input required="" id="diasInc" min="0" class="form-control" type="number" name="diasInc">
                  </div>
                  <div class="col-sm-6">
                    <label>Valor incapacidad: </label>
                    <div class="form-group input-group">
                      <span class="input-group-addon">$</span>
                      <input id="valInc" readonly="" placeholder="0" type="number" name="valInc" class="form-control" required="">
                    </div>
                  </div>
                </div>  
                <div style="margin-top: 3%; margin-bottom: 3%" class="row col-sm-12">
                  <div class="col-sm-12">
                    <label>Descripción de la incapacidad: </label>
                    <textarea name="descripcion" required="" id="textAreaProc" class="form-control"></textarea>
                    <input id="inpText" type="hidden" type="text" name="txtArea">
                  </div>
                </div>
                <div style="border-top: 1px solid; border-color: #D8D8D8;" class="row col-sm-12">
                  <div class="col-sm-9">  
                  </div>
                  <div style="text-align: right; margin-top: 2%; " class="col-sm-3">
                    <input id="inpPeligro" type="hidden" name="peligros[]">
                    <button onclick="arrayPeligro();" id="btnRegCargo" name="regProc" type="submit" class="btn btn-primary">Registrar</button>
                  </div>
                </div>
              </form>
            </div>




            <div style="display: none;" id="lisIncapacidades">
              <div class="row col-sm-12">
                <div  class="col-sm-12">
                  <div id="tableOcultaProces" class="dataTable_wrapper table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th style="text-align: center;"  colspan="9">INCAPACIDADES</th>
                        </tr>
                        <tr>
                          <th>#</th>
                          <th>Empleado</th>
                          <th>Razón</th>
                          <th>Fecha inicio</th>
                          <th>Fecha fín</th>
                          <th>Días</th>
                          <th>Valor</th>
                          <th>Modificar</th>
                          <th>Detalle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $cont = 0;?>
                        <?php foreach ($incapacidades as $incapacidad): ?>
                          <tr>
                            <td style="display: none;"><?= $incapacidad["descripcion"];?></td>
                            <td style="display: none;"><?= $incapacidad["id_enfermedad"];?></td>
                            <td style="display: none;"><?= $incapacidad["id_accidente"];?></td>
                            <td><?= $cont += 1;?></td>
                            <td><?= $incapacidad["empleado"];?></td>
                            <td><?= $incapacidad["razonIncapacidad"];?></td>
                            <td><?= $incapacidad["fechaInicio"];?></td>
                            <td><?= $incapacidad["fechaFin"];?></td>
                            <td><?= $incapacidad["diasIncapacidad"];?></td>
                            <td><?= $incapacidad["valorIncapacidad"];?></td>
                            <td style="text-align: center">
                              <button onclick="enviarDatoEditInc(this, '<?= $incapacidad["ced_empleado"];?>', <?= $incapacidad["id_incapacidad"];?>)" data-toggle="modal" data-target="#modInca" class="btn btn-box-tool">
                                <i style="color: green; font-size: 150%;" class="fa fa-pencil-square-o"></i>
                              </button>
                            </td>
                            <td style="text-align: center;">
                              <button onclick="consIncap(this)" class="btn btn-box-tool"><i style="color: blue; font-size: 150%;" class="fa fa-eye"></i></button>
                            </td>

                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row col-lg-12">
                <div class="form-group col-lg-6">
                  <label>Grupo enfermedad: </label>
                  <input id="enfInca2" readonly="" type="text" class="form-control" name="">  
                </div>
                <div class="form-group col-lg-6">
                  <label>Clase accidente: </label>
                  <input id="accInca2" readonly="" type="text" class="form-control" name="">  
                </div>
              </div>
              <div class="row col-lg-12">
                <div class="form-group col-lg-12">
                  <textarea id="descInc" placeholder="Descripción incapacidad" readonly="" class="form-control"></textarea>
                </div>  
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>










  <div class="modal fade" tabindex="-1" role="dialog" id="modInca">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 style="text-align: center;" class="modal-title"><b>Modificar incapacidad</b></h4>
        </div>
        <form method="POST" action="<?= URL; ?>ctrIncapacidad/editIncapacidad">
        <div class="modal-body">
          <div style="margin-right: 0; margin-bottom: 3%;" class="row col-sm-12">
            <div class="col-sm-6">
              <input type="hidden" id="idIncapacidad" name="idIncapacidad">
              <label>Incapacidad por: </label>
              <select required="" id="tipoIncEdit" class="form-control" name="razonInc">
                <option value="">Seleccionar</option>
                <option>Enfermedad laboral</option>
                <option>Accidente de trabajo</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label>Empleado: </label>
              <select name="incEmpl" id="incEmplEdit" required="" onchange="selectEmpl()" class="form-control">
                <option value="">Seleccione empleado </option>
                <?php foreach ($empleados as $empleado): ?>
                  <option value="<?= $empleado["documento"]; ?>"><?= $empleado["nomApe"]; ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="row col-sm-12">
            <div class="col-sm-6">
              <label>Grupo de enfermedad: </label> 
              <select name="enfermedad" id="grupEnfEdit" disabled="" class="form-control">
                <option value="">Seleccione un grupo</option>
                <option value="1">Grupo I</option>
                <option value="2">Grupo II</option>
                <option value="3">Grupo III</option>
                <option value="4">Grupo IV</option>
                <option value="5">Grupo V</option>
                <option value="6">Grupo VI</option>
                <option value="7">Grupo VII</option>
                <option value="8">Grupo VIII</option>
                <option value="9">Grupo IX</option>
                <option value="10">Grupo X</option>
                <option value="11">Grupo XI</option>
                <option value="12">Grupo XII</option>
                <option value="13">Grupo XIII</option>
                <option value="14">Grupo XIV</option>
                <option value="15">Grupo XV</option>
              </select>
            </div> 
            <div class="col-sm-6">
              <label>Clase de accidente: </label> 
              <select name="accidente" id="claseAccidentEdit" disabled="" class="form-control">
                <option value="" selected="">Seleccione un tipo</option>
                <?php foreach ($accidentes as $accidente): ?>
                  <option value="<?= $accidente["id_accidente"]; ?>"><?= $accidente["causa"]; ?></option>
                <?php endforeach ?>
              </select>
            </div> 
          </div>
          <div style="margin-right: 0; margin-top: 3%;" class="row col-sm-12">
           <div class="col-sm-6">
            <label>Fecha Inicio: </label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input name="fechaInicio" id="fechaInicioEditInc" type="text" class="form-control pull-right fecha"  required="" style="border-radius:5px;">
            </div>
          </div>
          <div class="col-sm-6">
            <label>Fecha fín: </label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input id="fechaFinEditInc"  type="text" class="form-control pull-right fecha" name="fechaFin"  style="border-radius:5px;">
            </div>
          </div>
        </div>
        <div style="margin-top: 3%;" class="row col-sm-12">
          <div class="col-sm-6">
            <label>Días de incapacidad: </label>
            <input required="" id="diasIncEdit" min="0" class="form-control" type="number" name="diasInc">
          </div>
          <div class="col-sm-6">
            <label>Valor incapacidad: </label>
            <div class="form-group input-group">
              <span class="input-group-addon">$</span>
              <input id="valIncEdit" readonly="" placeholder="0" type="number" name="valInc" class="form-control" required="">
            </div>
          </div>
        </div>
        <div style="margin-top: 3%; margin-bottom: 3%" class="row col-sm-12">
          <div class="col-sm-12">
            <label>Descripción de la incapacidad: </label>
            <textarea name="descripcion" required="" id="textAreaProcEdit" class="form-control"></textarea>
            <input id="inpText" type="hidden" type="text" name="txtArea">
           </div>
        </div>
      </div>
      <div style="border-top:none;" class="modal-footer">
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



