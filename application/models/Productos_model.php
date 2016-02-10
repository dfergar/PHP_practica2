<?php

class Productos_model extends CI_Model{

   function __construct()
   {
       parent::__construct();
       $this->load->database();
   }
   
    function get_producto()
    {
        $producto = $this->db->query("SELECT * FROM Producto");
        return $producto->result();
    }
    
    function get_destacados()
    {
        $producto = $this->db->query("SELECT * FROM Producto WHERE Destacado=1");
        return $producto->result();
    }
    
    function get_prod_categoria($prod_categoria)
    {
        $producto = $this->db->query("SELECT * FROM Producto WHERE Categoria='$prod_categoria'");
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
        
    //obtenemos todas las provincias a paginar con la función
    //total_posts_paginados pasando la cantidad por página y el segmento
    //como parámetros de la misma
	function total_paginados($por_pagina,$segmento) 
        {
            $consulta = $this->db->query("SELECT * FROM Producto WHERE Destacado=1 LIMIT $segmento, $por_pagina");
            $data=array();
            foreach($consulta->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
	}
     
     
	
}

?>

