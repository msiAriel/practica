<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Practicando para el GIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>recursos/bootstrap/js/bootstrap.js">
    </script>

    <!--Importando push.js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.js" integrity="sha512-x0GVeKL5uwqADbWOobFCUK4zTI+MAXX/b7dwpCVfi/RT6jSLkSEzzy/ist27Iz3/CWzSvvbK2GBIiT7D4ZxtPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script type="text/javascript">
							function lanzarNotificacion() {
								Push.Permission.request();//solicitar permiso
								Push.create('NOTIFICACIÓN',{
									body:'Procesando requerimiento',
									icon:'<?php echo base_url('/img/favicon.png') ?>',
									timeout:10000,
									vibrate:[100,100,100],
									onClick:function(){
										alert("ok");
									}
								});
							}
              function lanzarNotificacionEnc() {
								Push.Permission.request();//solicitar permiso
								Push.create('NOTIFICACIÓN',{
									body:'Procesando encuesta',
									icon:'<?php echo base_url('/img/favicon.png') ?>',
									timeout:10000,
									vibrate:[100,100,100],
									onClick:function(){
										alert("ok");
									}
								});
							}
              function lanzarNotificacionEmp() {
								Push.Permission.request();//solicitar permiso
								Push.create('NOTIFICACIÓN',{
									body:'Procesando empleado nuevo',
									icon:'<?php echo base_url('/img/favicon.png') ?>',
									timeout:10000,
									vibrate:[100,100,100],
									onClick:function(){
										alert("ok");
									}
								});
							}
		</script>

    <!-- controlador de alertas controllers/clientes -->
  <?php if ($this->session->flashdata("confirmacion")): ?>
    <!-- codigo del framewrok de ventanas emergentes -->
    <script type="text/javascript">
      $(document).ready(function(){
        Swal.fire(
        'Correcto!',
        '<?php echo $this->session->flashdata("confirmacion"); ?>',
// se  puede editar el tipo de alerta en la ventana
        'success'
      );
    });
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata("error")): ?>
    <!-- codigo del framewrok de ventanas emergentes -->
    <script type="text/javascript">
      $(document).ready(function(){
        Swal.fire(
        'ERROR',
        '<?php echo $this->session->flashdata("error"); ?>',
// se  puede editar el tipo de alerta en la ventana
        'error'
      );
    });
    </script>
  <?php endif; ?>
<!-- framework para ventanas de confirmacion -->


<meta name="theme-color" content="#212529">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="shortcut icon" type="image/png" href="./img/evolution.png">
  <link rel="apple-touch-icon" href="./agenda.png">
  <link rel="apple-touch-startup-image" href="./agenda.png">
  <meta name="apple-mobile-web-app-title" content="Practicando">
  <link rel="manifest" href="<?php echo base_url(); ?>manifest.json">
  <script type="text/javascript" src="<?php echo base_url('script.js'); ?>"></script>


  </head>
  <body>
<br>
<div class="row">
  <div class="col-md-1">

  </div>
  <div class="col-md-11 text-left">
    <h2>
      <b>GESTION DE AULAS Y BLOQUES ARIEL</b>
    </h2>

  </div>
</div>
<div class="row">
  <div class="col-md-1">

  </div>
  <div class="col-md-11">
    <ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="<?php echo site_url() ?>/aulas/gestionAulas">Gestion Aulas</a></li>
  <li role="presentation"><a href="<?php echo site_url() ?>/bloques/gestionBloques">Gestion Bloques</a></li>
</ul>
  </div>

</div><br>
<legend></legend>
