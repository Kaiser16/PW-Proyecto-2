<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>template/estilos.css">
	<meta charset="utf-8">
	<title>Registro de usuario</title>
</head>
<body>
	<div class="topbar">
	<table align="center">
		<tr>
			<th>	
			<a class="topbarblock" href="<?= base_url().'index.php/usuarios/'?>"title="Iniciar Sesión"> Iniciar Sesión</a>
			</th>
		</tr>
	</table>
	</div>
	<h1 class="littleblock">Registrar usuario</h1>
	<?php if(isset($mensaje)):?>
		<h2 class="littleblock"><?= $mensaje?></h2>
	<?php endif;?>
	<div class="bigblock">
	<form class="bigblock" action="<?=base_url()?>index.php/usuarios/verify_registro" method="post" enctype="multipart/form-data">
	<section class="littleblock">
		<input type="file" name="img">
	</section>
	<br>
	<section class="littleblock">
	<?= form_label('Nombre','Nombre'); ?>
	<?= form_input('nombre',@set_value('nombre')) ?> <br><br>
	</section>
	<section class="littleblock">
	<?= form_label('Correo','Correo'); ?>
	<?= form_input('correo',@set_value('correo')); ?> <br><br>
	</section>
	<section class="littleblock">
	<?= form_label('Usuario','Usuario'); ?>
	<?= form_input('usuario',@set_value('usuario')); ?> <br><br>
	</section>
	<section class="littleblock">
	<?= form_label('Contaseña','Contraseña'); ?>
	<?= form_input('pass'); ?> <br><br>
	</section>
	<section class="littleblock">
	<?= form_label('Repetir contraseña','Repetir contraseña'); ?>
	<?= form_input('pass2'); ?> <br><br>
	</section>
	<?= form_submit('submit_reg','Registrar'); ?>
	</div>
	</form>

	<?= validation_errors(); ?>
	<?php if(isset($error)):?>
		<p><?= $error?></p>
	<?php endif;?>
</body>
</html>