<div class="panel panel-default">
  <!-- Default panel contents -->
 
  <div class="panel-body">
    <h2>Información del pedido</h2>
  </div>

  <!-- Table -->
   
  <table style="width: 600px;" class="table">
      <tr>
          <th>Producto</th><th>Precio</th><th>Unidades</th><th>Importe</th>
      </tr>
         
          <?php foreach ($articulos as $clave=>$items): ?>
         
  
       <tr style="font-weight: bold;">           
          <td><?=$items['Nombre']?></td>          
          <td><?=number_format($items['PrecioVenta'],2,',','.')?></td>
          <td><?=$items['und']?></td>
          <td><?=number_format($items['Importe'],2,',','.')?></td>          
      </tr>
      
      <?php endforeach; ?>
      <tr style="font-weight: bold">          
          <td colspan="2"><?=$datos_usuario->Nombre.$datos_usuario->Apellidos?></td>
          <td>TOTAL</td>
          <td><?=number_format($this->carrito->total(),2,',','.');?></td> 
      </tr>
      <tr style="font-weight: bold">          
          <td colspan="2"><?=$datos_usuario->Direccion?></td>
          <td>Base Imp.</td>
          <td><?=number_format($this->carrito->base_iva()['base'],2,',','.');?></td> 
      </tr>
      <tr style="font-weight: bold">         
          <td colspan="2"><?=$datos_usuario->CodigoPostal?></td>
          <td>Iva</td>
          <td><?=number_format($this->carrito->base_iva()['iva'],2,',','.');?></td> 
      </tr>
      <tr style="font-weight: bold">         
          <td colspan="2"><?=$this->Usuarios_model->get_provincia($datos_usuario->Provincia)?></td>
          <td>ENVIO</td>
          <td><?="GRATIS"?></td>      
      </tr>
  </table>
 
</div>
