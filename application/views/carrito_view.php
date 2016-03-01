
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Artículos</div>
  <div class="panel-body">
    <p>Listado</p>
  </div>

  <!-- Table -->
   
  <table class="table">
      <tr>
          <th>Producto</th><th>Precio</th><th>Unidades</th><th>Importe</th><th></th>
      </tr>
          <?php //print_r($articulos);?>
          <?php foreach ($articulos as $items): ?>
  
      <tr>          
          <td><?=$items['Nombre']?></td>
          <td><?=number_format($items['PrecioVenta'],2,',','.')?></td>
          <td><?=$items['und']?></td>
          <td><?=number_format($items['Importe'],2,',','.')?></td>
          <td><a href="<?=site_url('compras/eliminar/'.key($articulos))?>">Eliminar</a></td>
      </tr>
      
      <?php endforeach; ?>
      <tr style="font-weight: bold">
          <td colspan="3" style="text-align: right; font-weight: bold">TOTAL</td>
          <td><?=number_format($this->carrito->total(),2,',','.');?></td>          
      </tr>
  </table>
 
</div>
 <button onClick="history.back()">Volver</button>
         
