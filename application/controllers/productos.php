<?php

class productos extends CI_Controller {

   function __construct()
   {
       parent::__construct();
       $this->load->helper('url');
       $this->load->model('Productos_model');
   }
   
    /*function index()
   {
      
        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE);
        $cuerpo=$this->Productos_model->get_destacados();
        $contenido=$this->load->view('productos_view',Array('productos'=>$cuerpo),true);
       
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }*/
   
   function index($comienzo=0)
	{
		
                $categorias=$this->Productos_model->get_categorias();
                $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
                $pie=$this->load->view('pie', Array(), TRUE);               
     
                $pages=4; //Número de registros mostrados por páginas
		$this->load->library('pagination'); //Cargamos la librería de paginación
		$config['base_url'] = site_url('productos/index'); // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->Productos_model->filas();//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
                $config['num_links'] = 20; //Número de links mostrados en la paginación
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
                $config["uri_segment"] = 3;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación		
		$cuerpo = $this->Productos_model->get_destacados($config['per_page'],$comienzo);	
                $contenido=$this->load->view('productos_view',Array('productos'=>$cuerpo),true);
                $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
                
               
	}
   
   function ver_categoria($categoria, $comienzo=0)
   {
        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias, 'categoria'=>$categoria),  TRUE);
        $pie=$this->load->view('pie', Array(), TRUE);
        
        $pages=3; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = site_url('productos/ver_categoria/'.$categoria); // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->Productos_model->filas_categoria($categoria);//calcula el número de filas  
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';//primer link
        $config['last_link'] = 'Última';//último link
        $config["uri_segment"] = 4;//el segmento de la paginación
        $config['next_link'] = 'Siguiente';//siguiente link
        $config['prev_link'] = 'Anterior';//anterior link
        $this->pagination->initialize($config); //inicializamos la paginación		
        //$cuerpo = $this->Productos_model->total_paginados($config['per_page'],$comienzo);
                
        $cuerpo=$this->Productos_model->get_prod_categoria($categoria, $config['per_page'],$comienzo);
        $contenido=$this->load->view('productos_view',Array('productos'=>$cuerpo),true);
       
        $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
   }
   
   
}
?>
