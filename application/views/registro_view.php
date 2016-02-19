<html>
    <head>
        <title>Mi Formulario</title>
    </head>
    <body>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
        
        
        <form action="" method="POST">
            <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="username" class ="form-control" value="<?=set_value('username')?>" size="50" />
            <label>Contraseña</label>
            <input type="text" name="password" class ="form-control" value="<?=set_value('password')?>" size="50" />
            <label>Confirmar contraseña</label>
            <input type="text" name="passconf" class ="form-control" value="<?=set_value('passconf')?>" size="50" />
            <label>Nombre</label>
            <input type="text" name="nombre" class ="form-control" value="<?=set_value('nombre')?>" size="50" />
            <label>Apellidos</label>
            <input type="text" name="apellidos" class ="form-control" value="<?=set_value('apellidos')?>" size="50" />
            <label>DNI</label>
            <input type="text" name="dni" class ="form-control" value="<?=set_value('dni')?>" size="50" />
            <label>Dirección</label>
            <input type="text" name="direccion" class ="form-control" value="<?=set_value('direccion')?>" size="50" />
            <label>Código Postal</label>
            <input type="text" name="cp" class ="form-control" value="<?=set_value('cp')?>" size="50" />
            <label>Provincia</label>
            <?=form_dropdown('provincias', $this->usuarios_model->get_provincias(), set_value('provincias'), 'class="form-control"');?>

            <label>Email</label>
            <input type="text" name="email" class ="form-control" value="<?=set_value('email')?>" size="50" />
            <div><input type="submit" value="Enviar" /></div>
        </form>
    </body>
</html>