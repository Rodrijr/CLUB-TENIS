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

    public function ver_lista_grupos()
    {
        $listaDeEntrenadores = $this->entrenador_model->obtener_todos_los_entrenadores();
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
                $itemGrupo['nombreGrupo'] = $grupos['nombre_grupo'];
                //$itemGrupo['horarioGrupo'] = $grupos['horario_grupo'];
                $gruposEntrenador[] = $itemGrupo;
            }
            $itemEntrenador['grupos'] = $gruposEntrenador;
            $listaDeGruposPorEntrenador[] = $itemEntrenador;
        }
        $data['gruposEntrenador'] = $listaDeGruposPorEntrenador;
        $data['main_content'] = 'grupos/ver_lista_de_grupos_por_entrenador_view';
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

}
?>