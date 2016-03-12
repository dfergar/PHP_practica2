
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Artículos</div>
  <div class="panel-body">
    <h2>Información del pedido</h2>
  </div>

  <!-- Table -->
   
  <table class="table">
      <tr>
          <th>Producto</th><th></th><th>Precio</th><th>Unidades</th><th>Importe</th><th></th>
      </tr>
         
          <?php foreach ($articulos as $clave=>$items): ?>
         
  
      <tr>          
          <td><?=$items['Nombre']?></td>
          <td><a href="<?=site_url('productos/detalle/'.$clave)?>" class="btn btn-primary" role="button">Detalles</a></td>
          <td><?=number_format($items['PrecioVenta'],2,',','.')?></td>
          <td><?=$items['und']?></td>
          <td><?=number_format($items['Importe'],2,',','.')?></td>
          <td><a href="<?=site_url('compras/eliminar/'.$clave)?>">Eliminar</a></td>
      </tr>
      
      <?php endforeach; ?>
      <tr style="font-weight: bold">
          <td>NOMBRE</td>
          <td><?=$datos_usuario->Nombre.$datos_usuario->Apellidos?></td>
          <td colspan="2" style="text-align: right; font-weight: bold">TOTAL</td>
          <td><?=number_format($this->carrito->total(),2,',','.');?></td> 
      </tr>
      <tr style="font-weight: bold">
          <td>DIRECCION DE ENVIO</td>
          <td><?=$datos_usuario->Direccion?></td>
          <td colspan="2" style="text-align: right; font-weight: bold">Base Imp.</td>
          <td><?=number_format($this->carrito->base_iva()['base'],2,',','.');?></td> 
      </tr>
      <tr style="font-weight: bold">
          <td>CODIGO POSTAL</td>
          <td><?=$datos_usuario->CodigoPostal?></td>
          <td colspan="2" style="text-align: right; font-weight: bold">Iva</td>
          <td><?=number_format($this->carrito->base_iva()['iva'],2,',','.');?></td> 
      </tr>
      <tr style="font-weight: bold">
          <td>PROVINCIA</td>
          <td><?=$this->Usuarios_model->get_provincia($datos_usuario->Provincia)?></td>
          <td colspan="2" style="text-align: right; font-weight: bold">ENVIO</td>
          <td><?="GRATIS"?></td>      
      </tr>
  </table>
 
</div>
 <button class="btn btn-primary" onClick="history.back()">Volver</button>
 <a class="btn btn-primary" href="<?=site_url('compras/pedido')?>">CONFIRMAR PEDIDO</a>
         
