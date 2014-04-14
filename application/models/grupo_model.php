<?php

class Grupo_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}
    public function obtener_horario($id_grupo)
    {
        $query = $this->db->get_where('horario', array('id_grupo' => $id_grupo)); 
        return $query->result_array();
    }
    public function obtener_grupo_ID($id_grupo)
    {
         $query = $this->db->get_where('grupo', array('id_grupo' => $id_grupo)); 
        return $query->result_array();
    }

    public function obtener_grupo_por_id($id_grupo)
    {
    	$query = $this->db->get_where('grupo', array('id_grupo' => $id_grupo)); 
        return $query->row_array();
    }

    public function actualizar_grupo($id,$nuevo_grupo)
    {
        $this->db->where('id_grupo',$id);
        return $this->db->update('grupo',$nuevo_grupo);
    }

    public function obtener_todos_los_grupos()
    {
        $query = $this->db->get('grupo');
        return $query->result_array();
    }
}
?>
