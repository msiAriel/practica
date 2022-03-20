<br><br>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-3">
    <h3>Formulario</h3><br>
    <form class="" action="<?php echo site_url();?>/bloques/insertarBloques" method="post" id="frm_nuevo_bloque">
      <div class="form-group">
      <label for="email">Nombre del Bloque:</label>
      <input type="text" class="form-control" id="nombre_bloq" name="nombre_bloq" required>
    </div>
    <div class="form-group">
      <label for="pwd">fecha:</label>
      <input type="date" class="form-control" id="fecha_bloq" name="fecha_bloq" required>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="col-md-1">

  </div>
  <div class="col-md-6">
    <div class="" id="contenedor_listado_bloques">
  </div>

</div>

<script type="text/javascript">
	function cargarBloques(){
	  $("#contenedor_listado_bloques").load('<?php echo site_url("bloques/listado") ?>')
	}
	cargarBloques();
</script>

<script type="text/javascript">
  $("#frm_nuevo_bloque").validate({
  rules:{
    nombre_bloq:{
      required:true,
      remote:{
            url:"<?php echo site_url('bloques/validarBloque'); ?>",
            data:{
              "nombre_bloq":function(){
                return $("#nombre_bloq").val();
              }
            },
            type:"post"
          }

    },
    fecha_bloq:{
      required:true
    }
  },
  messages:{
    nombre_bloq:{
      required:"Por favor ingrese el nombre",
      remote:"Bloque existente"
    },
    fecha_bloq:{
      required:"Por favor ingrese la ubicacion",

    }
  },

	errorElement : 'span'
});
</script>
