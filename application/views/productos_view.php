


    
 <?php foreach ($productos as $items): ?>

 

<div class="row">
  <div class="col-sm-4 col-md-2">
    <div class="thumbnail">
      <img src="<?=base_url()?><?=$items->Imagen ?>" style="height: 300px;">
      <div class="caption">
        <h5><?=$items->Nombre ?></h5>
        <p style="font-size: 25px;">
            <?=$items->PrecioVenta." €" ?>
            <!--<input style="font-size: 15px; text-align: center; margin: 10px;" type="number" min="0" max="99" value="0">Und-->
        </p>
        <p>
            
            <a id="und" href="<?=site_url('compras/agregar/'.$items->idProducto)?>" class="btn btn-primary" role="button">Comprar</a> 
            <a href="<?=site_url('productos/detalle/'.$items->idProducto)?>" class="btn btn-default" role="button">Detalles</a>
        </p>
      </div>
    </div>
  </div>
  

<?php endforeach; ?>
    <div class="row">
        <div class="col-md-12" style="text-align: center"><?php echo $this->pagination->create_links() ?></div>
    </div>   
  