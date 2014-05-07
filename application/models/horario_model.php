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
        $this->db->order_by('hora', 'asc');
        $query = $this->db->get_where('horarios',$data);
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

    public function crear_horario($hora, $id_grupo, $id_entrenador, $tipo)
    {
        $datosHorario = array(
                'hora' => $hora,
                'id_grupo' => $id_grupo,
                'id_entrenador' => $id_entrenador,
                'tipo' => $tipo
            );
        $resp = $this->db->insert('horarios', $datosHorario);
        if($resp==1 )
            return "El Horario Fue Registrado Exitosamente...!!";
        else
            return "El Horario Ya Existe...!!";
    }

    public function buscar_horario_por_todos_sus_datos($hora, $id_grupo, $id_entrenador)
    {
        $datosHorario = array(
                'hora' => $hora,
                'id_grupo' => $id_grupo,
                'id_entrenador' => $id_entrenador
            );
        $query = $this->db->get_where('horarios',$datosHorario);
        if($query->num_rows() >=1 )
            return 1;
        else
            return 0;
    }
}
?>
