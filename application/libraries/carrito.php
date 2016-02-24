<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Carrito {
    
    private function CI()
    {
        return get_instance();
    }
    
    public function agregar($id)
    {
        $cesta=$this->CI()->session->userdata('cesta');
        $cesta[]=$id;
        $this->CI()->session->set_userdata('cesta', $cesta);
        
    }
    
    public function contenido()
    {
        return $this->CI()->session->userdata('cesta');
        
    }
    
    public function narticulos()
    {
        $cesta=$this->CI()->session->userdata('cesta');
        return  count($cesta);
    }
}

