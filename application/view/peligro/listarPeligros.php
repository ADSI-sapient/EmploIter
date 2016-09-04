<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header"><i style="color: #F0E62B" class="fa fa-exclamation-triangle"></i>   Listar Peligros</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-green">
        <div class="panel-heading">
          Peligros Registrados
        </div>
        <div class="panel-body">
          <div class="dataTable_wrapper">
            <table width="100%" class="table table-striped table-bordered table-hover" id="">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Efectos posibles</th>
                    <th>Clasificación</th>
                    <th style="text-align: center; ">Riesgo</th>
                    <th>Peor consecuencia</th>
                    <th style="text-align: center; ">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php $cont = 0; ?>
                <?php foreach ($peligros as $peligro): ?>
                  <tr>
                    <td style="display: none;"></td>
                    <td><?= $cont += 1; ?></td>
                    <td><?= $peligro["descripcion"]; ?></td>
                    <td><?= $peligro["efectos"]; ?></td>
                    <td><?= $peligro["clasificacion"]; ?></td>
                    <td style="text-align: center; "><?= $peligro["nivelRiesgo"]; ?></td>
                    <td><?= $peligro["peorConsecuencia"]; ?></td>
                    <td style="text-align: center;">
                      <button onclick="borrarPeligro(<?= $peligro["id_peligro"]; ?>)" class="btn btn-box-tool">
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
  </div>
</div>
</div>