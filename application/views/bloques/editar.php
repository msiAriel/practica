<form class="" action="<?php echo site_url();?>/bloques/actualizarBloques" method="post">
  <div class="form-group">
    <input type="hidden" name="id_bloq" id="id_bloq" value="<?php echo $bloquesEditar->id_bloq; ?>">
  <label for="email">Nombre del Bloque:</label>
  <input type="text" class="form-control" id="nombre_bloq" name="nombre_bloq" value="<?php echo $bloquesEditar->nombre_bloq; ?>">
</div>
<div class="form-group">
  <label for="pwd">fecha:</label>
  <input type="date" class="form-control" id="fecha_bloq" name="fecha_bloq" value="<?php echo $bloquesEditar->fecha_bloq; ?>">
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>
