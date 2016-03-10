<html>
    <head>
        <title>Mi Formulario</title>
    </head>
    <body>
        <h2>Recuperación de constraseña</h2>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
        
        
        <form action="" method="POST">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="Usuario" class ="form-control" value="<?=set_value('Usuario')?>" size="50" />
                <br>            
                <input type="submit" value="Enviar" class="btn btn-default" />
            </div>
        </form>
    </body>
</html>