
<html>
    <head>
        <title>MENSAJE</title>
    </head>
    <body>
         <div class="alert alert-success" style="padding: 60px; font-size: 30px; text-align: center;">
             <?=$mensaje?>
         </div>
        <a class="btn btn-default" href="<?=site_url('productos')?>">Volver a la tienda</a>
        <?php if($mensaje!="Pedido cancelado correctamente"):?>
        <button class="btn btn-primary" role="button" onClick="history.back()">Volver</button>
        <?php endif?>
       
    </body>
</html>


