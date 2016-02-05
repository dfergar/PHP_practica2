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
}
?>

