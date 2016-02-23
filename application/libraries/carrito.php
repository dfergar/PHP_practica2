<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Carrito {
    
    private function CI()
    {
        return get_instance();
    }
    
    public function agregar($articulo)
    {
        $cesta=$this->CI()->session->userdata('cesta');
        $cesta[]=$articulo;
        $this->CI()->session->set_userdata('cesta', $cesta);
    }
    
    public function narticulos()
    {
        $cesta=$this->CI()->session->userdata('cesta');
        return  count($cesta);
    }
}

