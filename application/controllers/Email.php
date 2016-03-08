<?php
class Email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
 
	public function sendMailGmail($id)
	{
		$this->load->model('Usuarios_model');
                $this->load->helper(array('form', 'url'));

                $correo=$this->Usuarios_model->GetUsuario($id)['Correo'];

                $categorias=$this->Productos_model->get_categorias();
                $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
                $pie=$this->load->view('pie', Array(), TRUE);  
                
                //cargamos la libreria email de ci
		$this->load->library("email");
 
		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'danielobajo@gmail.com',
			'smtp_pass' => 'bajista1',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);
 
		$this->email->from('danielobajo@gmail.com');
		$this->email->to("$correo");
		$this->email->subject('Recuperación de contraseña');
		$this->email->message('<a href="www.iessansebastian.com">Enlace</a>');
		$this->email->send();
                
                $mensaje="Se ha enviado un correo con un enlace para la recuperación de contraseña a <?=$correo?>";
                
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
                
                $contenido=$this->load->view('mensajes_view', Array('mensaje'=>$mensaje), TRUE);
                $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
	}
}

