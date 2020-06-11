<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>template/estilos.css">
	<meta charset="utf-8">
	<title>Nuevo Post</title>
</head>
<body>	
	<h1 class="littleblock">Insertar Post</h1>
	<section>
	<form class="bigblock" action="<?=base_url()?>index.php/formulario/validar" method="post" enctype="multipart/form-data">
		<section>
		<input class="littleblock" type="file" name="img">
		</section>
		<br>
		<section class="littleblock">
		<?= form_label('Titulo','Titulo',array('class'=>'label')); ?>
		<?= form_input('titulo','','class="input"') ?>
		</section>
		<br>
		<br>
		<section class="littleblock">
		<?= form_label('Opinion','Opinion',array('class'=>'label')); ?> 
		<br>
		<?= form_textarea('opinion','','class="textarea" row="50xp"' ); ?>
		</section>
		<br>
		<?= form_submit('submit','Enviar Datos','class="label"'); ?>
	</form>
	</section>
	<h3 class="littleblock">Posibles errores</h3>
	<?= validation_errors(); ?>
	<?php if(isset($error)):?>
		<p><?= $error?></p>
	<?php endif;?>
</body>
</html>