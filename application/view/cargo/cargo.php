    <div id="page-wrapper" style="min-height: 292px;">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header"><i style="color: green;" class="fa fa-user-plus"></i>   Cargos</h2>
        </div>
      </div>
      <div clas="row">
        <div class="col-lg-8">
          <div class="panel panel-green">
            <div class="panel-heading">
              <i style="color: green;" class="fa fa-user-plus"></i> 
              <div class="pull-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><button onclick="cargarRegCargo()" class="btn btn-box-tool"> Registrar nuevo cargo </button>
                    </li>
                    <li><button onclick="cargarListCargos()" class="btn btn-box-tool"> Listar cargos existentes </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.panel-heading -->
            <div style="padding-right: 0;" class="panel-body" id="espacioParaCargo">


            </div>
            <!-- /.panel-body -->
          </div>
        </div>

        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-bell fa-fw"></i> Documentos de apollo
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="list-group">
                <a href="http://www.mintrabajo.gov.co/component/docman/doc_download/2096-decreto1477del5deagostode2014.html" class="list-group-item">
                  <i class="fa fa-file-pdf-o"></i> Decreto 1477
                  <span class="pull-right text-muted small"><em>2014</em>
                  </span>
                </a>
                <a target="_blank" href="http://www.mintrabajo.gov.co/agosto-2014/3709-gobierno-expide-nueva-tabla-de-enfermedades-laborales.html" class="list-group-item">
                  <i class="fa fa-upload fa-fw"></i> Tabla de enfermedades
                  <span class="pull-right text-muted small"><em></em>
                  </span>
                </a>
                <a class="list-group-item" target="_blank" href="http://fondoriesgoslaborales.gov.co" rel="nofollow"> <img style="margin-bottom:7px;" src="<?= URL; ?>img/bt_riesgos.png" width="226" height="50"></a>
                <a target="_blank" class="list-group-item" href="http://www.mintrabajo.gov.co/derechos-fundamentales.html" rel="nofollow"> <img style="margin-bottom:7px;" src="<?= URL; ?>img/bt_derechos.png" width="226" height="50"></a>
                <a target="_blank" class="list-group-item" href="http://www.mintrabajo.gov.co/ministerio-en-las-regiones.html" rel="nofollow"><img style="margin-bottom:7px;" src="<?= URL; ?>img/bt_ministerio_en_las_regiones.png" width="226" height="50"></a>
              </div>
            </div>
            <!-- /.panel-body -->
          </div>
        </div>
      </div>
    </div>






     <div class="modal fade" tabindex="-1" role="dialog" id="asoProceso">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 style="text-align: center;" class="modal-title"><b>Procesos para asociar</b></h4>
          </div>
          <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="margin-top: 2%;">
                  <thead>
                    <tr>
                      <th style="text-align: center;"  colspan="4">PROCESOS</th>
                    </tr>
                    <tr class="active">
                      <th style="display: none;"></th>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>zona</th>
                      <th style="text-align: center;">Agregar</th>
                    </tr>
                  </thead>
                  <tbody id="tbody-modProces">
                    <?php $cont = 0;?>
                    <?php foreach ($procesos as $proceso): ?>
                      <tr>
                          <td style="display: none;"><?= $proceso['id_proceso'];?></td>
                          <td><?= $cont += 1;?></td>
                          <td><?= $proceso["nobre"];?></td>
                          <td><?= $proceso["zona"];?></td>
                          <td style="text-align: center;">
                            <button id="btn<?= $proceso['id_proceso'];?>" type="button" class="btn btn-box-tool" onclick="asociarProceso(this)"><i style="color: blue;" class="fa fa-plus"></i></button>
                          </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><b>Aceptar</b></button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

