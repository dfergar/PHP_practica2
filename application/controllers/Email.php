<?php
class Email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
 
	public function sendMail($usuario)
	{
		$this->load->model('Usuarios_model');
                $this->load->helper(array('form', 'url'));

                $correo=$this->Usuarios_model->GetUsuario($usuario)->Correo;

                $categorias=$this->Productos_model->get_categorias();
                $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
                $pie=$this->load->view('pie', Array(), TRUE);  
                
                //cargamos la libreria email de ci
		$this->load->library("email");
 
		//configuracion para gmail
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.iessansebastian.com',
			
			'smtp_user' => 'aula4@iessansebastian.com',
			'smtp_pass' => 'daw2alumno',
			'mailtype' => 'html',
			
		);    
 
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($config);
 
		$this->email->from('aula4@iessansebastian.com', 'Backline Instrumentos Musicales');
		$this->email->to($correo);
		$this->email->subject('Recuperación de contraseña');
		$this->email->message('<a href="www.iessansebastian.com">Enlace</a>');
		$this->email->send();
                
                $mensaje="Se ha enviado un eMail de recuperación";              
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
                
                $contenido=$this->load->view('mensajes_view', Array('mensaje'=>$mensaje), TRUE);
                $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
	}
}

