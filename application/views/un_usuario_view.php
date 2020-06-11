<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>template/estilos.css">
        <title>Perfil de <?=$titulo?></title>
    </head>
    <body>
        <div class="bigblock">
        <img class="imgprofile" src="<?=base_url()?>images/<?=$usuario->imagen?>" width="80">
        <section class="littleblock">
        Nombre: <?= $usuario->nombre?>
        </section >
        <section class="littleblock">
        Usuario: <?= $usuario->usuario?>
        </section class="littleblock">
        <section class="littleblock">
        Correo: <?= $usuario->correo?>
        </section>
        </div>
        <br>
        <div class="bigblock">
        <h2 class="littleblock">Posts realizados</h2>
        <?php foreach ($posts as $fila):?>
        <table align="center">
            <tr>
                <th>
                    <div class="littleblock" >
                    <img src="<?=base_url()?>images/<?=$fila->imagen?>" width="60">
                    </div>
                </th>
                <th>   
                    <p class="littleblock">Titulo: <a href="<?= base_url().'index.php/un_post/arti/',$fila->id.'/'.$fila->imagen.'/'.$fila->opinion.'/'.$fila->titulo.'/'.$fila->id_usuario?>" title="Ver Post"><?= $fila->titulo; ?></a></p>
                </th>
            </tr>
        </table>
        <?php endforeach; ?>
        </div>
    </body>
</html>