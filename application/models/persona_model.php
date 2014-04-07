<?php 
	
class Persona_model extends CI_Model
{
	var $details;
	public function __construct()
	{
		$this->load->database();
	}
    public function ver_perfil_Persona_CI($ci)
	{
        $query = $this->db->get_where('persona', array('ci_persona' => $ci)); 
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();
        }
        return "";
	}
    public function ver_mi_perfil()
	{
       //$ci= $_SESSION["ci_persona"];
        $ci="123";
        $query = $this->db->get_where('persona', array('ci_persona' => $ci)); 
   
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();            
        }
        return "";
	}
    public function editar_perfil_Persona_ID($id)
	{
    }
}

?>