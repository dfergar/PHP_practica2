
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Artículos</div>
  <div class="panel-body">
    <p>Listado</p>
  </div>

  <!-- Table -->
   
  <table class="table">
      <tr>
      <th>Producto</th><th>Precio</th><th>Unidades</th><th>Importe</th>
      </tr>
      <?php print_r($articulos)?>
          <?php foreach ($articulos as $items): ?>
  
      <tr>
          <td><?=$items['Nombre']?></td>
          <td><?=$items['PrecioVenta']?></td>
          <td><?=$items['und']?></td>
          <td></td>
      </tr>
      <?php endforeach; ?>
  </table>
</div>
         
