<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planilla_controller extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
    }

    public function ver_lista_de_alumnos()
    {
        $data['lista_alumnos'] = $this->alumno_model->ver_lista_alumnos();
        $data['main_content'] = 'planillas/lista_alumnos_view';
        $this->load->view('main_template', $data);
    }

    public function llenar_objetivos_de_jugador($id_alumno)
    {
        $data['objetivos_de_jugador'] = $this->cargar_datos_obj_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/objetivos_de_jugador_view';
        $this->load->view('main_template', $data);
    }

    public function guardar_datos_planilla_objetivos_de_jugador()
    {
        $objetivos_de_jugador = array(
            'id_alumno' => $this->input->post('id_grupo'),

            'obj_tecnicos' => array(
                'primera' => $this->input->post('primera_evaluacion_obj_tecnicos'),
                'segunda' => $this->input->post('segunda_evaluacion_obj_tecnicos'),
                'tercera' => $this->input->post('tercera_evaluacion_obj_tecnicos')
            ),
            'obj_tacticos' => array(
                'primera' => $this->input->post('primera_evaluacion_obj_tacticos'),
                'segunda' => $this->input->post('segunda_evaluacion_obj_tacticos'),
                'tercera' => $this->input->post('tercera_evaluacion_obj_tacticos')
            ),
            'obj_psicologicos' => array(
                'primera' => $this->input->post('primera_evaluacion_obj_psicologicos'),
                'segunda' => $this->input->post('segunda_evaluacion_obj_psicologicos'),
                'tercera' => $this->input->post('tercera_evaluacion_obj_psicologicos')
            ),
            'obj_de_competicion' => array(
                'primera' => $this->input->post('primera_evaluacion_obj_de_competicion'),
                'segunda' => $this->input->post('segunda_evaluacion_obj_de_competicion'),
                'tercera' => $this->input->post('tercera_evaluacion_obj_de_competicion')
            ),
            'observaciones' => $this->input->post('observaciones')
        );

        $this->planilla_model->llenar_datos_planilla_objetivos_de_jugador($objetivos_de_jugador);
        $this->ver_lista_de_alumnos();
    }

    // ----------------------------------- METODOS PRIVADOS ------------------------- //

    function cargar_datos_obj_de_jugador_de_alumno($id_alumno)
    {
        $alumno = $this->alumno_model->obtener_alumno_por_id($id_alumno);
        $obj_jugador = $this->planilla_model->obtener_obj_de_jugador_por_id_alumno($id_alumno);

        $evaluaciones_obj_tecnicos = explode("-", $obj_jugador['objetivos_tecnicos']);
        $primera_evaluacion_obj_tecnicos = $evaluaciones_obj_tecnicos[0];
        $segunda_evaluacion_obj_tecnicos = $evaluaciones_obj_tecnicos[1];
        $tercera_evaluacion_obj_tecnicos = $evaluaciones_obj_tecnicos[2];

        $evaluaciones_obj_tacticos = explode("-", $obj_jugador['objetivos_tacticos']);
        $primera_evaluacion_obj_tacticos = $evaluaciones_obj_tacticos[0];
        $segunda_evaluacion_obj_tacticos = $evaluaciones_obj_tacticos[1];
        $tercera_evaluacion_obj_tacticos = $evaluaciones_obj_tacticos[2];

        $evaluaciones_obj_psicologicos = explode("-", $obj_jugador['objetivos_psicologicos']);
        $primera_evaluacion_obj_psicologicos = $evaluaciones_obj_psicologicos[0];
        $segunda_evaluacion_obj_psicologicos = $evaluaciones_obj_psicologicos[1];
        $tercera_evaluacion_obj_psicologicos = $evaluaciones_obj_psicologicos[2];

        $evaluaciones_obj_competicion = explode("-", $obj_jugador['objetivos_de_competicion']);
        $primera_evaluacion_obj_competicion = $evaluaciones_obj_competicion[0];
        $segunda_evaluacion_obj_competicion = $evaluaciones_obj_competicion[1];
        $tercera_evaluacion_obj_competicion = $evaluaciones_obj_competicion[2];

        $objetivos_de_jugador = array(
            'id_alumno' => $this->input->post('id_grupo'),
            'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
            'obj_tecnicos' => array(
                'primera' => $primera_evaluacion_obj_tecnicos,
                'segunda' => $segunda_evaluacion_obj_tecnicos,
                'tercera' => $tercera_evaluacion_obj_tecnicos
            ),
            'obj_tacticos' => array(
                'primera' => $primera_evaluacion_obj_tacticos,
                'segunda' => $segunda_evaluacion_obj_tacticos,
                'tercera' => $tercera_evaluacion_obj_tacticos
            ),
            'obj_psicologicos' => array(
                'primera' => $primera_evaluacion_obj_psicologicos,
                'segunda' => $segunda_evaluacion_obj_psicologicos,
                'tercera' => $tercera_evaluacion_obj_psicologicos
            ),
            'obj_de_competicion' => array(
                'primera' => $primera_evaluacion_obj_competicion,
                'segunda' => $segunda_evaluacion_obj_competicion,
                'tercera' => $tercera_evaluacion_obj_competicion
            ),
            'observaciones' => $obj_jugador['observaciones']
        );
        return $objetivos_de_jugador;
    }
}
?>
