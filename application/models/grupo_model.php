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

    public function desasignar_entrenador_de_grupo($id_grupo)
    {
        $nuevo_grupo = array(
            'id_entrenador'=>0
        );
        $this->db->where('id_grupo',$id_grupo);
        $this->db->update('grupo',$nuevo_grupo);
        $afftected_rows = $this->db->affected_rows();
        if($afftected_rows==1)
            return "El Entrenador fue Des-asignado del grupo exitosamente";
        else
            return "Error al Des-asignar este Entreador del grupo ";
    }

    public function asignar_entrenador_de_grupo($id_grupo, $id_entrenador)
    {
        $nuevo_grupo = array(
            'id_entrenador'=>$id_entrenador
        );
        $this->db->where('id_grupo',$id_grupo);
        $this->db->update('grupo',$nuevo_grupo);
        $afftected_rows = $this->db->affected_rows();
        if($afftected_rows==1)
            return "El Entrenador fue Asignado Exitosamente";
        else
            return "Error al Asignar este Entreador";
    }
}
?>
