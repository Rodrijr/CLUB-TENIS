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
        $query = $this->db->get_where('padre_alumno', array('ci_padre' => $id));    
            return $query->result_array();
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
    public function obtener_Alumno_CI($id)
    {
        $query = $this->db->get_where('persona', array('ci_persona' => $id));  
        return $query->result_array();
       
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
    public function verificar_ci($alumno)
    {
        $ci = $alumno['ci_persona'];
        $query = $this->db->get_where('persona', array('ci_persona' => $ci));
            
        
        if($query->num_rows() >=1 )
        {
            return "El numero de CI ya fue registrado";
        }
        else
        {
            return "registrar";
        }
    }
    public function registrar_alumno($alumno)
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
    
    public function ver_lista_alumnos()
    {
       $this->db->order_by('apellido_persona', 'asc');
       $query = $this->db->get_where('persona', array('tipo' => 'Alumno'));
       return $query->result_array();
    }

    public function obtener_id_alumno_por_nombre_apellido($nombre_alumno, $apellido_alumno)
    {
        $data = array(
            'nombre_persona' => $nombre_alumno,
            'apellido_persona' => $apellido_alumno,
            'tipo' => 'Alumno'
            );
        $query = $this->db->get_where('persona',$data);
        return $query->row_array();
    }

    public function obtener_alumno_por_id($id_alumno)
    {
       $query = $this->db->get_where('persona', array('id_persona' => $id_alumno, 'tipo' => 'Alumno')); 
       return $query->row_array();
    }
}

?>