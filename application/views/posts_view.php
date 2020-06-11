<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>template/estilos.css">
	<title><?= $titulo_web?></title>
</head>
<body>
	<div class="bigblock">
	<h1 class="littleblock">Foro sobre contenido audiovisual</h1>
	<a class="topbarblock" href="<?= base_url().'index.php/formulario/'?>" title="Añadir Post">Añadir Post</a>

	<p class="littleblock"><?=$mensaje?></p>
	<?= form_open('posts/busqueda') ?>
	<?= form_input('busqtitulo') ?>
	<?= form_submit('Busqueda','Busqueda') ?>
	<?= form_close() ?>
	<?php foreach ($posts as $fila):?>
	<table align="center">
		<tr>
			<th>
				<div class="littleblock" >
				<img src="<?=base_url()?>images/<?=$fila->imagen?>" width="60">
				</div>
			</th>
			<th>
				<div class="littleblock" >
				<p class="littleblock">Titulo: <a href="<?= base_url().'index.php/un_post/arti/',$fila->id.'/'.$fila->imagen.'/'.$fila->opinion.'/'.$fila->titulo.'/'.$fila->id_usuario?>" title="Ver Post"><?= $fila->titulo; ?></a></p>
				<p class="littleblock">Realizado por: <a href="<?=base_url().'index.php/un_usuario/usu/',$fila->id_usuario?>"><?=$fila->id_usuario?></a></p>
				</div>
			</th>
		</tr>
	</table>
	<?php endforeach; ?>
	<p><?php echo $links; ?></p>
</body>
</html>