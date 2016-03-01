<?php

class Productos_model extends CI_Model{

   function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
           
    function get_destacados($por_pagina,$segmento) 
    {
        $consulta = $this->db->query("SELECT * FROM Producto WHERE Destacado=1 LIMIT $segmento, $por_pagina");
        $data=array();
        foreach($consulta->result() as $fila)
        {
            $data[] = $fila;
        }
        return $data;
    }
      
    function get_prod_id($id)
    {
        $consulta = $this->db->query("SELECT * FROM Producto WHERE idProducto='$id'");
        return $consulta->row();
                
        
    }
    
    function get_prod_categoria($prod_categoria, $por_pagina,$segmento)
    {
        $producto = $this->db->query("SELECT * FROM Producto WHERE Categoria='$prod_categoria' LIMIT $segmento, $por_pagina");
        return $producto->result();
    }
    
    function get_categorias()
    {
        $categoria = $this->db->query("SELECT * FROM Categoria");
        return $categoria->result();
    }
    
    	
    //obtenemos el total de filas para hacer la paginación
    function filas()
    {
            $consulta = $this->db->query("SELECT * FROM Producto WHERE Destacado=1");
            return  $consulta->num_rows() ;
    }

    //obtenemos el total de filas para hacer la paginación
    function filas_categoria($categoria)
    {
            $consulta = $this->db->query("SELECT * FROM Producto WHERE Categoria=$categoria");
            return  $consulta->num_rows() ;
    }
     
    /**
     * Comprobar si hay disponibilidad de las unidades del producto solicitado
     * @param type $id:     id del producto
     * @param type $und:    unidades solicitadas
     * @return boolean
     */
    function check_stock($id)
    {
        $consulta = $this->db->query("SELECT * FROM producto WHERE idProducto=$id");
        if($consulta->row()->Stock==0)
        {
            return FALSE;
        }
        else return TRUE;
    }
            
	
     
     
	
}

?>

