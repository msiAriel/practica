<form class="" action="<?php echo site_url();?>/aulas/actualizarAulas" method="post">
  <div class="form-group">
    <input type="hidden" name="id_aul" id="id_aul" value="<?php echo $aulasEditar->id_aul; ?>">
  <label for="email">Nombre del Bloque:</label>
  <input type="text" class="form-control" id="nombre_aul" name="nombre_aul" value="<?php echo $aulasEditar->nombre_aul; ?>">
</div>
<div class="form-group">
  <label for="pwd">fecha:</label>
  <input type="text" class="form-control" id="ubicacion_aul" name="ubicacion_aul" value="<?php echo $aulasEditar->ubicacion_aul; ?>">
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>
