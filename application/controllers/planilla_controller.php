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

    // ---------------------- Metodos OBJETIVOS DE JUGADOR ---------------------- //

    public function llenar_objetivos_de_jugador($id_alumno)
    {
        $data['objetivos_de_jugador'] = $this->cargar_datos_obj_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/objetivos_de_jugador_view';
        $this->load->view('main_template', $data);
    }

    public function ver_objetivos_de_jugador($id_alumno)
    {
        $data['objetivos_de_jugador'] = $this->cargar_datos_obj_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/ver_objetivos_de_jugador_alumno_view';
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

    // ---------------------- Metodos PERFIL DE JUGADOR ---------------------- //

    public function llenar_perfil_de_jugador($id_alumno)
    {
        $data['perfil_de_jugador'] = $this->cargar_datos_perfil_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/perfil_de_jugador_view';
        $this->load->view('main_template', $data);
    }

    public function ver_perfil_de_jugador($id_alumno)
    {
        $data['perfil_de_jugador'] = $this->cargar_datos_perfil_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/ver_perfil_de_jugador_view';
        $this->load->view('main_template', $data);
    }

    public function guardar_datos_planilla_perfil_de_jugador()
    {
        $perfil_de_jugador = array(
            'id_alumno' => $this->input->post('id_grupo'),

            'servicios' => array(
                'servicios' => $this->input->post('servicios'),
                'aspectos_positivos' => $this->input->post('servicios_aspectos_positivos'),
                'aspectos_a_mejorar' => $this->input->post('servicios_aspectos_a_mejorar')
            ),
            'devolucion' => array(
                'devolucion' => $this->input->post('devolucion'),
                'aspectos_positivos' => $this->input->post('devolucion_aspectos_positivos'),
                'aspectos_a_mejorar' => $this->input->post('devolucion_aspectos_a_mejorar')
            ),
            'cancha' => array(
                'cancha' => $this->input->post('cancha'),
                'aspectos_positivos' => $this->input->post('cancha_aspectos_positivos'),
                'aspectos_a_mejorar' => $this->input->post('cancha_aspectos_a_mejorar')
            ),
            'red' => array(
                'red' => $this->input->post('red'),
                'aspectos_positivos' => $this->input->post('red_aspectos_positivos'),
                'aspectos_a_mejorar' => $this->input->post('red_aspectos_a_mejorar')
            ),
            'aspecto_mental' => array(
                'aspecto_mental' => $this->input->post('aspecto_mental'),
                'aspectos_positivos' => $this->input->post('aspecto_mental_aspectos_positivos'),
                'aspectos_a_mejorar' => $this->input->post('aspecto_mental_aspectos_a_mejorar')
            ),
            'competicion' => array(
                'competicion' => $this->input->post('competicion'),
                'aspectos_positivos' => $this->input->post('competicion_aspectos_positivos'),
                'aspectos_a_mejorar' => $this->input->post('competicion_aspectos_a_mejorar')
            )
        );

        $this->planilla_model->llenar_datos_perfil_de_jugador($perfil_de_jugador);
        $this->ver_lista_de_alumnos();
    }

    // ---------------------- Metodos EVALUACION PERSONAL ---------------------- //

    public function llenar_evaluacion_personal($id_alumno)
    {
        $data['evaluacion_personal'] = $this->cargar_datos_evaluacion_personal_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/evaluacion_personal_view';
        $this->load->view('main_template', $data);
    }

    public function ver_evaluacion_personal($id_alumno)
    {
        $data['evaluacion_personal'] = $this->cargar_datos_evaluacion_personal_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/ver_evaluacion_personal_view';
        $this->load->view('main_template', $data);
    }

    public function guardar_datos_planilla_evaluacion_personal()
    {
        $evaluacion_personal = array(
            'id_alumno' => $this->input->post('id_grupo'),

            'comportamiento' => array(
                'primera_evaluacion' => $this->input->post('comportamiento_primera_evaluacion'),
                'segunda_evaluacion' => $this->input->post('comportamiento_segunda_evaluacion'),
                'tercera_evaluacion' => $this->input->post('comportamiento_tercera_evaluacion')
            ),
            'disposicion_al_trabajo' => array(
                'primera_evaluacion' => $this->input->post('disposicion_al_trabajo_primera_evaluacion'),
                'segunda_evaluacion' => $this->input->post('disposicion_al_trabajo_segunda_evaluacion'),
                'tercera_evaluacion' => $this->input->post('disposicion_al_trabajo_tercera_evaluacion')
            ),
            'actitud_en_cancha' => array(
                'primera_evaluacion' => $this->input->post('actitud_en_cancha_primera_evaluacion'),
                'segunda_evaluacion' => $this->input->post('actitud_en_cancha_segunda_evaluacion'),
                'tercera_evaluacion' => $this->input->post('actitud_en_cancha_tercera_evaluacion')
            ),
            'actitud_en_preparacion_fisica' => array(
                'primera_evaluacion' => $this->input->post('actitud_en_preparacion_fisica_primera_evaluacion'),
                'segunda_evaluacion' => $this->input->post('actitud_en_preparacion_fisica_segunda_evaluacion'),
                'tercera_evaluacion' => $this->input->post('actitud_en_preparacion_fisica_tercera_evaluacion')
            ),
            'asistencia' => array(
                'primera_evaluacion' => $this->input->post('asistencia_primera_evaluacion'),
                'segunda_evaluacion' => $this->input->post('asistencia_segunda_evaluacion'),
                'tercera_evaluacion' => $this->input->post('asistencia_tercera_evaluacion')
            ),
            'puntualidad' => array(
                'primera_evaluacion' => $this->input->post('puntualidad_primera_evaluacion'),
                'segunda_evaluacion' => $this->input->post('puntualidad_segunda_evaluacion'),
                'tercera_evaluacion' => $this->input->post('puntualidad_tercera_evaluacion')
            ),
            'rendimiento_en_torneos' => array(
                'primera_evaluacion' => $this->input->post('rendimiento_en_torneos_primera_evaluacion'),
                'segunda_evaluacion' => $this->input->post('rendimiento_en_torneos_segunda_evaluacion'),
                'tercera_evaluacion' => $this->input->post('rendimiento_en_torneos_tercera_evaluacion')
            )
        );
        $this->planilla_model->llenar_datos_evaluacion_personal($evaluacion_personal);
        $this->ver_lista_de_alumnos();
    }
    
    // ---------------------- Metodos OBJETIVOS INDIVIDUALES ---------------------- //

    public function llenar_objetivos_individuales($id_alumno)
    {
        $data['objetivos_de_jugador'] = $this->cargar_datos_obj_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/objetivos_individuales_view';
        $this->load->view('main_template', $data);
    }

    // ----------------------------------- METODOS PRIVADOS ------------------------- //

    function cargar_datos_obj_de_jugador_de_alumno($id_alumno)
    {
        $alumno = $this->alumno_model->obtener_alumno_por_id($id_alumno);
        $existe_planilla = $this->planilla_model->existe_planilla_obj_jugador_de_alumno($id_alumno);
        if($existe_planilla==1){
            $obj_jugador = $this->planilla_model->obtener_obj_de_jugador_por_id_alumno($id_alumno);

            $evaluaciones_obj_tecnicos = explode("-", $obj_jugador['objetivos_tecnicos']);
            $evaluaciones_obj_tacticos = explode("-", $obj_jugador['objetivos_tacticos']);
            $evaluaciones_obj_psicologicos = explode("-", $obj_jugador['objetivos_psicologicos']);
            $evaluaciones_obj_competicion = explode("-", $obj_jugador['objetivos_de_competicion']);

            $objetivos_de_jugador = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'obj_tecnicos' => array(
                    'primera' => $evaluaciones_obj_tecnicos[0],
                    'segunda' => $evaluaciones_obj_tecnicos[1],
                    'tercera' => $evaluaciones_obj_tecnicos[2]
                ),
                'obj_tacticos' => array(
                    'primera' => $evaluaciones_obj_tacticos[0],
                    'segunda' => $evaluaciones_obj_tacticos[1],
                    'tercera' => $evaluaciones_obj_tacticos[2]
                ),
                'obj_psicologicos' => array(
                    'primera' => $evaluaciones_obj_psicologicos[0],
                    'segunda' => $evaluaciones_obj_psicologicos[1],
                    'tercera' => $evaluaciones_obj_psicologicos[2]
                ),
                'obj_de_competicion' => array(
                    'primera' => $evaluaciones_obj_competicion[0],
                    'segunda' => $evaluaciones_obj_competicion[1],
                    'tercera' => $evaluaciones_obj_competicion[2]
                ),
                'observaciones' => $obj_jugador['observaciones']
            );
        }
        else
        {
            $objetivos_de_jugador = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'obj_tecnicos' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'obj_tacticos' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'obj_psicologicos' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'obj_de_competicion' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'observaciones' => ""
            );
        }
        
        return $objetivos_de_jugador;
    }

    function cargar_datos_perfil_de_jugador_de_alumno($id_alumno)
    {
        $alumno = $this->alumno_model->obtener_alumno_por_id($id_alumno);
        $existe_planilla = $this->planilla_model->existe_perfil_jugador_de_alumno($id_alumno);
        if($existe_planilla==1){
            $perfil_jugador = $this->planilla_model->obtener_perfil_jugador_por_id_alumno($id_alumno);

            $servicios = explode("-", $perfil_jugador['servicios']);
            $devolucion = explode("-", $perfil_jugador['devolucion']);
            $cancha = explode("-", $perfil_jugador['cancha']);
            $red = explode("-", $perfil_jugador['red']);
            $aspecto_mental = explode("-", $perfil_jugador['aspecto_mental']);
            $competicion = explode("-", $perfil_jugador['competicion']);

            $perfil_de_jugador = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'servicios' => array(
                    'servicios_data' => $servicios[0],
                    'aspectos_positivos' => $servicios[1],
                    'aspectos_a_mejorar' => $servicios[2]
                ),
                'devolucion' => array(
                    'devolucion_data' => $devolucion[0],
                    'aspectos_positivos' => $devolucion[1],
                    'aspectos_a_mejorar' => $devolucion[2]
                ),
                'cancha' => array(
                    'cancha_data' => $cancha[0],
                    'aspectos_positivos' => $cancha[1],
                    'aspectos_a_mejorar' => $cancha[2]
                ),
                'red' => array(
                    'red_data' => $red[0],
                    'aspectos_positivos' => $red[1],
                    'aspectos_a_mejorar' => $red[2]
                ),
                'aspecto_mental' => array(
                    'aspecto_mental_data' => $aspecto_mental[0],
                    'aspectos_positivos' => $aspecto_mental[1],
                    'aspectos_a_mejorar' => $aspecto_mental[2]
                ),
                'competicion' => array(
                    'competicion_data' => $competicion[0],
                    'aspectos_positivos' => $competicion[1],
                    'aspectos_a_mejorar' => $competicion[2]
                )
            );
        }
        else
        {
            $perfil_de_jugador = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'servicios' => array('servicios_data' => "",'aspectos_positivos' => "",'aspectos_a_mejorar' => ""),
                'devolucion' => array('devolucion_data' => "",'aspectos_positivos' => "",'aspectos_a_mejorar' => ""),
                'cancha' => array('cancha_data' => "",'aspectos_positivos' => "",'aspectos_a_mejorar' => ""),
                'red' => array('red_data' => "",'aspectos_positivos' => "",'aspectos_a_mejorar' => ""),
                'aspecto_mental' => array('aspecto_mental_data' => "",'aspectos_positivos' => "",'aspectos_a_mejorar' => ""),
                'competicion' => array('competicion_data' => "",'aspectos_positivos' => "",'aspectos_a_mejorar' => "")
            );
        }
        
        return $perfil_de_jugador;
    }

    function cargar_datos_evaluacion_personal_de_alumno($id_alumno)
    {
        $alumno = $this->alumno_model->obtener_alumno_por_id($id_alumno);
        $existe_planilla = $this->planilla_model->existe_evaluacion_personal_de_alumno($id_alumno);
        if($existe_planilla==1){
            $evaluacion_personal = $this->planilla_model->obtener_evaluacion_personal_por_id_alumno($id_alumno);
            $comportamiento = explode("-", $evaluacion_personal['comportamiento']);
            $disposicion_al_trabajo = explode("-", $evaluacion_personal['disposicion_al_trabajo']);
            $actitud_en_cancha = explode("-", $evaluacion_personal['actitud_en_cancha']);
            $actitud_en_preparacion_fisica = explode("-", $evaluacion_personal['actitud_en_preparacion_fisica']);
            $asistencia = explode("-", $evaluacion_personal['asistencia']);
            $puntualidad = explode("-", $evaluacion_personal['puntualidad']);
            $rendimiento_en_torneos = explode("-", $evaluacion_personal['rendimiento_en_torneos']);

            $evaluacion = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'comportamiento' => array(
                    'primera_evaluacion' => $comportamiento[0],
                    'segunda_evaluacion' => $comportamiento[1],
                    'tercera_evaluacion' => $comportamiento[2]
                ),
                'disposicion_al_trabajo' => array(
                    'primera_evaluacion' => $disposicion_al_trabajo[0],
                    'segunda_evaluacion' => $disposicion_al_trabajo[1],
                    'tercera_evaluacion' => $disposicion_al_trabajo[2]
                ),
                'actitud_en_cancha' => array(
                    'primera_evaluacion' => $actitud_en_cancha[0],
                    'segunda_evaluacion' => $actitud_en_cancha[1],
                    'tercera_evaluacion' => $actitud_en_cancha[2]
                ),
                'actitud_en_preparacion_fisica' => array(
                    'primera_evaluacion' => $actitud_en_preparacion_fisica[0],
                    'segunda_evaluacion' => $actitud_en_preparacion_fisica[1],
                    'tercera_evaluacion' => $actitud_en_preparacion_fisica[2]
                ),
                'asistencia' => array(
                    'primera_evaluacion' => $asistencia[0],
                    'segunda_evaluacion' => $asistencia[1],
                    'tercera_evaluacion' => $asistencia[2]
                ),
                'puntualidad' => array(
                    'primera_evaluacion' => $puntualidad[0],
                    'segunda_evaluacion' => $puntualidad[1],
                    'tercera_evaluacion' => $puntualidad[2]
                ),
                'rendimiento_en_torneos' => array(
                    'primera_evaluacion' => $rendimiento_en_torneos[0],
                    'segunda_evaluacion' => $rendimiento_en_torneos[1],
                    'tercera_evaluacion' => $rendimiento_en_torneos[2]
                )
            );
        }
        else
        {
            $evaluacion = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'comportamiento' => array('primera_evaluacion' => "",'segunda_evaluacion' => "",'tercera_evaluacion' => ""),
                'disposicion_al_trabajo' => array('primera_evaluacion' => "",'segunda_evaluacion' => "",'tercera_evaluacion' => ""),
                'actitud_en_cancha' => array('primera_evaluacion' => "",'segunda_evaluacion' => "",'tercera_evaluacion' => ""),
                'actitud_en_preparacion_fisica' => array('primera_evaluacion' => "",'segunda_evaluacion' => "",'tercera_evaluacion' => ""),
                'asistencia' => array('primera_evaluacion' => "",'segunda_evaluacion' => "",'tercera_evaluacion' => ""),
                'puntualidad' => array('primera_evaluacion' => "",'segunda_evaluacion' => "",'tercera_evaluacion' => ""),
                'rendimiento_en_torneos' => array('primera_evaluacion' => "",'segunda_evaluacion' => "",'tercera_evaluacion' => "")
            );
        }
        
        return $evaluacion;
    }

    // ---------------------- Metodos PERFIL DE JUGADOR ---------------------- //

    

    // ---------------------- Metodos EVALUACION PERSONAL ---------------------- //

    // ----------------------------------- METODOS PRIVADOS ------------------------- //
}
?>
