<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Carrito {
    
    private function CI()
    {
        return get_instance();
    }
    
    public function agregar($articulo, $unds)
    {
       if($this->buscar_articulo($articulo->idProducto))
       {
           $cesta=$this->CI()->session->userdata('cesta');
           $und=$cesta[$articulo->idProducto]['und']+$unds;
           $item=['Nombre'=>$articulo->Nombre,
                  'PrecioVenta'=>$articulo->PrecioVenta,
                  'und'=>$und,
                  'Descuento'=>$articulo->Descuento,
                  'Iva'=>$articulo->Iva
                   ];
       }
       else
       {
           $item=['Nombre'=>$articulo->Nombre, 
                  'PrecioVenta'=>$articulo->PrecioVenta, 
                  'und'=>$unds,
                  'Descuento'=>$articulo->Descuento, 
                  'Iva'=>$articulo->Iva
                   ];
       }    
       $item['Importe']=$item['PrecioVenta']*$item['und'];
       $cesta=$this->CI()->session->userdata('cesta');
       $cesta[$articulo->idProducto]=$item;       
       $this->CI()->session->set_userdata('cesta', $cesta);      
       
        
    }
    
    public function eliminar($id)
    {
        $cesta=$this->CI()->session->userdata('cesta');
        if($cesta[$id]['und']>1)
        {
            $cesta[$id]['und']--;
            $cesta[$id]['Importe']=$cesta[$id]['PrecioVenta']*$cesta[$id]['und'];
            $this->CI()->session->set_userdata('cesta', $cesta);    
        }
        else 
        {
            unset($cesta[$id]);
            if(count($cesta>0))
            {   
                $this->CI()->session->set_userdata('cesta', $cesta);  
            }
            else
            {
                $this->CI()->session->unset_userdata('cesta');
            }
            
        }
        
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
        $total_unidades=0;
        $cesta=$this->CI()->session->userdata('cesta');
        if(count($cesta)!=0)
        {
            foreach($cesta as $item)
            {
                $total_unidades+=$item['und'];
            }
            return  $total_unidades;
        }
        else {return 0;}
    }
    
    public function vaciar()
    {
        $this->CI()->session->unset_userdata('cesta');
    }
    
    public function total()
    {
        $total_importe=0;        
        $cesta=$this->CI()->session->userdata('cesta');
        foreach($cesta as $item)
            {
                $total_importe+=$item['Importe'];
            }
            return  $total_importe;
    }
    
    public function base_iva()
    {
        $total_base=0; 
        $total_iva=0;
        $cesta=$this->CI()->session->userdata('cesta');
        foreach($cesta as $item)
            {
                $total_base+=$item['Importe']-$item['Importe']*21/100;
                $total_iva+=$item['Importe']*21/100;
            }
        $total=array(
            'base'=>$total_base,
            'iva'=>$total_iva,
        );
            return  $total;
    }
}

