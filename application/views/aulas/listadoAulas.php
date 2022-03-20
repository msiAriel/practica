<br><br>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-3">
    <!-- <div class="" id="contenedor_formulario_aulas"></div> -->
    <h3>Formulario</h3>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Bloque</button>
<div class="" id="contenedor_formulario_aulas"></div>
  </div>
  <div class="col-md-1">

  </div>
  <div class="col-md-6">
    <!-- <button type="button" name="button" class="btn btn-primary" onclick="cargarAulas();">Actualizar Tabla</button><br> -->
    <div id="contenedor_listado_aulas"></div>
  </div>

</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">
          <b>Nuevo Bloque Academico</b>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo site_url();?>/bloques/insertarBloques1" method="post" id="frm_nuevo_bloque">
          <div class="form-group" id="bloque">
          <label for="email">Nombre del Bloque:</label>
          <input type="text" class="form-control" id="nombre_bloq" name="nombre_bloq">
        </div>
        <div class="form-group">
          <label for="pwd">fecha:</label>
          <input type="date" class="form-control" id="fecha_bloq" name="fecha_bloq">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btn_append">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  function cerrarModal(){

    $("#myModal").modal('hide');

  }
</script>
<script type="text/javascript">
	function cargarAulas(){
	  $("#contenedor_listado_aulas").load('<?php echo site_url("aulas/tabla"); ?>');
	}
	cargarAulas();
</script>

<script type="text/javascript">
	function cargarFormulario(){
	  $("#contenedor_formulario_aulas").load('<?php echo site_url("aulas/formulario"); ?>');
	}
	cargarFormulario();
</script>



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
      required:"<br>Por favor ingrese el nombre",
      remote:"bloque existente"
    },
    fecha_bloq:{
      required:"<br>Por favor ingrese la fecha",

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
  									text: "bloque Guardada Exitosamente",
  									icon:'success',
  		});
      cerrarModal();
      cargarFormulario();
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
