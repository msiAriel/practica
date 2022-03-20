<h3>TABLA</h3><br>
<?php if ($listadoAulas): ?>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center">CODIGO</th>
        <th class="text-center">NOMBRE</th>
       <th class="text-center">UBICACION</th>
        <th class="text-center">BLOQUE</th>
        <th class="text-center">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listadoAulas->result() as $aulaTemporal): ?>
        <tr>
          <td class="text-center"><?php echo $aulaTemporal->id_aul ?></td>
          <td class="text-center"><?php echo $aulaTemporal->nombre_aul ?></td>
          <td class="text-center"><?php echo $aulaTemporal->ubicacion_aul ?></td>
          <td class="text-center"><?php echo $aulaTemporal->nombre_bloq ?></td>


          <td class="text-center">
            <a href="<?php echo site_url(); ?>/aulas/editar/<?php echo $aulaTemporal->id_aul ?>" onclick="

              ">
                <i class="glyphicon glyphicon-pencil" title="editar"></i>
            </a>
            <a  href="<?php echo site_url(); ?>/aulas/eliminarAula/<?php echo $aulaTemporal->id_aul ?>"
               onclick="confirmation(event)">

              <i class="glyphicon glyphicon-trash" title="eliminar"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
<div class="alet alert-danger">
<br><br><br>
no se encuentra usuarios registrado
</div>
<?php endif; ?>
