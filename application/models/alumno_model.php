<?php 
session_start();
		
class Alumno_model extends CI_Model
{
	var $details;
	public function __construct()
	{
		$this->load->database();
	}
    public function obtener_Padre_Alumno_ID()
	{
        $id=$this->session->userdata('id_usuario');
       //$id= $_SESSION["id_padre"];
        $query = $this->db->get_where('padre_alumno', array('id_padre' => $id));   
        if($query->num_rows() >= 1 )
        {
          
            return $query->result_array();
        } 	
		return "";
	}

    public function obtener_Alumno_ID($id)
    {
        $query = $this->db->get_where('persona', array('id_persona' => $id));  
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();
        } 	
        return "";
    }
    public function ver_perfil($id_persona)
    {
        $query= $this->db->get_where('persona',array('id_persona'=> $id_persona));
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();            
        }
        return "";
	}
}

?>