<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            #$data['main_content'] = 'sesiones/form_login_views';
            #$this->load->view('main_template', $data);
            #$this->load->library('form_validation');
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
	}
    
    public function index()
	{
        $this->load->library('form_validation');
	}  
    
    
    public function ver_mi_perfil()
	{   
       
        $persona = $this->persona_model->ver_mi_perfil();
        $data['persona'] = $persona[0];
        $data['perfil'] = "active";
        $data['contracenia'] = "";
        $data['modificarPerfil'] = "";
        $data['main_content'] = 'usuarios/ver_perfil_views';
		$this->load->view('main_template', $data);
    }
    public function obtener_alumno_ID($id)
    {
        return $this->alumno_model->obtener_Alumno_ID();
    }
    public function modificar_mi_perfil($id)
    {
        $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
$celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
        
        $persona = array(
            'ci_persona' => $this->input->post('CI'),
            'nombre_persona' =>$this->input->post('NOMBRE'),
            'apellido_persona' => $this->input->post('APELLIDO'),
            'telefono' =>  $telefonos,
            'celular' => $celular,
            'direccion' => $this->input->post('DIRECCION'),
            'email' => $this->input->post('EMAIL')
        );
         $actualizar = $this->persona_model->obtener_persona_CI($persona);
            if( $actualizar ==1 )
            {
                 $MSN ="El CI ya fue registrado.";
                $tipo ="panel panel-danger";
            }
            else
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
        
        $persona = $this->persona_model->ver_mi_perfil();
        $data['MSN']= $MSN ;
        $data['persona'] = $persona[0];
        $data['perfil'] = "";        
        $data['tipo']=$tipo;
        $data['contracenia'] = "";
        $data['modificarPerfil'] = "active";
        $data['main_content'] = 'usuarios/ver_perfil_views';
		$this->load->view('main_template', $data);
        
    }
    
    public function cambiar_contracena($id)
    {
               
        $actual = $this->input->post('ACTUAL');
        $nueva1 = $this->input->post('NUEVA1');
        $nueva2 = $this->input->post('NUEVA2');
        $usuario = $this->persona_model->obtener_usuario($id);
        $usuario = $usuario[0];
        if(strcasecmp($actual,$usuario['password'])== 0)
        {
            if(strcasecmp($nueva1,$nueva2)== 0)
            {
                $usuario['password'] = $nueva1;
               $actualizar = $this->persona_model->cambiar_contracenas($id,$usuario);
                if($actualizar)
                {
                    $MSN ="Modificacion Exitosa.";
                    $tipo ="panel panel-success";
                } 
            }
            else
            {
               
                $MSN = "Confirmcaion de contraceña nueva es invalida.";
                $tipo ="panel panel-danger";
            }            
        }
        else
        {
            $MSN = "Verifique la contraceña actual.";
            $tipo ="panel panel-warning";
        }
        $persona = $this->persona_model->ver_mi_perfil();
        $data['MSN']= $MSN ;
        $data['tipo']=$tipo;
        $data['persona'] = $persona[0];
        $data['perfil'] = "";
        $data['contracenia'] = "active";
        $data['modificarPerfil'] = "";
        $data['main_content'] = 'usuarios/ver_perfil_views';
		$this->load->view('main_template', $data);
        
    }
    public function ver_lista_entrenadores()
    {
        $persona = $this->persona_model->ver_lista_entrenadores();
        $data['entrenadores'] = $persona;
        $data['main_content'] = 'entrenadores/lista_entrenadores_views';
		$this->load->view('main_template', $data);
    }
}
?>