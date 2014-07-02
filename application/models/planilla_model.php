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

    // ---------------------- Metodos Evaluacion Personal ---------------------- //

    public function llenar_datos_evaluacion_personal($evaluacion_personal)
    {
        $id_alumno = $evaluacion_personal['id_alumno'];
        $evaluacion = array(
                'id_alumno' => $id_alumno,
                'comportamiendo' => $evaluacion_personal['comportamiento']['primera_evaluacion']."&".$evaluacion_personal['comportamiento']['segunda_evaluacion']."&".$evaluacion_personal['comportamiento']['tercera_evaluacion'],
                'entrega' => $evaluacion_personal['disposicion_al_trabajo']['primera_evaluacion']."&".$evaluacion_personal['disposicion_al_trabajo']['segunda_evaluacion']."&".$evaluacion_personal['disposicion_al_trabajo']['tercera_evaluacion'],
                'actitud_cancha' => $evaluacion_personal['actitud_en_cancha']['primera_evaluacion']."&".$evaluacion_personal['actitud_en_cancha']['segunda_evaluacion']."&".$evaluacion_personal['actitud_en_cancha']['tercera_evaluacion'],
                'actitud_preparacion' => $evaluacion_personal['actitud_en_preparacion_fisica']['primera_evaluacion']."&".$evaluacion_personal['actitud_en_preparacion_fisica']['segunda_evaluacion']."&".$evaluacion_personal['actitud_en_preparacion_fisica']['tercera_evaluacion'],
                'asistencia' =>  $evaluacion_personal['asistencia']['primera_evaluacion']."&".$evaluacion_personal['asistencia']['segunda_evaluacion']."&".$evaluacion_personal['asistencia']['tercera_evaluacion'],
                'puntualidad' =>  $evaluacion_personal['puntualidad']['primera_evaluacion']."&".$evaluacion_personal['puntualidad']['segunda_evaluacion']."&".$evaluacion_personal['puntualidad']['tercera_evaluacion'],
                'rendimiento_torneos' =>  $evaluacion_personal['rendimiento_en_torneos']['primera_evaluacion']."&".$evaluacion_personal['rendimiento_en_torneos']['segunda_evaluacion']."&".$evaluacion_personal['rendimiento_en_torneos']['tercera_evaluacion']
            );

        $query = $this->db->get_where('evaluacion_personal', array('id_alumno' => $id_alumno));
        if($query->num_rows() >=1 )
            $this->db->update('evaluacion_personal',$evaluacion);
        else
            $this->db->insert('evaluacion_personal',$evaluacion);
    }

    public function obtener_evaluacion_personal_por_id_alumno($id_alumno)
    {
        $data = array(
            'id_alumno' => $id_alumno
            );
        $query = $this->db->get_where('evaluacion_personal', $data);
        return $query->row_array();
    }

    public function existe_evaluacion_personal_de_alumno($id_alumno)
    {
        $data = array(
            'id_alumno' => $id_alumno
            );
        $query = $this->db->get_where('evaluacion_personal', $data);
        if($query->num_rows() >= 1)
            return 1;
        else
            return 0;
    }

    // ---------------------- Metodos Objetivos Individuales ---------------------- //

    public function llenar_datos_planilla_objetivos_individuales($objetivos_individuales)
    {
        $id_alumno = $objetivos_individuales['id_alumno'];
        $obj_individuales = array(
                'id_alumno' => $id_alumno,
                'derecha' => $objetivos_individuales['derecha']['primera']."-".$objetivos_individuales['derecha']['segunda']."-".$objetivos_individuales['derecha']['tercera'],
                'reves' => $objetivos_individuales['reves']['primera']."-".$objetivos_individuales['reves']['segunda']."-".$objetivos_individuales['reves']['tercera'],
                'volea_de_drive' => $objetivos_individuales['volea_de_drive']['primera']."-".$objetivos_individuales['volea_de_drive']['segunda']."-".$objetivos_individuales['volea_de_drive']['tercera'],
                'volea_de_reves' => $objetivos_individuales['volea_de_reves']['primera']."-".$objetivos_individuales['volea_de_reves']['segunda']."-".$objetivos_individuales['volea_de_reves']['tercera'],
                'saque_mas_smash' => $objetivos_individuales['saque_mas_smash']['primera']."-".$objetivos_individuales['saque_mas_smash']['segunda']."-".$objetivos_individuales['saque_mas_smash']['tercera'],
                'devolucion' => $objetivos_individuales['devolucion']['primera']."-".$objetivos_individuales['devolucion']['segunda']."-".$objetivos_individuales['devolucion']['tercera'],
                'slice' => $objetivos_individuales['slice']['primera']."-".$objetivos_individuales['slice']['segunda']."-".$objetivos_individuales['slice']['tercera'],
                'control_de_direccion' => $objetivos_individuales['control_de_direccion']['primera']."-".$objetivos_individuales['control_de_direccion']['segunda']."-".$objetivos_individuales['control_de_direccion']['tercera'],
                'control_de_profundidad' => $objetivos_individuales['control_de_profundidad']['primera']."-".$objetivos_individuales['control_de_profundidad']['segunda']."-".$objetivos_individuales['control_de_profundidad']['tercera'],
                'mecanica' => $objetivos_individuales['mecanica']['primera']."-".$objetivos_individuales['mecanica']['segunda']."-".$objetivos_individuales['mecanica']['tercera'],
            );

        $query = $this->db->get_where('objetivos_individuales', array('id_alumno' => $id_alumno));
        if($query->num_rows() >=1 )
            $this->db->update('objetivos_individuales',$obj_individuales);
        else
            $this->db->insert('objetivos_individuales',$obj_individuales);
    }

     public function obtener_obj_individuales_por_id_alumno($id_alumno)
    {
        $data = array(
            'id_alumno' => $id_alumno
            );
        $query = $this->db->get_where('objetivos_individuales', $data);
        return $query->row_array();
    }

    public function existe_planilla_obj_individuales_de_alumno($id_alumno)
    {
        $data = array(
            'id_alumno' => $id_alumno
            );
        $query = $this->db->get_where('objetivos_individuales', $data);
        if($query->num_rows() >= 1)
            return 1;
        else
            return 0;
    }
    
}
?>
