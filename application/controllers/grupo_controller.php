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

    public function index()
	{
	}

    public function ver_grupo($id_grupo)
    {        
        $grupo =$this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['grupo']= $grupo;
        $data['main_content'] = 'grupos/ver_grupo_view';
        $this->load->view('main_template', $data);
    }
    public function ver_lista_grupos()
    {
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
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
        $data['grupo'] = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['listaEntrenadores'] = $this->entrenador_model->obtener_todos_los_entrenadores();
        $horarios = $this->horario_model->obtener_todos_los_horarios_de_grupo($id_grupo);
        $data['listaHorarios'] = $this->establecer_horario($horarios);
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function actualizar_grupo()
    {
        $id = $this->input->post('idGrupo');
        $nuevo_grupo = array(
            'nombre_grupo' =>  $this->input->post('nombreGrupo')
        );
        $actualizar = $this->grupo_model->actualizar_grupo($id,$nuevo_grupo);
        if($actualizar)
        {

        }
        else
        {

        }
        $this->ver_lista_grupos();
    }

    public function desasignar_entrenador_de_grupo($id_grupo)
    {
        # datos para mostrar el mensaje
        $mensaje = $this->grupo_model->desasignar_entrenador_de_grupo($id_grupo);
        $data['mensaje'] = $mensaje;
        # datos para mostrar grupos
        $entrenadores = $this->entrenador_model->obtener_todos_los_entrenadores();
        $grupo = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['grupo'] = $grupo;
        $data['entrenadores'] = $entrenadores;
        if($grupo['id_entrenador']==0){
            $data['nombre_entrenador'] = "";
        }
        else{
            $entrenador = $this->entrenador_model->obtener_entrenador_por_id($grupo['id_entrenador']);
            $data['nombre_entrenador'] = $entrenador['nombre_persona']." ".$entrenador['apellido_persona'];
        }

        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function asignar_entrenador_a_grupo($id_grupo, $id_entrenador)
    {
        # datos para mostrar el mensaje
        $mensaje = $this->grupo_model->asignar_entrenador_de_grupo($id_grupo, $id_entrenador);
        $data['mensaje'] = $mensaje;
        # datos para mostrar grupos
        $entrenadores = $this->entrenador_model->obtener_todos_los_entrenadores();
        $grupo = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['grupo'] = $grupo;
        $data['entrenadores'] = $entrenadores;
        if($grupo['id_entrenador']==0){
            $data['nombre_entrenador'] = "";
        }
        else
        {
            $entrenador = $this->entrenador_model->obtener_entrenador_por_id($grupo['id_entrenador']);
            $data['nombre_entrenador'] = $entrenador['nombre_persona']." ".$entrenador['apellido_persona'];
        }
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function nuevo_grupo()
    {
        $data['main_content'] = 'grupos/crear_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function crear_grupo()
    {
        $nombre_grupo = $this->input->post('nombreGrupo');
        $descripcion_grupo = $this->input->post('descripcionGrupo');
        $mensaje_crear_grupo = $this->grupo_model->crear_grupo($nombre_grupo, $descripcion_grupo);
        $data['grupos'] = $this->grupo_model->obtener_todos_los_grupos();
        $data['main_content'] = 'grupos/ver_lista_de_grupos_view';
        $this->load->view('main_template', $data);
    }

    // -------------------- Metodos de Horario -------------------- //

    function determinar_turno_horarios()
    {
        $horarios = $this->horario_model->obtener_todos_los_horarios();
        $listaDeHorarios = array();
        $turnoManiana = array();
        $turnoTarde = array();
        $turnoNoche = array();
        foreach ($horarios as $horario) {
            $itemHorario = array();
            $itemHorario['id_horario'] = $horario['id_horario'];            
            $itemHorario['desde'] = $horario['desde'].':00';
            $itemHorario['hasta'] = $horario['hasta'].':00';
            if($horario['turno']=='mañana')
                $turnoManiana[] = $itemHorario;
            elseif($horario['turno']=='tarde')
                $turnoTarde[] = $itemHorario;
            else
                $turnoNoche[] = $itemHorario;
        }
        $listaDeHorarios['turno_dia'] = $turnoManiana;
        $listaDeHorarios['turno_tarde'] = $turnoTarde;
        $listaDeHorarios['turno_noche'] = $turnoNoche;
        return $listaDeHorarios;
    }

    public function agregar_horario()
    {
        $id_grupo = $this->input->post('id_grupo');
        
        // ------------- Agregando Horario ------------- //
        $horario = $this->input->post('desde_hora')."-".$this->input->post('hasta_hora');
        $tipo = $this->input->post('tipo_entrenamiento');
        $entrenador = $this->input->post('entrenador');
        $nombre_apellido = explode(" - ", $entrenador);
        $nombre_entrenador = $nombre_apellido[0];
        $apellido_entrenador = $nombre_apellido[1];
        $entrenador_grupo = $this->entrenador_model->obtener_id_entrenador_por_nombre_apellido($nombre_entrenador, $apellido_entrenador);
        $this->horario_model->crear_horario($horario, $id_grupo, $entrenador_grupo['id_persona'], $tipo);
        // ------------- /. Agregando Horario ---------- //

        // ------------- /. Lista Horario ---------- //
        $horarios = $this->horario_model->obtener_todos_los_horarios_de_grupo($id_grupo);
        $data['listaHorarios'] = $this->establecer_horario($horarios);
        // ------------- /. Lista Horario ---------- //
        $data['grupo'] = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['listaEntrenadores'] = $this->entrenador_model->obtener_todos_los_entrenadores();
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }
    // -------------------- /. Metodos de Horario -------------------- //
    
    public function ver_mis_grupos()
    {
        $grupos =$this->grupo_model->ver_mis_grupos();
        $data['grupos']=$grupos;
      
        $data['main_content'] = 'grupos/ver_mis_grupos_view';
        $this->load->view('main_template', $data);
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
}
?>