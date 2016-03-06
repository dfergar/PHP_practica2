
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Artículos</div>
  <div class="panel-body">
    <h2>Información del pedido</h2>
  </div>

  <!-- Table -->
  <h2><?="Pedido nº ".$pedido->idPedido." de fecha ".$pedido->FechaRealizacion." Estado: ".$this->Productos_model->estado_pedido($pedido->Estado)?></h2>
  <table class="table">
      <tr>
          <th>Producto</th><th></th><th>Precio</th><th>Unidades</th><th>Importe</th>
      </tr>
         
          <?php foreach ($lineas as $items): ?>
         
  
      <tr>          
          <td><?=$this->Productos_model->get_prod_id($items->Producto_idProducto)->Nombre?></td>
          <td><a href="<?=site_url('productos/detalle/'.$items->Producto_idProducto)?>" class="btn btn-primary" role="button">Detalles</a></td>
          <td><?=number_format($items->Precio,2,',','.')?></td>
          <td><?=$items->Cantidad?></td>
          <td><?=number_format($items->Precio*$items->Cantidad,2,',','.')?></td>
          
      </tr>
      
      <?php endforeach; ?>
      
  </table>
 
</div>
 <button class="btn btn-primary" onClick="history.back()">Volver</button>
 <?php if($pedido->Estado==1):?>
 <a class="btn btn-primary" href="<?=site_url('compras/cancelar_pedido/'.$pedido->idPedido)?>">Cancelar Pedido</a>
 <?php endif; ?>

 
         
