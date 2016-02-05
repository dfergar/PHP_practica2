<?php

class productos extends CI_Controller {

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
        $cuerpo=$this->Productos_model->get_destacados();
        $contenido=$this->load->view('productos_view',Array('productos'=>$cuerpo),true);
       
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }
   
   function ver_categoria($categoria)
   {
        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE);
        $cuerpo=$this->Productos_model->get_prod_categoria($categoria);
        $contenido=$this->load->view('productos_view',Array('productos'=>$cuerpo),true);
       
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }
}
?>
