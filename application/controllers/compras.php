<?php

class Compras extends CI_Controller {

  
    function __construct()
   {
       parent::__construct();
       $this->load->helper('url');
       $this->load->model('Productos_model');
   }
   
   function index()
   {
        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE);         
                
        $contenido=$this->load->view('carrito_view',Array('articulos'=>$this->contenido()),true);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }
   
   function agregar($id)
   {
       
       $articulo=$this->Productos_model->get_prod_id($id);
       $encarrito=0;
       //$n_unidades=$_POST['dataString'];
       
       if(isset($this->session->userdata('cesta')[$id]['und'])) $encarrito+=$this->session->userdata('cesta')[$id]['und'];
       if($articulo->Stock-$encarrito>0)
       {
          $this->carrito->agregar($articulo, 1);
          //$this->carrito->agregar($articulo, $n_unidades);
          redirect('compras');       
       }
       else
       {
        
        $this->load->helper(array('form', 'url'));
       
        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE);     

        
        $mensaje="Lo sentimos, solamente queda ".$articulo->Stock." ".$articulo->Nombre;
        $this->session->unset_userdata('Usuario');
        $contenido=$this->load->view('mensajes_view', Array('mensaje'=>$mensaje), TRUE);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
       }
        
   }
   
   function eliminar($id)
   {
       $this->carrito->eliminar($id);
       redirect('compras');  
       
   }
   
   function contenido()
   {
       
        if(null===$this->carrito->contenido())
        {
            redirect('productos');
        }
        else 
        {
           return $this->carrito->contenido();
            
        }
            
   }
   
   function vaciar()
   {
       $this->carrito->vaciar();
       redirect('compras');
   }
   
   function comprar()
   {
        $this->load->model('Usuarios_model');
        $this->load->helper(array('form', 'url'));     

        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE); 
       
        if (null ===$this->session->userdata('Usuario'))
        {
            $mensaje="Debe loguearse o registrarse para realizar el pedido";
            $contenido=$this->load->view('mensajes_view', Array('mensaje'=>$mensaje), TRUE);
            $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));       
        }
        else 
        {
             $contenido=$this->load->view('pedido_view',Array('articulos'=>$this->contenido()),true);
             $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
        }
   }
   
   function pedido()
   {
        $this->load->model('Usuarios_model');
        $this->load->helper(array('form', 'url', 'date'));     

        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE); 
        
        //Añadir Pedido
        $usuario=$this->Usuarios_model->GetUsuario($this->session->userdata('Usuario'));
        $datestring="%d-%m-%Y";
        $data=array(
            'NombreUsuario'=>$usuario->Nombre,
            'ApellidosUsuario'=>$usuario->Apellidos,
            'DireccionUsuario'=>$usuario->Direccion,
            'DniUsuario'=>$usuario->Dni,
            'ProvinciaUsuario'=>$usuario->Provincia,
            'CodigoPostalUsuario'=>$usuario->CodigoPostal,
            'Estado'=>1,
            'FechaRealizacion'=>mdate($datestring, now()),
            'Usuario_idUsuario'=>$usuario->idUsuario        
        );        
        $this->Productos_model->AddPedido($data);
        
        //Añadir líneas de producto
        $pedido=$this->Productos_model->UltimoPedido();
        $cesta=$this->contenido();
        foreach($cesta as $clave=>$items)
        {   
                        
            $lineas=array(
                'Cantidad'=>$items['und'],
                'Descuento'=>$items['Descuento'],
                'Iva'=>$items['Iva'],
                'Pedido_idPedido'=>$pedido,
                'Precio'=>$items['PrecioVenta'],
                'Producto_idProducto'=>$clave
            );
            $this->Productos_model->AddLinea($lineas);
            
        }   
        
        
        $mensaje="Pedido realizado correctamente";
        $contenido=$this->load->view('mensajes_view', Array('mensaje'=>$mensaje), TRUE);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));       
   }
   
   /*function ver_pedido($id)
   {
        $this->load->model('Usuarios_model');
        $this->load->helper(array('form', 'url', 'date'));     

        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE); 
        
        $pedidos=$this->Usuarios_model->GetPedidos($id);
        
        $contenido=$this->load->view('lista_pedidos', Array('pedidos'=>$pedidos), TRUE);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));       
   }*/
   
   function ver_pedido_archivo($idPedido)
   {
        $this->load->model('Usuarios_model');
        $this->load->helper(array('form', 'url', 'date'));     

        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE); 
        
        $pedido=$this->Productos_model->GetPedido($idPedido);
        $lineas=$this->Productos_model->GetLineas($idPedido);
                
        $contenido=$this->load->view('pedido_archivo_view', Array('pedido'=>$pedido, 'lineas'=>$lineas), TRUE);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));       
   }
   
   function cancelar_pedido($idPedido)
   {
        $this->load->model('Productos_model');
        $this->load->helper(array('form', 'url', 'date'));     

        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE); 
        
        $this->Productos_model->DeletePedido($idPedido);
       
        $mensaje="Pedido cancelado correctamente";
        $contenido=$this->load->view('mensajes_view', Array('mensaje'=>$mensaje), TRUE);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));     
   }
   
    
    
   
   
   
   
}
?>
