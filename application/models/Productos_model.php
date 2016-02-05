<?php

class Productos_model extends CI_Model {

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
}
?>

