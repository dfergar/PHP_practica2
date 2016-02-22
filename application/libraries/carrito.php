<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Carrito {
    
    private function CI()
    {
        return get_instance();
    }
    
    public function agregar($id)
    {
        $cesta=$this->CI()->session->userdata('cesta');
        if(array_keys($cesta, $id)>0) $cesta[$id]++;
        else $cesta[$id]=1;
        $this->CI()->session->set_userdata('cesta', $cesta);
    }
}

