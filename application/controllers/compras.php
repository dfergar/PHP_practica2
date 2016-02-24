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
        
        $cuerpo=$this->contenido();      
                      
        
        $contenido=$this->load->view('carrito_view',Array('articulos'=>$cuerpo),true);
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }
   
   function agregar($id)
   {
       
       $this->carrito->agregar($id);
       redirect('compras');
       
   }
   
   function contenido()
   {
       
       $ids=$this->carrito->contenido();
       foreach($ids as $item)
       {
           $items[]=$this->Productos_model->get_prod_id($item);
       }
       return $items;
   }
   
   
}
?>
