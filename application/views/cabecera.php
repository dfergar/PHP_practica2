<!DOCTYPE html>
<html lang="en">
<head>
  <title>BACKLINE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="page-header">
    <h1>BACKLINE INSTRUMENTOS MUSICALES</h1>      
  </div>
</div>

<div class="container-fluid">
   
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          
          <li <?php if(!isset($categoria)):?>class="active"<?php endif;?>>
              <a href="<?=base_url()?>index.php">Destacados</a>
          </li>
                <?php foreach ($categorias as $items): ?>  
          
                    <li <?php if(isset($categoria)):if($categoria==$items->idCategoria):?> class="active"<?php endif; endif; ?>>
                      <a href="<?=site_url('productos/ver_categoria/'.$items->idCategoria) ?>"><?=$items->Nombre ?> <span class="sr-only">(current)</span></a>
                    </li>
                    
                <?php endforeach; ?>          
      </ul>
        
        
        
        
      
      <ul class="nav navbar-nav navbar-right">
            
          <?php if (null !==$this->session->userdata('Usuario')):?>
                    <li><a><?=$this->session->userdata('Usuario');?></a> </li>
                    <li><a href="<?=site_url('login/CerrarSesion');?>">Cerrar sesión</a></li>
          <?php else:?>
                    <li><a href="<?=site_url('registro')?>">Registro</a></li>
                    <li><a href="<?=site_url('login')?>">Login</a></li>
                    
          <?php endif?>
                    
                    <li>
                        <button onClick="location.href='<?=site_url('compras')?>'" type="button" class="btn btn-default" aria-label="Left Align" style="margin-top: 8px;">
                              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        </button>
                    </li>
                    <li><a><?=$this->carrito->narticulos()." ";?>Artículos</a></li>
                    <li><a href="<?=site_url('compras/vaciar');?>">Vaciar carrito</a></li>
                        
                 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>


