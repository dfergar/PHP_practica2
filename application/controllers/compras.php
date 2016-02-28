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

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $contenido=$this->load->view('carrito_view',Array('articulos'=>$this->contenido()),true);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }
   
   function agregar($id)
   {
       
       $articulo=$this->Productos_model->get_prod_id($id);
       $this->carrito->agregar($articulo);
       redirect('compras');       
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
   
   
}
?>
