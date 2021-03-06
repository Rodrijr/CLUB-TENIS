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
        $time = time();
        $datestring = "%Y-%M(%m)-%d";
        
        $comportamiento_primera_evaluacion = $this->input->post('comportamiento_primera_evaluacion')."+".$this->input->post('comportamiento_primera_evaluacion_fecha');
        $comportamiento_segunda_evaluacion = $this->input->post('comportamiento_segunda_evaluacion')."+".$this->input->post('comportamiento_segunda_evaluacion_fecha');
        $comportamiento_tercera_evaluacion = $this->input->post('comportamiento_tercera_evaluacion')."+".$this->input->post('comportamiento_tercera_evaluacion_fecha');

        $comportamiento_primera_evaluacion_array = explode("+", $comportamiento_primera_evaluacion);
        $comportamiento_segunda_evaluacion_array = explode("+", $comportamiento_segunda_evaluacion);
        $comportamiento_tercera_evaluacion_array = explode("+", $comportamiento_tercera_evaluacion);

        if(($comportamiento_primera_evaluacion_array[0]!="")&&($comportamiento_primera_evaluacion_array[1]==""))
            $comportamiento_primera_evaluacion = $comportamiento_primera_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($comportamiento_segunda_evaluacion_array[0]!="")&&($comportamiento_segunda_evaluacion_array[1]==""))
            $comportamiento_segunda_evaluacion = $comportamiento_segunda_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($comportamiento_tercera_evaluacion_array[0]!="")&&($comportamiento_tercera_evaluacion_array[1]==""))
            $comportamiento_tercera_evaluacion = $comportamiento_tercera_evaluacion_array[0]."+".mdate($datestring, $time);

        # _______________ DISPOSICIÓN AL TRABAJO  _______________

        $disposicion_al_trabajo_primera_evaluacion = $this->input->post('disposicion_al_trabajo_primera_evaluacion')."+".$this->input->post('disposicion_al_trabajo_primera_evaluacion_fecha');
        $disposicion_al_trabajo_segunda_evaluacion = $this->input->post('disposicion_al_trabajo_segunda_evaluacion')."+".$this->input->post('disposicion_al_trabajo_segunda_evaluacion_fecha');
        $disposicion_al_trabajo_tercera_evaluacion = $this->input->post('disposicion_al_trabajo_tercera_evaluacion')."+".$this->input->post('disposicion_al_trabajo_tercera_evaluacion_fecha');

        $disposicion_al_trabajo_primera_evaluacion_array = explode("+", $disposicion_al_trabajo_primera_evaluacion);
        $disposicion_al_trabajo_segunda_evaluacion_array = explode("+", $disposicion_al_trabajo_segunda_evaluacion);
        $disposicion_al_trabajo_tercera_evaluacion_array = explode("+", $disposicion_al_trabajo_tercera_evaluacion);
        if(($disposicion_al_trabajo_primera_evaluacion_array[0]!="")&&($disposicion_al_trabajo_primera_evaluacion_array[1]==""))
            $disposicion_al_trabajo_primera_evaluacion = $disposicion_al_trabajo_primera_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($disposicion_al_trabajo_segunda_evaluacion_array[0]!="")&&($disposicion_al_trabajo_segunda_evaluacion_array[1]==""))
            $disposicion_al_trabajo_segunda_evaluacion = $disposicion_al_trabajo_segunda_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($disposicion_al_trabajo_tercera_evaluacion_array[0]!="")&&($disposicion_al_trabajo_tercera_evaluacion_array[1]==""))
            $disposicion_al_trabajo_tercera_evaluacion = $disposicion_al_trabajo_tercera_evaluacion_array[0]."+".mdate($datestring, $time);

        # _______________ ACTITUD  EN CANCHA _______________ 

        $actitud_en_cancha_primera_evaluacion = $this->input->post('actitud_en_cancha_primera_evaluacion')."+".$this->input->post('actitud_en_cancha_primera_evaluacion_fecha');
        $actitud_en_cancha_segunda_evaluacion = $this->input->post('actitud_en_cancha_segunda_evaluacion')."+".$this->input->post('actitud_en_cancha_segunda_evaluacion_fecha');
        $actitud_en_cancha_tercera_evaluacion = $this->input->post('actitud_en_cancha_tercera_evaluacion')."+".$this->input->post('actitud_en_cancha_tercera_evaluacion_fecha');

        $actitud_en_cancha_primera_evaluacion_array = explode("+", $actitud_en_cancha_primera_evaluacion);
        $actitud_en_cancha_segunda_evaluacion_array = explode("+", $actitud_en_cancha_segunda_evaluacion);
        $actitud_en_cancha_tercera_evaluacion_array = explode("+", $actitud_en_cancha_tercera_evaluacion);
        if(($actitud_en_cancha_primera_evaluacion_array[0]!="")&&($actitud_en_cancha_primera_evaluacion_array[1]==""))
            $actitud_en_cancha_primera_evaluacion = $actitud_en_cancha_primera_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($actitud_en_cancha_segunda_evaluacion_array[0]!="")&&($actitud_en_cancha_segunda_evaluacion_array[1]==""))
            $actitud_en_cancha_segunda_evaluacion = $actitud_en_cancha_segunda_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($actitud_en_cancha_tercera_evaluacion_array[0]!="")&&($actitud_en_cancha_tercera_evaluacion_array[1]==""))
            $actitud_en_cancha_tercera_evaluacion = $actitud_en_cancha_tercera_evaluacion_array[0]."+".mdate($datestring, $time);

        # _______________ ACTITUD EN PREPARACIÓN FISICA _______________ -->

        $actitud_en_preparacion_fisica_primera_evaluacion = $this->input->post('actitud_en_preparacion_fisica_primera_evaluacion')."+".$this->input->post('actitud_en_preparacion_fisica_primera_evaluacion_fecha');
        $actitud_en_preparacion_fisica_segunda_evaluacion = $this->input->post('actitud_en_preparacion_fisica_segunda_evaluacion')."+".$this->input->post('actitud_en_preparacion_fisica_segunda_evaluacion_fecha');
        $actitud_en_preparacion_fisica_tercera_evaluacion = $this->input->post('actitud_en_preparacion_fisica_tercera_evaluacion')."+".$this->input->post('actitud_en_preparacion_fisica_tercera_evaluacion_fecha');

        $actitud_en_preparacion_fisica_primera_evaluacion_array = explode("+", $actitud_en_preparacion_fisica_primera_evaluacion);
        $actitud_en_preparacion_fisica_segunda_evaluacion_array = explode("+", $actitud_en_preparacion_fisica_segunda_evaluacion);
        $actitud_en_preparacion_fisica_tercera_evaluacion_array = explode("+", $actitud_en_preparacion_fisica_tercera_evaluacion);
        if(($actitud_en_preparacion_fisica_primera_evaluacion_array[0]!="")&&($actitud_en_preparacion_fisica_primera_evaluacion_array[1]==""))
            $actitud_en_preparacion_fisica_primera_evaluacion = $actitud_en_preparacion_fisica_primera_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($actitud_en_preparacion_fisica_segunda_evaluacion_array[0]!="")&&($actitud_en_preparacion_fisica_segunda_evaluacion_array[1]==""))
            $actitud_en_preparacion_fisica_segunda_evaluacion = $actitud_en_preparacion_fisica_segunda_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($actitud_en_preparacion_fisica_tercera_evaluacion_array[0]!="")&&($actitud_en_preparacion_fisica_tercera_evaluacion_array[1]==""))
            $actitud_en_preparacion_fisica_tercera_evaluacion = $actitud_en_preparacion_fisica_tercera_evaluacion_array[0]."+".mdate($datestring, $time);

        # _______________ ASISTENCIA _______________

        $asistencia_primera_evaluacion = $this->input->post('asistencia_primera_evaluacion')."+".$this->input->post('asistencia_primera_evaluacion_fecha');
        $asistencia_segunda_evaluacion = $this->input->post('asistencia_segunda_evaluacion')."+".$this->input->post('asistencia_segunda_evaluacion_fecha');
        $asistencia_tercera_evaluacion = $this->input->post('asistencia_tercera_evaluacion')."+".$this->input->post('asistencia_tercera_evaluacion_fecha');

        $asistencia_primera_evaluacion_array = explode("+", $asistencia_primera_evaluacion);
        $asistencia_segunda_evaluacion_array = explode("+", $asistencia_segunda_evaluacion);
        $asistencia_tercera_evaluacion_array = explode("+", $asistencia_tercera_evaluacion);
        if(($asistencia_primera_evaluacion_array[0]!="")&&($asistencia_primera_evaluacion_array[1]==""))
            $asistencia_primera_evaluacion = $asistencia_primera_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($asistencia_segunda_evaluacion_array[0]!="")&&($asistencia_segunda_evaluacion_array[1]==""))
            $asistencia_segunda_evaluacion = $asistencia_segunda_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($asistencia_tercera_evaluacion_array[0]!="")&&($asistencia_tercera_evaluacion_array[1]==""))
            $asistencia_tercera_evaluacion = $asistencia_tercera_evaluacion_array[0]."+".mdate($datestring, $time);

        # _______________ PUNTUALIDAD _______________

        $puntualidad_primera_evaluacion = $this->input->post('puntualidad_primera_evaluacion')."+".$this->input->post('puntualidad_primera_evaluacion_fecha');
        $puntualidad_segunda_evaluacion = $this->input->post('puntualidad_segunda_evaluacion')."+".$this->input->post('puntualidad_segunda_evaluacion_fecha');
        $puntualidad_tercera_evaluacion = $this->input->post('puntualidad_tercera_evaluacion')."+".$this->input->post('puntualidad_tercera_evaluacion_fecha');

        $puntualidad_primera_evaluacion_array = explode("+", $puntualidad_primera_evaluacion);
        $puntualidad_segunda_evaluacion_array = explode("+", $puntualidad_segunda_evaluacion);
        $puntualidad_tercera_evaluacion_array = explode("+", $puntualidad_tercera_evaluacion);
        if(($puntualidad_primera_evaluacion_array[0]!="")&&($puntualidad_primera_evaluacion_array[1]==""))
            $puntualidad_primera_evaluacion = $puntualidad_primera_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($puntualidad_segunda_evaluacion_array[0]!="")&&($puntualidad_segunda_evaluacion_array[1]==""))
            $puntualidad_segunda_evaluacion = $puntualidad_segunda_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($puntualidad_tercera_evaluacion_array[0]!="")&&($puntualidad_tercera_evaluacion_array[1]==""))
            $puntualidad_tercera_evaluacion = $puntualidad_tercera_evaluacion_array[0]."+".mdate($datestring, $time);

        # _______________ RENDIMIENTO  EN TORNEOS _______________

        $rendimiento_en_torneos_primera_evaluacion = $this->input->post('rendimiento_en_torneos_primera_evaluacion')."+".$this->input->post('rendimiento_en_torneos_primera_evaluacion_fecha');
        $rendimiento_en_torneos_segunda_evaluacion = $this->input->post('rendimiento_en_torneos_segunda_evaluacion')."+".$this->input->post('rendimiento_en_torneos_segunda_evaluacion_fecha');
        $rendimiento_en_torneos_tercera_evaluacion = $this->input->post('rendimiento_en_torneos_tercera_evaluacion')."+".$this->input->post('rendimiento_en_torneos_tercera_evaluacion_fecha');

        $rendimiento_en_torneos_primera_evaluacion_array = explode("+", $rendimiento_en_torneos_primera_evaluacion);
        $rendimiento_en_torneos_segunda_evaluacion_array = explode("+", $rendimiento_en_torneos_segunda_evaluacion);
        $rendimiento_en_torneos_tercera_evaluacion_array = explode("+", $rendimiento_en_torneos_tercera_evaluacion);
        if(($rendimiento_en_torneos_primera_evaluacion_array[0]!="")&&($rendimiento_en_torneos_primera_evaluacion_array[1]==""))
            $rendimiento_en_torneos_primera_evaluacion = $rendimiento_en_torneos_primera_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($rendimiento_en_torneos_segunda_evaluacion_array[0]!="")&&($rendimiento_en_torneos_segunda_evaluacion_array[1]==""))
            $rendimiento_en_torneos_segunda_evaluacion = $rendimiento_en_torneos_segunda_evaluacion_array[0]."+".mdate($datestring, $time);
        if(($rendimiento_en_torneos_tercera_evaluacion_array[0]!="")&&($rendimiento_en_torneos_tercera_evaluacion_array[1]==""))
            $rendimiento_en_torneos_tercera_evaluacion = $rendimiento_en_torneos_tercera_evaluacion_array[0]."+".mdate($datestring, $time);

        $evaluacion_personal = array(
            'id_alumno' => $this->input->post('id_grupo'),

            'comportamiento' => array(
                'primera_evaluacion' => $comportamiento_primera_evaluacion,
                'segunda_evaluacion' => $comportamiento_segunda_evaluacion,
                'tercera_evaluacion' => $comportamiento_tercera_evaluacion
            ),
            'disposicion_al_trabajo' => array(
                'primera_evaluacion' => $disposicion_al_trabajo_primera_evaluacion,
                'segunda_evaluacion' => $disposicion_al_trabajo_segunda_evaluacion,
                'tercera_evaluacion' => $disposicion_al_trabajo_tercera_evaluacion
            ),
            'actitud_en_cancha' => array(
                'primera_evaluacion' => $actitud_en_cancha_primera_evaluacion,
                'segunda_evaluacion' => $actitud_en_cancha_segunda_evaluacion,
                'tercera_evaluacion' => $actitud_en_cancha_tercera_evaluacion
            ),
            'actitud_en_preparacion_fisica' => array(
                'primera_evaluacion' => $actitud_en_preparacion_fisica_primera_evaluacion,
                'segunda_evaluacion' => $actitud_en_preparacion_fisica_segunda_evaluacion,
                'tercera_evaluacion' => $actitud_en_preparacion_fisica_tercera_evaluacion
            ),
            'asistencia' => array(
                'primera_evaluacion' => $asistencia_primera_evaluacion,
                'segunda_evaluacion' => $asistencia_segunda_evaluacion,
                'tercera_evaluacion' => $asistencia_tercera_evaluacion
            ),
            'puntualidad' => array(
                'primera_evaluacion' => $puntualidad_primera_evaluacion,
                'segunda_evaluacion' => $puntualidad_segunda_evaluacion,
                'tercera_evaluacion' => $puntualidad_tercera_evaluacion
            ),
            'rendimiento_en_torneos' => array(
                'primera_evaluacion' => $rendimiento_en_torneos_primera_evaluacion,
                'segunda_evaluacion' => $rendimiento_en_torneos_segunda_evaluacion,
                'tercera_evaluacion' => $rendimiento_en_torneos_tercera_evaluacion
            )
        );

        $this->planilla_model->llenar_datos_evaluacion_personal($evaluacion_personal);
        $id_entrenador = $this->session->userdata('identificador_usuario');
        $sub_grupos_de_entrenador = $this->grupo_model->obtener_grupos_de_entrenador($id_entrenador);
        $data['lista_sub_grupos'] = $this->establecer_datos_para_mostrar_lista_de_grupos_de_entrenador($sub_grupos_de_entrenador);
        $data['main_content'] = 'grupos/lista_de_grupos_de_entrenador_view';
        $this->load->view('main_template', $data);
        
    }
    
    // ---------------------- Metodos OBJETIVOS INDIVIDUALES ---------------------- //

    public function llenar_objetivos_individuales($id_alumno)
    {
        $data['objetivos_individuales'] = $this->cargar_datos_obj_individuales_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/objetivos_individuales_view';
        $this->load->view('main_template', $data);
    }

    public function ver_objetivos_individuales($id_alumno)
    {
        $data['objetivos_individuales'] = $this->cargar_datos_obj_individuales_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/ver_objetivos_individuales_view';
        $this->load->view('main_template', $data);
    }

    public function guardar_datos_objetivos_individuales()
    {
        $objetivos_individuales = array(
            'id_alumno' => $this->input->post('id_grupo'),

            'derecha' => array(
                'primera' => $this->input->post('primera_evaluacion_derecha'),
                'segunda' => $this->input->post('segunda_evaluacion_derecha'),
                'tercera' => $this->input->post('tercera_evaluacion_derecha')
            ),

            'reves' => array(
                'primera' => $this->input->post('primera_evaluacion_reves'),
                'segunda' => $this->input->post('segunda_evaluacion_reves'),
                'tercera' => $this->input->post('tercera_evaluacion_reves')
            ),

            'volea_de_drive' => array(
                'primera' => $this->input->post('primera_evaluacion_volea_de_drive'),
                'segunda' => $this->input->post('segunda_evaluacion_volea_de_drive'),
                'tercera' => $this->input->post('tercera_evaluacion_volea_de_drive')
            ),

            'volea_de_reves' => array(
                'primera' => $this->input->post('primera_evaluacion_volea_de_reves'),
                'segunda' => $this->input->post('segunda_evaluacion_volea_de_reves'),
                'tercera' => $this->input->post('tercera_evaluacion_volea_de_reves')
            ),

            'saque_mas_smash' => array(
                'primera' => $this->input->post('primera_evaluacion_saque_mas_smash'),
                'segunda' => $this->input->post('segunda_evaluacion_saque_mas_smash'),
                'tercera' => $this->input->post('tercera_evaluacion_saque_mas_smash')
            ),

            'devolucion' => array(
                'primera' => $this->input->post('primera_evaluacion_devolucion'),
                'segunda' => $this->input->post('segunda_evaluacion_devolucion'),
                'tercera' => $this->input->post('tercera_evaluacion_devolucion')
            ),

            'slice' => array(
                'primera' => $this->input->post('primera_evaluacion_slice'),
                'segunda' => $this->input->post('segunda_evaluacion_slice'),
                'tercera' => $this->input->post('tercera_evaluacion_slice')
            ),

            'control_de_direccion' => array(
                'primera' => $this->input->post('primera_evaluacion_control_de_direccion'),
                'segunda' => $this->input->post('segunda_evaluacion_control_de_direccion'),
                'tercera' => $this->input->post('tercera_evaluacion_control_de_direccion')
            ),

            'control_de_profundidad' => array(
                'primera' => $this->input->post('primera_evaluacion_control_de_profundidad'),
                'segunda' => $this->input->post('segunda_evaluacion_control_de_profundidad'),
                'tercera' => $this->input->post('tercera_evaluacion_control_de_profundidad')
            ),

            'mecanica' => array(
                'primera' => $this->input->post('primera_evaluacion_mecanica'),
                'segunda' => $this->input->post('segunda_evaluacion_mecanica'),
                'tercera' => $this->input->post('tercera_evaluacion_mecanica')
            )
        );

        $this->planilla_model->llenar_datos_planilla_objetivos_individuales($objetivos_individuales);
        $this->ver_lista_de_alumnos();
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
            $comportamiento = explode("&", $evaluacion_personal['comportamiendo']);
            $disposicion_al_trabajo = explode("&", $evaluacion_personal['entrega']);
            $actitud_en_cancha = explode("&", $evaluacion_personal['actitud_cancha']);
            $actitud_en_preparacion_fisica = explode("&", $evaluacion_personal['actitud_preparacion']);
            $asistencia = explode("&", $evaluacion_personal['asistencia']);
            $puntualidad = explode("&", $evaluacion_personal['puntualidad']);
            $rendimiento_en_torneos = explode("&", $evaluacion_personal['rendimiento_torneos']);

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
                'comportamiento' => array('primera_evaluacion' => "+",'segunda_evaluacion' => "+",'tercera_evaluacion' => "+"),
                'disposicion_al_trabajo' => array('primera_evaluacion' => "+",'segunda_evaluacion' => "+",'tercera_evaluacion' => "+"),
                'actitud_en_cancha' => array('primera_evaluacion' => "+",'segunda_evaluacion' => "+",'tercera_evaluacion' => "+"),
                'actitud_en_preparacion_fisica' => array('primera_evaluacion' => "+",'segunda_evaluacion' => "+",'tercera_evaluacion' => "+"),
                'asistencia' => array('primera_evaluacion' => "+",'segunda_evaluacion' => "+",'tercera_evaluacion' => "+"),
                'puntualidad' => array('primera_evaluacion' => "+",'segunda_evaluacion' => "+",'tercera_evaluacion' => "+"),
                'rendimiento_en_torneos' => array('primera_evaluacion' => "+",'segunda_evaluacion' => "+",'tercera_evaluacion' => "+")
            );
        }
        
        return $evaluacion;
    }

    function cargar_datos_obj_individuales_de_alumno($id_alumno)
    {
        $alumno = $this->alumno_model->obtener_alumno_por_id($id_alumno);
        $existe_planilla = $this->planilla_model->existe_planilla_obj_individuales_de_alumno($id_alumno);
        if($existe_planilla==1){
            $obj_individuales = $this->planilla_model->obtener_obj_individuales_por_id_alumno($id_alumno);

            $evaluaciones_derecha = explode("-", $obj_individuales['derecha']);
            $evaluaciones_reves = explode("-", $obj_individuales['reves']);
            $evaluaciones_volea_de_drive = explode("-", $obj_individuales['volea_de_drive']);
            $evaluaciones_volea_de_reves = explode("-", $obj_individuales['volea_de_reves']);
            $evaluaciones_saque_mas_smash = explode("-", $obj_individuales['saque_mas_smash']);
            $evaluaciones_devolucion = explode("-", $obj_individuales['devolucion']);
            $evaluaciones_slice = explode("-", $obj_individuales['slice']);
            $evaluaciones_control_de_direccion = explode("-", $obj_individuales['control_de_direccion']);
            $evaluaciones_control_de_profundidad = explode("-", $obj_individuales['control_de_profundidad']);
            $evaluaciones_mecanica = explode("-", $obj_individuales['mecanica']);

            $objetivos_individuales = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'derecha' => array(
                    'primera' => $evaluaciones_derecha[0],
                    'segunda' => $evaluaciones_derecha[1],
                    'tercera' => $evaluaciones_derecha[2]
                ),
                'reves' => array(
                    'primera' => $evaluaciones_reves[0],
                    'segunda' => $evaluaciones_reves[1],
                    'tercera' => $evaluaciones_reves[2]
                ),
                'volea_de_drive' => array(
                    'primera' => $evaluaciones_volea_de_drive[0],
                    'segunda' => $evaluaciones_volea_de_drive[1],
                    'tercera' => $evaluaciones_volea_de_drive[2]
                ),
                'volea_de_reves' => array(
                    'primera' => $evaluaciones_volea_de_reves[0],
                    'segunda' => $evaluaciones_volea_de_reves[1],
                    'tercera' => $evaluaciones_volea_de_reves[2]
                ),
                'saque_mas_smash' => array(
                    'primera' => $evaluaciones_saque_mas_smash[0],
                    'segunda' => $evaluaciones_saque_mas_smash[1],
                    'tercera' => $evaluaciones_saque_mas_smash[2]
                ),
                'devolucion' => array(
                    'primera' => $evaluaciones_devolucion[0],
                    'segunda' => $evaluaciones_devolucion[1],
                    'tercera' => $evaluaciones_devolucion[2]
                ),
                'slice' => array(
                    'primera' => $evaluaciones_slice[0],
                    'segunda' => $evaluaciones_slice[1],
                    'tercera' => $evaluaciones_slice[2]
                ),
                'control_de_direccion' => array(
                    'primera' => $evaluaciones_control_de_direccion[0],
                    'segunda' => $evaluaciones_control_de_direccion[1],
                    'tercera' => $evaluaciones_control_de_direccion[2]
                ),
                'control_de_profundidad' => array(
                    'primera' => $evaluaciones_control_de_profundidad[0],
                    'segunda' => $evaluaciones_control_de_profundidad[1],
                    'tercera' => $evaluaciones_control_de_profundidad[2]
                ),
                'mecanica' => array(
                    'primera' => $evaluaciones_mecanica[0],
                    'segunda' => $evaluaciones_mecanica[1],
                    'tercera' => $evaluaciones_mecanica[2]
                )
            );
        }
        else
        {
            $objetivos_individuales = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'derecha' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'reves' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'volea_de_drive' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'volea_de_reves' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'saque_mas_smash' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'devolucion' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'slice' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'control_de_direccion' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'control_de_profundidad' => array('primera' => "",'segunda' => "",'tercera' => ""),
                'mecanica' => array('primera' => "",'segunda' => "",'tercera' => ""),
            );
        }
        
        return $objetivos_individuales;
    }

    // ---------------------- Metodos PERFIL DE JUGADOR ---------------------- //

    

    // ---------------------- Metodos EVALUACION PERSONAL ---------------------- //

    // ----------------------------------- METODOS PRIVADOS ------------------------- //

    function establecer_datos_para_mostrar_lista_de_grupos_de_entrenador($sub_grupos_de_entrenador)
    {
        $lista_sub_grupos = array();
        foreach ($sub_grupos_de_entrenador as $sub_grupo) {
            $item_sub_grupo = array();
            $item_sub_grupo['grupo'] = $this->grupo_model->obtener_grupo_por_id($sub_grupo['id_grupo']);
            $item_sub_grupo['entrenador'] = $this->string_entrenadores_para_sub_grupo($sub_grupo['id_entrenador']);
            $item_sub_grupo['sub_grupo']= $sub_grupo;
            $item_sub_grupo['lista_alumnos'] = $this->establecer_datos_alumnos_para_sub_grupo($sub_grupo['id_subgrupo']);
            $lista_sub_grupos[] = $item_sub_grupo;
        }
        return $lista_sub_grupos;
    }

    function string_entrenadores_para_sub_grupo($id_entrenadores)
    {
        //if($id_entrenadores[0]!="0")
        //{
        if($id_entrenadores!='')
        {
            $entrenadores ='';
            $lista_id_entrenadores = explode("-", $id_entrenadores);
            foreach ($lista_id_entrenadores as $id_entrenador) {
                $entrenador = $this->entrenador_model->obtener_entrenador_por_id($id_entrenador);
                $entrenadores = $entrenadores.' - '.$entrenador['nombre_persona'].' '.$entrenador['apellido_persona'];
            }
            return substr($entrenadores, 3);
        }
        else
        {
            return '';
        }
    }

    function establecer_datos_alumnos_para_sub_grupo($id_sub_grupo)
    {
        $alumnos_por_sub_grupo = $this->grupo_model->obtener_id_alumnos_por_id_grupo($id_sub_grupo);
        $lista_de_alumnos = array();
        foreach ($alumnos_por_sub_grupo as $alumno_grupo) {
            $itemAlumno = array();
            $alumno = $this->alumno_model->obtener_alumno_por_id($alumno_grupo['id_alumno']);
            $itemAlumno['id_persona'] = $alumno['id_persona'];
            $itemAlumno['nombre_persona'] = $alumno['nombre_persona'];
            $itemAlumno['apellido_persona'] = $alumno['apellido_persona'];
            $lista_de_alumnos[] = $itemAlumno;
        }
        return $lista_de_alumnos;
    }
}
?>
