<h3>TABLA BLOQUES</h3><br>
<?php if ($listadoBloques): ?>
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">NOMBRE</th>
       <th class="text-center">FECHA</th>

        <th class="text-center">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listadoBloques->result() as $bloqueTemporal): ?>
        <tr>
          <td class="text-center"><?php echo $bloqueTemporal->id_bloq ?></td>
          <td class="text-center"><?php echo $bloqueTemporal->nombre_bloq ?></td>
          <td class="text-center"><?php echo $bloqueTemporal->fecha_bloq ?></td>


          <td class="text-center">
            <a href="<?php echo site_url(); ?>/bloques/editar/<?php echo $bloqueTemporal->id_bloq ?>" onclick="

              ">
                <i class="glyphicon glyphicon-pencil" title="editar"></i>
            </a>
            <a  href="<?php echo site_url(); ?>/bloques/eliminarBloques/<?php echo $bloqueTemporal->id_bloq ?>"
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
<script>
function confirmation(ev) {
 ev.preventDefault();
 var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
 console.log(urlToRedirect); // verify if this is the right URL
 Swal.fire({
title: '¿Estas seguro?',
text: "¡Esto sera permanente!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '¡Borralo!',
cancelButtonText:'Cancelar',
background: '',
color:''
}).then((result) => {
if (result.isConfirmed) {
  window.location.href = urlToRedirect;
}
});
}
</script>
