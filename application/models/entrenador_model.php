<?php 

class Entrenador_model extends CI_Model
{
	var $details;
	public function __construct()
	{
		$this->load->database();
	}

	public function obtener_todos_los_entrenador()
	{		
		$query = $this->db->get('entrenador');
		return $query->result_array();
	}
    
    public function registrar_entrenador($entrenador)
    {
        $ci = $entrenador['ci_persona'];
        
        $query = $this->db->get_where('persona', array('ci_persona' => $ci));
            
        
        if($query->num_rows() >=1 )
        {
            return "El numero de CI ya fue registrado";
        }
        else
        {
            $resp = $this->db->insert('persona', $entrenador);

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

    public function obtener_todos_los_entrenadores()
    {       
        $data = array(
            'tipo' => 'Entrenador'
        );
        $query = $this->db->get_where('persona',$data);
        return $query->result_array();
    }

    public function obtener_todos_los_cursos_entrenador($ci)
    {
        $data = array(
            'id_entrenador' => $ci
        );
        $query = $this->db->get_where('grupo', $data);
        return $query->result_array();
    }
    
    public function obtener_entrenador_ID($id_entrenador)
    {
         $query = $this->db->get_where('persona', array('id_persona' => $id_entrenador));
         return $query->result_array();
    }
    
    public function buscar_entrenador_por_nombre($nombre)
    {
        $this->db->select('*');
        $this->db->like('nombre_persona', $nombre);
        $this->db->where('tipo', 'Entrenador');
        $query=$this->db->get('persona');
        return $query->result_array();
    }

}

?>