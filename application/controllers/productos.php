<?php
//HOH

class productos extends CI_Controller {

   function __construct()
   {
       parent::__construct();
       $this->load->helper('url');
       $this->load->model('Productos_model');
   }
   
    function index()
   {
        $cabecera=$this->load->view('cabecera', Array(), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE);
        $cuerpo=$this->Productos_model->get_producto();
        $contenido=$this->load->view('productos_view',Array('productos'=>$cuerpo),true);
       
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }
}
?>
