<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Carrito {
    
    private function CI()
    {
        return get_instance();
    }
    
    public function agregar($articulo)
    {
       if($this->buscar_articulo($articulo->idProducto))
       {
           $cesta=$this->CI()->session->userdata('cesta');
           $und=$cesta[$articulo->idProducto]['und']+1;
           $item=['Nombre'=>$articulo->Nombre, 'PrecioVenta'=>$articulo->PrecioVenta, 'und'=>$und];
       }
       else
       {
           $item=['Nombre'=>$articulo->Nombre, 'PrecioVenta'=>$articulo->PrecioVenta, 'und'=>1];
       }    
       $cesta=$this->CI()->session->userdata('cesta');
       $cesta[$articulo->idProducto]=$item;       
       $this->CI()->session->set_userdata('cesta', $cesta);
        
    }
    
    public function contenido()
    {
        
        return $this->CI()->session->userdata('cesta');
        
    }
    
    public function buscar_articulo($id)
    {
        
            $cesta=$this->CI()->session->userdata('cesta');
            foreach($cesta as $idProducto=>$valor)
            {
                if($idProducto==$id)
                {
                    return TRUE;
                }
                
            }
            
            
        
        return FALSE;
    }
    
    public function narticulos()
    {
        $cesta=$this->CI()->session->userdata('cesta');
        return  count($cesta);
    }
    
    public function vaciar()
    {
        $this->CI()->session->unset_userdata('cesta');
    }
}

