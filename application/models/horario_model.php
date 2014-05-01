<?php

class Horario_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function obtener_todos_los_horarios()
    {
        $this->db->from('horario');
        $this->db->order_by('desde', 'asc');
        $query = $this->db->get(); 
       // $this->db->order_by('desde','asc');
       // $query = $this->db->get('horario');
        return $query->result_array();
    }

    public function obtener_todos_los_horarios_de_grupo($id_grupo)
    {
        $data = array(
            'id_grupo' => $id_grupo
        );
        $query = $this->db->get_where('grupo_horario_alumno',$data);
        return $query->result_array();
    }

    public function obtener_horario_por_id($id_horario)
    {
        $data = array(
            'id_horario' => $id_horario
        );
        $query = $this->db->get_where('horario',$data);
        return $query->row_array();
    }
}
?>
