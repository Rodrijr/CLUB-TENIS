<?php

class Planilla_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function llenar_datos_planilla_objetivos_de_jugador($objetivos_de_jugador)
    {
    	$id_alumno = $objetivos_de_jugador['id_alumno'];
    	$obj_de_jugador = array(
                'id_alumno' => $id_alumno,
                'objetivos_tecnicos' => $objetivos_de_jugador['obj_tecnicos']['primera']."-".$objetivos_de_jugador['obj_tecnicos']['segunda']."-".$objetivos_de_jugador['obj_tecnicos']['tercera'],
                'objetivos_tacticos' => $objetivos_de_jugador['obj_tacticos']['primera']."-".$objetivos_de_jugador['obj_tacticos']['segunda']."-".$objetivos_de_jugador['obj_tacticos']['tercera'],
                'objetivos_psicologicos' => $objetivos_de_jugador['obj_psicologicos']['primera']."-".$objetivos_de_jugador['obj_psicologicos']['segunda']."-".$objetivos_de_jugador['obj_psicologicos']['tercera'],
                'objetivos_de_competicion' => $objetivos_de_jugador['obj_de_competicion']['primera']."-".$objetivos_de_jugador['obj_de_competicion']['segunda']."-".$objetivos_de_jugador['obj_de_competicion']['tercera'],
                'observaciones' => $objetivos_de_jugador['observaciones'],
            );

        $query = $this->db->get_where('objetivos_del_jugador', array('id_alumno' => $id_alumno));
        if($query->num_rows() >=1 )
            $this->db->update('objetivos_del_jugador',$obj_de_jugador);
        else
        	$this->db->insert('objetivos_del_jugador',$obj_de_jugador);
    }

    public function obtener_obj_de_jugador_por_id_alumno($id_alumno)
    {
    	$data = array(
    		'id_alumno' => $id_alumno
    		);
    	$query = $this->db->get_where('objetivos_del_jugador', $data);
    	return $query->row_array();

    }
}
?>
