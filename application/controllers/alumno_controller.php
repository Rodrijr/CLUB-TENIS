<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            $data['main_content'] = 'sesiones/form_login_views';
            $this->load->view('main_template', $data);
        }
	}

    public function index()
	{
        $data['main_content'] = 'alumnos/lista_hijos_views';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}

    public function registrar_alumno()
    {
        //if(!isset($_POST['username']))
        //{
        //    $this->login_formulario(); //si no recibimos datos por post, cargamos la vista del formulario
        //}

        $data['main_content'] = 'alumnos/registrar_alumno_view';
        $this->load->view('main_template', $data);   
    }
    
    public function ver_lista_hijos()
	{        
        $padre_alumno = $this->alumno_model->obtener_Padre_Alumno_ID();
       
        $alumnos = array();
        if($padre_alumno >= 1 )
        {          
            foreach($padre_alumno as $Hijo)
             {    
                $alumno = $this->alumno_model->obtener_alumno_ID($Hijo['id_alumno']);
                array_push($alumnos,$alumno[0]);              
             }
         }
        $data['lista'] = $alumnos;
        $data['main_content'] = 'alumnos/lista_hijos_views';
		$this->load->view('main_template', $data);
    }
    public function obtener_alumno_ID($id)
    {
        return $this->alumno_model->obtener_Alumno_ID($id);
    }
    public function modificar_perfil($id)
    {
       
        $this->form_validation->set_rules('CI','CI','trim|required|xss_clean|numeric');
         $this->form_validation->set_rules('NOMBRE','NOMBRE','trim|required|xss_clean');
         $this->form_validation->set_rules('APELLIDO','APELLIDO','trim|required|xss_clean');        
         $this->form_validation->set_rules('TELEFONO','TELEFONO','trim|required|xss_clean|numeric');  
         $this->form_validation->set_rules('DIRECCION','DIRECCION','trim|required|xss_clean'); 
 
      $persona = array(
            'ci_persona' => $this->input->post('CI'),
            'nombre_persona' =>$this->input->post('NOMBRE'),
            'apellido_persona' => $this->input->post('APELLIDO'),
            'telefono' => $this->input->post('TELEFONO'),
            'direccion' => $this->input->post('DIRECCION'),
            'email' => $this->input->post('EMAIL')
        );
        
        
        
        if($this->form_validation->run())
        {                  
                $actualizar = $this->persona_model->modificar_mi_perfil($id,$persona);
                if($actualizar)
                {
                     $MSN ="Modificacion Exitosa.";
                     $tipo ="panel panel-success";
                }
                else
                {
                    $MSN = "Verifique los datos actual.";
                     $tipo ="panel panel-danger";
                }                
        }
        else
        {
            echo $this->form_validation->run();
                $MSN  = "Verifique el formato de los datos";
                $tipo ="panel panel-info";
        }      
        
        $persona = $this->alumno_model->ver_perfil($id);
        $data['MSN']= $MSN ;
        $data['persona'] = $persona[0];
        $data['perfil'] = "";        
        $data['tipo']=$tipo;
        $data['contracenia'] = "";
        $data['modificarPerfil'] = "active";
        $data['main_content'] = 'alumnos/ver_perfil_alumno_view';
		$this->load->view('main_template', $data);
        
    }
}
?>