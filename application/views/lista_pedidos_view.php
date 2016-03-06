
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Artículos</div>
  <div class="panel-body">
    <h2>Lista de Pedidos</h2>
  </div>

  <!-- Table -->
   
  <table class="table">
      <tr>
          <th>Referencia</th><th>Fecha</th><th>Estado</th><th></th>
      </tr>
         
          <?php foreach ($pedidos as $items): ?>
         
  
      <tr>          
          <td><?=$items->idPedido?></td>
          <td><?=$items->FechaRealizacion?></td>
          <td><?=$this->Productos_model->estado_pedido($items->Estado)?></td>
          <td><a href="<?=site_url('compras/ver_pedido_archivo/'.$items->idPedido)?>">Ver Pedido</a></td>
      </tr>
      
      <?php endforeach; ?>
      
  </table>
 
</div>
 <button class="btn btn-primary" onClick="history.back()">Volver</button>
 
         
