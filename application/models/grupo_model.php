<?php

class Grupo_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}
    public function obtener_horario($id_grupo)
    {
        $query = $this->db->get_where('horario', array('id_grupo' =>$id_grupo)); 
        //print_r($query);
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
    public function grupos_entrenador($id_entrenador)
    {
        $query = $this->db->get_where('grupo', array('id_entrenador' => $id_entrenador)); 
            //print_r($query->result_array());
            return $query->result_array();            
    }
    public function id_alumno_horario($id_hora)
    {
         $query = $this->db->get_where('alumno_horario',array('id_horario' => $id_hora));                  
        return $query->result_array();
    }
}
?>
