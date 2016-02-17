<html>
    <head>
        <title>Mi Formulario</title>
    </head>
    <body>
        <?php echo validation_errors(); ?>
        <?php echo form_open('registro'); ?>
        <h5>Usuario</h5>
        <input type="text" name="username" value="<?=set_value('username')?>" size="50" />
        <h5>Contraseña</h5>
        <input type="text" name="password" value="<?=set_value('password')?>" size="50" />
        <h5>Confirmar contraseña</h5>
        <input type="text" name="passconf" value="<?=set_value('passconf')?>" size="50" />
        <h5>Nombre</h5>
        <input type="text" name="nombre" value="<?=set_value('nombre')?>" size="50" />
        <h5>Apellidos</h5>
        <input type="text" name="apellidos" value="<?=set_value('apellidos')?>" size="50" />
        <h5>Usuario</h5>
        <input type="text" name="username" value="<?=set_value('username')?>" size="50" />
        <h5>DNI</h5>
        <input type="text" name="dni" value="<?=set_value('dni')?>" size="50" />
        <h5>Dirección</h5>
        <input type="text" name="direccion" value="<?=set_value('direccion')?>" size="50" />
        <h5>Código Postal</h5>
        <input type="text" name="cp" value="<?=set_value('cp')?>" size="50" />
        <h5>Provincia</h5>
        <?=form_dropdown('provincias', $this->usuarios_model->get_provincias(), set_value('provincias'), 'class="form-control"');?>
       
        <h5>Email</h5>
        <input type="text" name="email" value="<?=set_value('email')?>" size="50" />
        <div><input type="submit" value="Enviar" /></div>
        </form>
    </body>
</html>