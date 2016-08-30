<div id="page-wrapper" style="min-height: 292px;">
    <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header"><i style="color: #F0E62B" class="fa fa-exclamation-triangle"></i></i>   Registrar Peligros</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
      <form action="<?= URL; ?>ctrPeligro/regPeligro" method="POST">
        <div class="col-lg-12">
        <div class="col-lg-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                  Peligro
                </div>
                <div class="panel-body">
                    <div class="row col-lg-12">
                        <div>
                          <label for="documento" class="">*Descripción:</label>
                          <textarea name="descPel" required="" class="form-control"></textarea>
                        </div>
                        <div style="margin-top: 2%;">  
                          <label for="documento" class="">*Efectos posibles:</label>
                          <textarea name="efectosPel" class="form-control"></textarea>
                        </div>  
                        <div style="margin-top: 3%;">
                          <label for="documento" class="">*Clasificación:</label>
                          <input name="clasificacionPel" type="text" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Evaluación de riesgo
                </div>
                <div class="panel-body">
                    <div class="row col-lg-12">
                        <div class="form-group col-lg-3">
                          <label for="documento" class="">ND:</label>
                          <input name="ND" type="number" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>
                        <div class="form-group col-lg-3">
                          <label for="documento" class="">NE:</label>
                          <input name="NE" type="number" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>
                        <div class="form-group col-lg-3">
                          <label for="documento" class="">NP:</label>
                          <input name="NP" type="number" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>
                        <div class="form-group col-lg-3">
                          <label for="documento" class="">Interp:</label>
                          <input name="Interp" type="text" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="form-group col-lg-4">
                          <label for="documento" class="">NC:</label>
                          <input name="NC" type="number" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="documento" class="">NR:</label>
                          <input name="NR" type="number" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>
                        <div class="form-group col-lg-4">
                          <label for="documento" class="">Nivel:</label>
                          <input name="Nivel" type="number" name="documento" class="form-control" autofocus="" required="" style="border-radius:5px;">
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="form-group col-lg-12">
                            <label for="documento" class="">Valoración de riesgo:</label>
                            <textarea name="valRiesgo" required="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Controles existentes, criterios para establecerlos y medidas de intervención
                </div>
                <div class="panel-body">
                    <div class="col-lg-6">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                             Controles existentes
                        </div>
                        <div class="panel-body">
                          <div>
                            <label>Fuente:</label>
                            <textarea name="fuente" class="form-control"></textarea>
                          </div> 
                          <div style="margin-top: 9%;">
                            <label>Medio:</label>
                            <textarea name="medio" class="form-control"></textarea>
                          </div> 
                          <div style="margin-top: 9%;">
                            <label>Individuo:</label>
                            <textarea name="individuo" class="form-control"></textarea>
                          </div> 
                        </div>
                     </div> 
                   </div>
                   <div class="col-lg-6">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          Criterios para establecer
                          controles y medidas de intervención
                        </div>
                        <div class="panel-body">
                          <div class="col-lg-12">
                            <label>Peor consecuencia:</label>
                            <input name="peorConsec" type="text" class="form-control">
                          </div>
                          <div style="margin-top: 3%;" class="col-lg-7">
                            <label>¿Requisito legal asociado?</label>
                            <select name="ReqLegalAsoc" class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </div>
                          <div style="margin-top: 3%;" class="col-lg-12">
                            <label>Controles de ingenieria</label>
                            <textarea name="ctrIng" class="form-control"></textarea>
                          </div>
                          <div style="margin-top: 3%;" class="col-lg-12">
                            <label>Señalización, Advertencia, Controles administrativos</label>
                            <textarea name="desInter" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div style="text-align: right;" class="form-group col-lg-12">
                      <button name="btnRegistrar" type="submit" class="btn btn-primary col-lg-offset-9"><b>Registrar</b></button>
                      <button type="reset" class="btn btn-danger"><b>Limpiar</b></button>
                    </div>       
                </div>
            </div>
        </div>    
    </div>
  </form>
</div>
</div>