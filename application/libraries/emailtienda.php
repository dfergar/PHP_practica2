<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class emailtienda {
    
    private function CI()
    {
        return get_instance();
    }
 
	public function sendMail($mensaje, $correo)
	{		                             
               
                
                //cargamos la libreria email de ci
		$this->CI()->load->library("email");
 
		//configuracion para gmail
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.iessansebastian.com',
			
			'smtp_user' => 'aula4@iessansebastian.com',
			'smtp_pass' => 'daw2alumno',
			'mailtype' => 'html',
			
		);    
 
		//cargamos la configuración para enviar con gmail
		$this->CI()->email->initialize($config);
 
		$this->CI()->email->from('aula4@iessansebastian.com', 'Backline Instrumentos Musicales');
		$this->CI()->email->to($correo);
		$this->CI()->email->subject('Pedido realizado a Backline');
		$this->CI()->email->message($mensaje);
		$this->CI()->email->send();
                                       
		//con esto podemos ver el resultado
		var_dump($this->CI()->email->print_debugger());
                
                
	}
}

