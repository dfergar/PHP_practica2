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
            <input type="text" name="Usuario" class ="form-control" value="<?=set_value('Usuario')?>" size="50" />
            <label>Contraseña</label>
            <input type="text" name="Password" class ="form-control" value="<?=set_value('Password')?>" size="50" />
            
           
            <div><input type="submit" value="Enviar" /></div>
        </form>
    </body>
</html>