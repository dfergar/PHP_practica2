<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>Assets/css/bootstrap.css"/>
        <script type="text/javascript" src="<?=base_url()?>Assets/js/tienda.js" ></script>
    </head>
    <body>
        <div class="container"><?=$cabecera?></div>
        
        <div class="container"><?=$contenido?></div>
        <div class="container"><?php echo $this->pagination->create_links() ?></div>
        
        <div clas="container"><?=$pie?></div>        
        
       
    </body>
</html>






