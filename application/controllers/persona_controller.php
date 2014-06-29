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
        $this->load->helper('file');
	}
    
    public function index()
	{
        $this->load->library('form_validation');
	}  
    
    public function cambiar_estado($ci)
    {
        $persona = array(
        'ci_persona'=> $ci
        );
        $persona = $this->persona_model->retornar_persona_por_ci($persona);
        $persona = $persona[0];       
        switch ($persona['estado']) {
        case 'Activo':
            $persona['estado'] = "Inactivo";
            break;
        case 'Inactivo':
            $persona['estado'] = "Activo";
            break;
    
            }
        $this->persona_model->cambiar_estado($persona);
        $persona = $this->alumno_model->ver_lista_alumnos();
        $data['alumnos'] = $persona;
        $data['main_content'] = 'alumnos/lista_alumnos_views';
		$this->load->view('main_template', $data);
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
            'ci_persona' => $id,
            'telefono' =>  $telefonos,
            'celular' => $celular,
            'direccion' => $this->input->post('DIRECCION'),
            'email' => $this->input->post('EMAIL')
        );
         $actualizar = $this->persona_model->persona_por_ci1($persona['ci_persona']);
            if( $actualizar ==1 )
            {
                 $MSN ="El CI ya fue registrado.";
                $tipo ="panel panel-danger";
            }
            else
            {
                $actualizar = $this->persona_model->modificar_mi_perfil($persona);
                if($actualizar)
                {
                     $MSN ="Modificacion Exitosa.";
                     $tipo ="panel panel-success";
                }
                else
                {
                    $MSN = "Verifique los datos actuales.";
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
                echo "nueva:".$nueva2;
               $actualizar = $this->persona_model->cambiar_contracenas($id,$usuario);
                echo "asdcasdc".$actualizar;
                if($actualizar)
                {
                    $MSN ="Modificacion Exitosa.";
                    $tipo ="success";
                } 
            }
            else
            {
               
                $MSN = "Confirmcaion de contraceña nueva es invalida.";
                $tipo ="danger";
            }            
        }
        else
        {
            $MSN = "Verifique la contraceña actual.";
            $tipo ="warning";
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
    
    public function subir_foto($id)
    {
        $persona = $this->alumno_model->ver_lista_alumnos();

    
        $config_file = array(
       
           'upload_path' => './imagenes',
           'allowed_types' => 'gif|jpg|png',
           'file_name' => $id.".jpg",
           'overwrite' => true,
           'max_size' => 0,
           'max_filename'=>0,
           'encrypt_name'=> false,
           'remove_spaces' => false
            );
        $msn ="";
        $this->upload->initialize($config_file);
        if(!$this->upload->do_upload('userfile'))
        {
            $msn = "EL ARCHIVO DEBE SER UNA IMAGEN.";            
        }
        
      
    
        $data['MSN1']= $msn;
        $data['alumnos'] = $persona;
        $data['main_content'] = 'alumnos/lista_alumnos_views';
		$this->load->view('main_template', $data);
    }
    
    public function do_Upload()
    {
    $id=$this->session->userdata('id_usuario');
        $config_file = array(
       
           'upload_path' => './imagenes',
           'allowed_types' => 'gif|jpg|png',
           'file_name' => $id.".jpg",
           'overwrite' => true,
           'max_size' => 0,
           'max_filename'=>0,
           'encrypt_name'=> false,
           'remove_spaces' => false
       );
        $msn ="";
        $this->upload->initialize($config_file);
        if(!$this->upload->do_upload('userfile'))
        {
            $msn = "EL ARCHIVO DEBE SER UNA IMAGEN.";            
        }
        
        $persona = $this->persona_model->ver_mi_perfil();
        $data['persona'] = $persona[0];
        $data['MSN1']= $msn;
        $data['perfil'] = "";
        $data['contracenia'] = "";
        $data['modificarPerfil'] = "active";
        $data['main_content'] = 'usuarios/ver_perfil_views';
		$this->load->view('main_template', $data);   
       
    }
    public function buscar_alumno()
    { 
        $apellido = $this->input->post('apellido');
        $personas = $this->persona_model->persona_por_apellido($apellido);
        $data['alumnos'] = $personas;
        $data['main_content'] = 'alumnos/lista_alumnos_views';
		$this->load->view('main_template', $data);
 
        
    }
    
    public function buscar_padre()
    { 
        $apellido = $this->input->post('apellido');
        $personas = $this->persona_model->persona_por_apellido1($apellido);
        $data['padres'] = $personas;
        $data['main_content'] = 'alumnos/seleccionar_padre_view';
		$this->load->view('main_template', $data);
 
    }
}
?>