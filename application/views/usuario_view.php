
<html>
    <head>
        <title>REGISTRO</title>
    </head>
    <body>
        <?=print_r($data)?>
        <?=print_r($this->session->userdata())?>
        <table class="table">
            <tr>
                <td>Usuario</td><td><?=$data->Usuario?></td>
            </tr>
                
            <tr>
                <td>Nombre</td><td><?=$data->Nombre?></td>
            </tr>
                
            <tr>
                <td>Apellidos</td><td><?=$data->Apellidos?></td>
            </tr>
                
            <tr>
                <td>DNI</td><td><?=$data->Dni?></td>
            </tr>
                
            <tr>
                <td>Correo</td><td><?=$data->Correo?><td>
            </tr>
                
            <tr>
                <td>Direccion</td><td><?=$data->Direccion?></td>
            </tr>
                
            <tr>
                <td>Codigo Postal</td><td><?=$data->CodigoPostal?></td>
            </tr>
                
            <tr>
                <td>Provincia</td><td><?=$this->Usuarios_model->get_provincia($data->Provincia);?></td>
            </tr>
        </table>
        <a class="btn btn-default" href="<?=site_url('usuario/set_usuario/'.$data->Usuario)?>">Modificar</a>
        <a class="btn btn-default" href="<?=site_url('usuario/recuperar/'.$data->idUsuario)?>">Recuperar Password</a>
        <a class="btn btn-default" href="<?=site_url('usuario/baja/'.$data->idUsuario)?>">Eliminar Usuario</a>
    </body>
</html>


