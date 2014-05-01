<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horario_controller extends CI_Controller {
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

    public function agregar_horarios()
    {
        $mensaje = "no entro";
        if (isset($_POST['horarios_dia'])) {
            $optionArray = $this->input->post('horarios_dia');
            $mensaje = "entro";
        }
        $data['horarios_seleccionados'] = $optionArray;
        $data['msj'] = $mensaje;
        $data['main_content'] = 'horarios/asignar_horario_view';
        $this->load->view('main_template', $data);
    }

    // no estan siendo utilizados aun
    public function asignar_horario()
	{
        $horarios = $this->horario_model->obtener_todos_los_horarios();
        $data['lista_horarios'] = $this->determinar_turno($horarios);
		$data['main_content'] = 'horarios/asignar_horario_view';
        $this->load->view('main_template', $data);
	}

    // no esta siendo utilizado aun
    function determinar_turno($horarios)
    {
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
}
?>