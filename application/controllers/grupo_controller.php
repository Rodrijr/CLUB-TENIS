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
        $grupo =$this->grupo_model->obtener_grupo_ID($id_grupo);
        $grupo = $grupo[0];
        $entrenador = $this->entrenador_model->obtener_entrenador_ID($grupo['id_entrenador']);
        $horarios = $this->grupo_model->obtener_horario($id_grupo);
        $data['grupo']= $grupo;
        $data['persona']=$entrenador[0];
        $data['horarios']=$horarios;
        $data['main_content'] = 'grupos/ver_grupo_view';
        $this->load->view('main_template', $data);
    }
    public function ver_lista_grupos()
    {
        $grupos = $this->grupo_model->obtener_todos_los_grupos();

        $listaDeGrupos = array();
        foreach ($grupos as $grupo) {
            $itemGrupo = array();
            $itemGrupo['id_grupo'] = $grupo['id_grupo'];
            $itemGrupo['nombre_grupo'] = $grupo['nombre_grupo'];
            if($grupo['id_entrenador']==0)
            {
                $itemGrupo['nombre_entrenador'] = "";
            }
            else
            {
                $entrenador = $this->entrenador_model->obtener_entrenador_por_id($grupo['id_entrenador']);
                $itemGrupo['nombre_entrenador'] = $entrenador['nombre_persona']." ".$entrenador['apellido_persona'];
            }
            $listaDeGrupos[] = $itemGrupo;
        }
        $data['lista_de_grupos'] = $listaDeGrupos;
        $data['main_content'] = 'grupos/ver_lista_de_grupos_view';
        $this->load->view('main_template', $data);
    }

    public function buscar_grupos()
    {   
        $idEntrenador = "";     
        $nombreEntrenador = $this->input->post('nombreEntrenador');
        //echo $nombreEntrenador.' =) <br>';
        $listaDeEntrenadores = $this->entrenador_model->buscar_entrenador_por_nombre($nombreEntrenador);
        $listaDeGruposPorEntrenador = array();
        foreach ($listaDeEntrenadores as $entrenador) {
            $itemEntrenador = array();
            $itemEntrenador['nombreEntrenador']= $entrenador['nombre_persona'];
            $itemEntrenador['apellidosEntrenador']= $entrenador['apellido_persona'];
            // lista de grupos por entrenador
            $gruposEntrenador = array();
            $listaGruposEntrenador = $this->entrenador_model->obtener_todos_los_cursos_entrenador($entrenador['id_persona']);
            foreach ($listaGruposEntrenador as $grupos) {
                $itemGrupo = array();
                $itemGrupo['idGrupo'] = $grupos['id_grupo'];
                $itemGrupo['nombreGrupo'] = $grupos['nombre_grupo'];
                $gruposEntrenador[] = $itemGrupo;
            }
            $itemEntrenador['grupos'] = $gruposEntrenador;
            $listaDeGruposPorEntrenador[] = $itemEntrenador;
        }
        $data['gruposEntrenador'] = $listaDeGruposPorEntrenador;
        $data['main_content'] = 'grupos/ver_lista_de_grupos_por_entrenador_view';
        $this->load->view('main_template', $data);
    }

    public function editar_grupo($id_grupo)
    {
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
        // -------------------- Lista de Horarios -------------------- //
        $data['lista_horarios'] = $this->determinar_turno_horarios();
        // -------------------- /. Lista de Horarios -------------------- //

        # datos para mostrar sus horarios
        $lista_horarios = $this->horario_model->obtener_todos_los_horarios_de_grupo($id_grupo);
        $lista_horarios_grupo = array();
        foreach ($lista_horarios as $horario) {
            $lista_horarios_grupo[] = $this->horario_model->obtener_horario_por_id($horario['id_horario']);
        }
        $data['lista_horarios_de_grupo'] = $lista_horarios_grupo;
        $data['cantidad_horarios'] = count($lista_horarios);

        # cargar vistas
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
        else{
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
        $mensaje_crear_grupo = $this->grupo_model->crear_grupo($nombre_grupo);
        $grupos = $this->grupo_model->obtener_todos_los_grupos($nombre_grupo);
        foreach($grupos as $itemgrupo){
            $ultimo_grupo = $itemgrupo;
        }
        $entrenadores = $this->entrenador_model->obtener_todos_los_entrenadores();
        $data['grupo'] = $ultimo_grupo;
        $data['entrenadores'] = $entrenadores;
        if($grupo['id_entrenador']==0){
            $data['nombre_entrenador'] = "";
        }
        else{
            $entrenador = $this->entrenador_model->obtener_entrenador_por_id($ultimo_grupo['id_entrenador']);
            $data['nombre_entrenador'] = $entrenador['nombre_persona']." ".$entrenador['apellido_persona'];
        }
        $data['main_content'] = 'grupos/editar_grupo_view';
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

    public function agregar_horario_a_grupo()
    {
        $id_grupo = $this->input->post('id_grupo');
        if (isset($_POST['horarios_dia'])) {
            $lista_horarios = $this->input->post('horarios_dia');
            $this->grupo_model->asignar_horarios($id_grupo,$lista_horarios,'0');
        }

        # datos para mostrar grupo y su entrenador
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
        # datos para cargar todos los horarios
        // -------------------- Lista de Horarios -------------------- //
        $data['lista_horarios'] = $this->determinar_turno_horarios();
        // -------------------- /. Lista de Horarios -------------------- //
        # datos para mostrar sus horarios de grupo
        $lista_horarios = $this->horario_model->obtener_todos_los_horarios_de_grupo($id_grupo);
        $lista_horarios_grupo = array();
        foreach ($lista_horarios as $horario) {
            $lista_horarios_grupo[] = $this->horario_model->obtener_horario_por_id($horario['id_horario']);
        }
        $data['lista_horarios_de_grupo'] = $lista_horarios_grupo;
        $data['cantidad_horarios'] = count($lista_horarios);
        # cargar vista
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }
    // -------------------- /. Metodos de Horario -------------------- //
}
?>