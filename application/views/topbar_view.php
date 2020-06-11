<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>template/estilos.css">
    </head>
    <body>
        <div class="topbar">
            <table align="center">
                <tr>
                    <th>	
                    <a class="topbarblock" href="<?=base_url().'index.php/un_usuario/usu/',$this->session->usuario?>"><?=$this->session->usuario?> 
                    <?php if($this->session->userdata('admin')):?>
                    🛡️
                    <?php endif?>
                    </a>
                    </th>
                    
                    <th>
                    <a class="topbarblock" href="<?= base_url().'index.php/posts'?>"title="Posts">Página Principal</a>
                    </th>
 
                    <th>
                    <a class="topbarblock" href="<?= base_url().'index.php/usuarios/'?>">Cerrar Sesion</a>
                    </th>
                </tr>
            </table>
        </div>
    </body>
</html>