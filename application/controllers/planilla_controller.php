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
        $data['objetivos_de_jugador'] = $this->cargar_datos_obj_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/ver_objetivos_de_jugador_alumno_view';
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
        $data['objetivos_de_jugador'] = $this->cargar_datos_obj_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/evaluacion_persoanl_view';
        $this->load->view('main_template', $data);
    }

    public function ver_evaluacion_personal($id_alumno)
    {
        $data['objetivos_de_jugador'] = $this->cargar_datos_obj_de_jugador_de_alumno($id_alumno);
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/ver_objetivos_de_jugador_alumno_view';
        $this->load->view('main_template', $data);
    }

    public function guardar_datos_planilla_evaluacion_personal()
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
                'id_alumno' => $id_alumno,
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

    // ---------------------- Metodos PERFIL DE JUGADOR ---------------------- //

    public function cargar_datos_perfil_de_jugador_de_alumno($id_alumno)
    {
        $alumno = $this->alumno_model->obtener_alumno_por_id($id_alumno);
        $existe_planilla = $this->planilla_model->existe_perfil_jugador_de_alumno($id_alumno);
        if($existe_planilla==1){
            $perfil_jugador = $this->planilla_model->obtener_perfil_jugador_por_id_alumno($id_alumno);

            $servicios = explode("-", $perfil_jugador['servicios']);
            $servicios_data = $servicios[0];
            $servicio_aspectos_positivos = $servicios[1];
            $servicio_aspectos_a_mejorar = $servicios[2];

            $devolucion = explode("-", $perfil_jugador['devolucion']);
            $devolucion_data = $devolucion[0];
            $devolucion_aspectos_positivos = $devolucion[1];
            $devolucion_aspectos_a_mejorar = $devolucion[2];

            $cancha = explode("-", $perfil_jugador['cancha']);
            $cancha_data = $cancha[0];
            $cancha_aspectos_positivos = $cancha[1];
            $cancha_aspectos_a_mejorar = $cancha[2];

            $red = explode("-", $perfil_jugador['red']);
            $red_data = $red[0];
            $red_aspectos_positivos = $red[1];
            $red_aspectos_a_mejorar = $red[2];

            $aspecto_mental = explode("-", $perfil_jugador['aspecto_mental']);
            $aspecto_mental_data = $aspecto_mental[0];
            $aspecto_mental_aspectos_positivos = $aspecto_mental[1];
            $aspecto_mental_aspectos_a_mejorar = $aspecto_mental[2];

            $competicion = explode("-", $perfil_jugador['competicion']);
            $competicion_data = $competicion[0];
            $competicion_aspectos_positivos = $competicion[1];
            $competicion_aspectos_a_mejorar = $competicion[2];

            $perfil_de_jugador = array(
                'id_alumno' => $id_alumno,
                'alumno' => $alumno['nombre_persona'].' '.$alumno['apellido_persona'],
                'servicios' => array(
                    'servicios_data' => $servicios_data,
                    'aspectos_positivos' => $servicio_aspectos_positivos,
                    'aspectos_a_mejorar' => $servicio_aspectos_a_mejorar
                ),
                'devolucion' => array(
                    'devolucion_data' => $devolucion_data,
                    'aspectos_positivos' => $devolucion_aspectos_positivos,
                    'aspectos_a_mejorar' => $devolucion_aspectos_a_mejorar
                ),
                'cancha' => array(
                    'cancha_data' => $cancha_data,
                    'aspectos_positivos' => $cancha_aspectos_positivos,
                    'aspectos_a_mejorar' => $cancha_aspectos_a_mejorar
                ),
                'red' => array(
                    'red_data' => $red_data,
                    'aspectos_positivos' => $red_aspectos_positivos,
                    'aspectos_a_mejorar' => $red_aspectos_a_mejorar
                ),
                'aspecto_mental' => array(
                    'aspecto_mental_data' => $aspecto_mental_data,
                    'aspectos_positivos' => $aspecto_mental_aspectos_positivos,
                    'aspectos_a_mejorar' => $aspecto_mental_aspectos_a_mejorar
                ),
                'competicion' => array(
                    'competicion_data' => $competicion_data,
                    'aspectos_positivos' => $competicion_aspectos_positivos,
                    'aspectos_a_mejorar' => $competicion_aspectos_a_mejorar
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

    // ---------------------- Metodos EVALUACION PERSONAL ---------------------- //

    // ----------------------------------- METODOS PRIVADOS ------------------------- //
}
?>
