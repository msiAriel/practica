
<form class="" action="<?php echo site_url();?>/aulas/insertarAula" method="post" id="frm_nuevoAula">
  <div class="form-group">
  <label for="email">Nombre del Aula ariel:</label>
  <input type="text" class="form-control" id="nombre_aul" name="nombre_aul" required>
</div>
<div class="form-group">
  <label for="pwd">Ubicacion:</label>
  <input type="text" class="form-control" id="ubicacion_aul" name="ubicacion_aul" required>
</div>
<div class="form-group" >
  <label for="">Bloque:</label>
  <select class="form-control" name="fk_id_bloq" id="fk_id_bloq" required>
    <option  value="">---Seleccione---</option>
    <?php if ($listadoBloques): ?>
                <?php foreach ($listadoBloques->result() as $bloqueTemporal): ?>
                  <option value="<?php echo $bloqueTemporal->id_bloq; ?>" id="agregar">
                    <?php echo $bloqueTemporal->id_bloq; ?> - <?php echo $bloqueTemporal->nombre_bloq; ?>
                  </option>
                <?php endforeach; ?>
    <?php endif; ?>
  </select>

</div>

<button type="submit" class="btn btn-default" >Submit</button>
</form>

<script type="text/javascript">
  $("#frm_nuevoAula").validate({
  rules:{
    nombre_aul:{
      required:true
    },
    ubicacion_aul:{
      required:true
    },
    fk_id_bloq:{
      required:true
    }
  },
  messages:{
    nombre_aul:{
      required:"<br>Por favor ingrese el nombre"
    },
    ubicacion_aul:{
      required:"<br>Por favor ingrese la ubicacion",

    },
    fk_id_bloq:{
      required:"<br> Por favor seleccione el bloque"
    }
  },
  submitHandler:function(form){
    var url=$(form).prop("action");
    $.ajax({
      url:url,//action del formulario
      type:'post',//definiendo el tipo de envio de datos post/get
      data:$(form).serialize(), //enviando los datos ingresados en el formulario
      success:function(data){ //funcion que se ejecuta cuando SI se realiza la peticion
        Swal.fire({

  									title: 'Confirmación',
  									text: "Aula Guardada Exitosamente",
  									icon:'success',
  		});
      cargarAulas();
      $(form)[0].reset();
      },
      error:function(data){ //funcion que se ejecuta cuando NO se realiza la peticion
      alert('Error al insertar, intente nuevamente');
       }
    });
  }
	// errorElement : 'span'
});
</script>
