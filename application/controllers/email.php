<?php
class email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
 
	public function sendMailGmail($correo)
	{
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
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2>');
		$this->email->send();
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
	}
}

