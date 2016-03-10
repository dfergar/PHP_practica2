<?php
class Recuperarpass extends CI_Controller {
    function index()
    {
        $categorias=$this->Productos_model->get_categorias();
        $cabecera=$this->load->view('cabecera', Array('categorias'=>$categorias), TRUE);
        $pie=$this->load->view('pie', Array(), TRUE);         

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Usuarios_model');
                
           
        $this->form_validation->set_rules('Usuario', 'Usuario','trim|required|min_length[5]|max_length[12]|callback_ExisteUsuario');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('min_length', 'El campo %s debe teneres un mínimo de 5 caracteres');
        $this->form_validation->set_message('max_length', 'El campo %s debe teneres un máximo de 12 caracteres');
        $this->form_validation->set_message('ExisteUsuario', 'El nombre de usuaro no existe');
        
        if ($this->form_validation->run() == FALSE)
        {
            
            $contenido=$this->load->view('recuperar_view',Array(),true);
            $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));
            
        }
        else
        {
            
            $pass=rand(0,999999 );
            
            
            $username = $this->input->post('Usuario');
            $usuario=$this->Usuarios_model->GetUsuario($username);
            $correo= $usuario->Correo;
            $data=array(
                        
                        'Password' => sha1($pass),
                        
                    );
            $this->Usuarios_model->UpdateUsuario($usuario->idUsuario, $data);
            
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

            //cargamos la configuración para enviar con el correo del servidor gerion
            $this->email->initialize($config);

            $this->email->from('aula4@iessansebastian.com', 'Backline Instrumentos Musicales');
            $this->email->to($correo);
            $this->email->subject('Recuperación de contraseña');
            $this->email->message("Su contraseña provisional es:".$pass);
            $this->email->send();

            $mensaje=$correo." ".$pass;
            //$mensaje="Se ha enviado un eMail de recuperación";              
            //con esto podemos ver el resultado
            var_dump($this->email->print_debugger());

            $contenido=$this->load->view('mensajes_view', Array('mensaje'=>$mensaje), TRUE);
            $this->load->view('plantilla_view',Array('cabecera'=>$cabecera, 'contenido'=>$contenido,'pie'=>$pie));

            
        }
        
        
    }
    
    public function ExisteUsuario($user)
    {

    if($this->Usuarios_model->ExisteUsuario($user)) return TRUE; 
       else return FALSE;

    }
}
?>

