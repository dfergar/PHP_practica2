<html>
    <head>
        <title>REGISTRO</title>
    </head>
    <body>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
        
        
        <form action="" method="POST">
            <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="Usuario" class ="form-control" value="<?=set_value('Usuario')?>" size="50" />
            <label>Contraseña</label>
            <input type="password" name="Password" class ="form-control" value="<?=set_value('Password')?>" size="50" />
            <label>Confirmar contraseña</label>
            <input type="password" name="passconf" class ="form-control" value="<?=set_value('passconf')?>" size="50" />
            <label>Nombre</label>
            <input type="text" name="Nombre" class ="form-control" value="<?=set_value('Nombre')?>" size="50" />
            <label>Apellidos</label>           
            <input type="text" name="Apellidos" class ="form-control" value="<?=set_value('Apellidos')?>" size="50" />
             <input type="hidden" name="Estado" value="1" /> 
            <label>DNI</label>
            <input type="text" name="Dni" class ="form-control" value="<?=set_value('Dni')?>" size="50" />
            <label>Email</label>
            <input type="text" name="Correo" class ="form-control" value="<?=set_value('Correo')?>" size="50" />
            <label>Dirección</label>
            <input type="text" name="Direccion" class ="form-control" value="<?=set_value('Direccion')?>" size="50" />
            <label>Código Postal</label>
            <input type="text" name="CodigoPostal" class ="form-control" value="<?=set_value('CodigoPostal')?>" size="50" />
            <label>Provincia</label>
            <?=form_dropdown('Provincia', $this->Usuarios_model->get_provincias(), set_value('Provincia'), 'class="form-control"');?>

            
            <div><input type="submit" value="Enviar" /></div>
            </div>
        </form>
    </body>
</html>