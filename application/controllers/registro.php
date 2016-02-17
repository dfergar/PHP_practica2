<?php
class Registro extends CI_Controller {
    function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('usuarios_model');
                
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
        
        $this->form_validation->set_rules('username', 'Usuario','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Contraseña','trim|required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('min_length', 'El campo %s debe teneres un mínimo de 5 caracteres');
        $this->form_validation->set_message('max_length', 'El campo %s debe teneres un máximo de 12 caracteres');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('valid_email', 'El campo %s no tiene un formato válido');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('registro_view');
            
        }
        else
        {
            $this->load->view('login_ok_view');
        }
       
    }
}
?>
