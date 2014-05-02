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
    
    public function registrar_alumno($alumno)
    {
        $ci = $alumno['ci_persona'];
        
        $query = $this->db->get_where('persona', array('ci_persona' => $alumno['ci_persona']));        
        if($query->num_rows() >=1 )
        {
            return "El numero de CI ya fue registrado";
        }
        else
        {
            $resp = $this->db->insert('persona', $alumno);

            if($resp==1)
            {
                return "El registro fue existoso";
            }
            else
            {
                return "Revise el formato de los datos";
            }
        }
    }
    
     public function ver_lista_alumnos()
    {
       $query = $this->db->get_where('persona', array('tipo' => 'Alumno')); 
       return $query->result_array();
    }
}

?>