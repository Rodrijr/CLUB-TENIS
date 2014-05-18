<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            #$data['main_content'] = 'sesiones/form_login_views';
            #$this->load->view('main_template', $data);
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
	}

    public function ver_grupo($id_grupo)
    {        
        $data['grupo'] = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['listaEntrenadores'] = $this->entrenador_model->obtener_todos_los_entrenadores();
        $horarios = $this->horario_model->obtener_todos_los_horarios_de_grupo($id_grupo);
        $data['listaHorarios'] = $this->establecer_horario($horarios);
        $data['alumnos'] = $this->alumno_model->ver_lista_alumnos();
        $id_alumnos = $this->grupo_model->obtener_id_alumnos_por_id_grupo($id_grupo);
        $data['listaAlumnos'] = $this->obtener_alumnos($id_alumnos);
        $data['main_content'] = 'grupos/ver_grupo_view';
        $this->load->view('main_template', $data);
    }
    public function ver_lista_grupos()
    {
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
        //$this->eliminar_grupos_repetidos($grupos);
        $data['grupos'] = $grupos;
        $data['main_content'] = 'grupos/ver_lista_de_grupos_view';
        $this->load->view('main_template', $data);
    }

    public function buscar_grupos()
    {   
        $idEntrenador = "";     
        $nombreEntrenador = $this->input->post('nombreGrupo');
        $listaDeGrupos = $this->grupo_model->buscar_grupo_por_nombre($nombreEntrenador);
        $data['grupos'] = $listaDeGrupos;
        $data['main_content'] = 'grupos/ver_lista_de_grupos_view';
        $this->load->view('main_template', $data);
    }

    public function editar_grupo($id_grupo)
    { 
        $data = $this->establecer_datos_necesarios_para_editar_grupo($id_grupo,"",1,"",1);
        $data['grupo'] = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function actualizar_grupo()
    {
        $id_grupo = $this->input->post('id_grupo');
        $nombre_grupo = $this->input->post('nombreGrupo');
        $this->grupo_model->actualizar_grupo($id_grupo, $nombre_grupo);
        $this->ver_lista_grupos();
    }

    public function nuevo_grupo()
    {
        $data['main_content'] = 'grupos/crear_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function crear_grupo()
    {
        $nombre_grupo = $this->input->post('nombreGrupo');
        $this->grupo_model->crear_grupo($nombre_grupo);
        $this->ver_lista_grupos();
    }

    // -------------------- Metodos de Horario -------------------- //

    public function agregar_horario()
    {
        $id_grupo = $this->input->post('id_grupo');
        $desde = $this->input->post('desde_hora');
        $hasta = $this->input->post('hasta_hora');
        $tipo = $this->input->post('tipo_entrenamiento');
        $entrenador = $this->input->post('entrenador');
        // ------------- Agregando Horario ------------- //
        $id_entrenador_grupo = $this->obtener_id_de_entrenador_por_nombre_apellido($entrenador);
        $alerta = $this->validar_horario($desde, $hasta, $id_grupo, $id_entrenador_grupo);
        if($alerta==0){
            $horario = $desde."-".$hasta;
            $mensaje = $this->horario_model->crear_horario($horario, $id_grupo, $id_entrenador_grupo, $tipo); }
        else {
            $mensaje = $this->establecer_mensaje_alerta($alerta); }
        $data = $this->establecer_datos_necesarios_para_editar_grupo($id_grupo, $mensaje, $alerta,"",3); 
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function agregar_alumno()
    {
        $id_grupo = $this->input->post('id_grupo');
        $alumno = $this->input->post('nombreAlumno');

        $id_alumno = $this->obtener_id_de_alumno_por_nombre_apellido($alumno);
        $alerta = $this->validar_alumno($id_alumno,$id_grupo);
        if($alerta==0)
            $mensaje = $this->grupo_model->asignar_alumno_a_grupo($id_grupo, $id_alumno);
        else
            $mensaje = "El Alumno ya se encuentra INSCRITO en este GRUPO..!!";

        $data = $this->establecer_datos_necesarios_para_editar_grupo($id_grupo, "",1,$mensaje,$alerta);
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    // ----------------------------------- METODOS PRIVADOS ------------------------- //

    function validar_alumno($id_alumno, $id_grupo)
    {
        return $this->grupo_model->existe_alumno_en_alumno_grupo($id_grupo, $id_alumno);
    }

    function obtener_alumnos($id_alumnos)
    {
        $listaAlumnos = array();
        foreach ($id_alumnos as $alumno) {
            $itemAlumno = array();
            $get_alumno = $this->alumno_model->obtener_alumno_por_id($alumno['id_alumno']);
            $itemAlumno['nombre_alumno'] = $get_alumno['nombre_persona'];
            $itemAlumno['apellido_alumno'] = $get_alumno['apellido_persona'];
            $listaAlumnos[] = $itemAlumno;
        }
        return $listaAlumnos;
    }
    
    function establecer_horario($horarios)
    {
        $listaHorarios = array();
        foreach ($horarios as $horario ) {
            $itemHorario = array();
            $itemHorario['hora'] = $horario['hora'];
            $entrenador = $this->entrenador_model->obtener_entrenador_por_id($horario['id_entrenador']);
            $itemHorario['entrenador'] = $entrenador['nombre_persona']." ".$entrenador['apellido_persona'];
            $itemHorario['tipo'] = $horario['tipo'];
            $listaHorarios[] = $itemHorario;
        }
        return $listaHorarios;
    }

    function obtener_id_de_alumno_por_nombre_apellido($alumno)
    {
        $nombre_apellido = explode(" - ", $alumno);
        $nombre_alumno = $nombre_apellido[0];
        $apellido_alumno = $nombre_apellido[1];
        $id_alumno = $this->alumno_model->obtener_id_alumno_por_nombre_apellido($nombre_alumno, $apellido_alumno);
        return $id_alumno['id_persona'];
    }

    function validar_horario($desde, $hasta, $id_grupo, $id_entrenador_grupo)
    {
        $alerta = $this->horario_model->buscar_horario_por_todos_sus_datos($desde."-".$hasta, $id_grupo, $id_entrenador_grupo);
        if($desde>=$hasta)
            return 2;
        else
            return $alerta;
    }

    function establecer_mensaje_alerta($alerta)
    {
        if($alerta==2)
            return "El Horario DESDE no puede ser MAYOR que el Horario HASTA..!!";
        else
            return "El Horario ya se encuentra REGISTRADO..!!";
    }

    function obtener_id_de_entrenador_por_nombre_apellido($entrenador)
    {
        $nombre_apellido = explode(" - ", $entrenador);
        $nombre_entrenador = $nombre_apellido[0];
        $apellido_entrenador = $nombre_apellido[1];
        $entrenador_grupo = $this->entrenador_model->obtener_id_entrenador_por_nombre_apellido($nombre_entrenador, $apellido_entrenador);
        return $entrenador_grupo['id_persona'];
    }

    function establecer_datos_necesarios_para_editar_grupo($id_grupo, $mensaje_horario, $alerta_horario, $mensaje_alumno, $alerta_alumno)
    {
        // ------------- Lista de todo los Alumnos ---------- //
        $data['alumnos'] = $this->alumno_model->ver_lista_alumnos();
        // ------------- /. Lista de todo los Alumnos ---------- //

        // ------------- Lista de todos losEntrenadores ---------- //
        $data['listaEntrenadores'] = $this->entrenador_model->obtener_todos_los_entrenadores();
        // ------------- /. Lista de todos losEntrenadore ---------- //
        return $data;
    }
}
?>