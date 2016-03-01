

 <div class="row">
  <div class="col-sm-4 col-md-3">
    <div class="thumbnail">
      <img src="<?=base_url()?><?=$detalles->Imagen ?>">
      <div class="caption">
        <h3><?=$detalles->Nombre ?></h3>
        <p><?=$detalles->PrecioVenta ?></p>
        <p>
             <a href="<?=site_url('compras/agregar/'.$detalles->idProducto)?>" class="btn btn-primary" role="button">Comprar</a> 
             <button class="btn btn-primary" role="button" onClick="history.back()">Volver</button>
        </p>
      </div>
    </div>
  </div>
     
            
  <div class="panel panel-default">
            <div class="panel-heading"><?=$detalles->Nombre ?></div>
                <div class="panel-body">
            <?=$detalles->Descripcion ?>
                </div>
            
            </div>            
                
     
   </div>
         
 </div>
    
  

        
        
         
  
        
       





