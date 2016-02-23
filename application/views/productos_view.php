

<?php foreach ($productos as $items): ?>

    

<div class="row">
  <div class="col-sm-4 col-md-3">
    <div class="thumbnail">
      <img src="<?=base_url()?><?=$items->Imagen ?>">
      <div class="caption">
        <h3><?=$items->Nombre ?></h3>
        <p><?=$items->PrecioVenta ?></p>
        <p><a href="#" class="btn btn-primary" role="button">Comprar</a> <a href="<?=site_url('carrito/agregar/'.$items)?>" class="btn btn-default" role="button">Detalles</a></p>
      </div>
    </div>
  </div>
  

<?php endforeach; ?>
    <div class="row">
        <div class="col-md-12" style="text-align: center"><?php echo $this->pagination->create_links() ?></div>
    </div>
    
    
  

        
        
         
  
        
       





