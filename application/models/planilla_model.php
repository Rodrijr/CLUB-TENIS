<?php

class Planilla_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // ---------------------- Metodos OBJETIVOS DE JUGADOR ---------------------- //

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

    public function existe_planilla_obj_jugador_de_alumno($id_alumno)
    {
        $data = array(
            'id_alumno' => $id_alumno
            );
        $query = $this->db->get_where('objetivos_del_jugador', $data);
        if($query->num_rows() >= 1)
            return 1;
        else
            return 0;
    }

    // ---------------------- Metodos PERFIL DE JUGADOR ---------------------- //

    public function llenar_datos_perfil_de_jugador($perfil_de_jugador)
    {
        $id_alumno = $perfil_de_jugador['id_alumno'];
        $perfil_jugador = array(
                'id_alumno' => $id_alumno,
                'servicios' => $perfil_de_jugador['servicios']['servicios']."-".$perfil_de_jugador['servicios']['aspectos_positivos']."-".$perfil_de_jugador['servicios']['aspectos_a_mejorar'],
                'devolucion' => $perfil_de_jugador['devolucion']['devolucion']."-".$perfil_de_jugador['devolucion']['aspectos_positivos']."-".$perfil_de_jugador['devolucion']['aspectos_a_mejorar'],
                'cancha' => $perfil_de_jugador['cancha']['cancha']."-".$perfil_de_jugador['cancha']['aspectos_positivos']."-".$perfil_de_jugador['cancha']['aspectos_a_mejorar'],
                'red' => $perfil_de_jugador['red']['red']."-".$perfil_de_jugador['red']['aspectos_positivos']."-".$perfil_de_jugador['red']['aspectos_a_mejorar'],
                'aspecto_mental' =>  $perfil_de_jugador['aspecto_mental']['aspecto_mental']."-".$perfil_de_jugador['aspecto_mental']['aspectos_positivos']."-".$perfil_de_jugador['aspecto_mental']['aspectos_a_mejorar'],
                'competicion' =>  $perfil_de_jugador['competicion']['competicion']."-".$perfil_de_jugador['competicion']['aspectos_positivos']."-".$perfil_de_jugador['competicion']['aspectos_a_mejorar']
            );

        $query = $this->db->get_where('perfil_de_jugador', array('id_alumno' => $id_alumno));
        if($query->num_rows() >=1 )
            $this->db->update('perfil_de_jugador',$perfil_jugador);
        else
            $this->db->insert('perfil_de_jugador',$perfil_jugador);
    }

    public function obtener_perfil_jugador_por_id_alumno($id_alumno)
    {
        $data = array(
            'id_alumno' => $id_alumno
            );
        $query = $this->db->get_where('perfil_de_jugador', $data);
        return $query->row_array();
    }

    public function existe_perfil_jugador_de_alumno($id_alumno)
    {
        $data = array(
            'id_alumno' => $id_alumno
            );
        $query = $this->db->get_where('perfil_de_jugador', $data);
        if($query->num_rows() >= 1)
            return 1;
        else
            return 0;
    }
}
?>
