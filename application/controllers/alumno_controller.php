<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno_controller extends CI_Controller {
	
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
        $data['main_content'] = 'alumnos/lista_hijos_views';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}

    public function ver_lista_hijos()
	{        
        $padre_alumnos = $this->alumno_model->obtener_Padre_Alumno_ID();       
        $alumnos = array();     
        if($padre_alumnos >= 1 )
        {          
            foreach($padre_alumnos as $Hijo)
             {    
                $alumno = $this->alumno_model->obtener_Alumno_CI("".$Hijo["ci_alumno"]);
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
    public function mostrar_modificar_perfil($ci)
    {
        $persona = $this->alumno_model->ver_perfil($ci);
        $data['persona'] = $persona[0];
        
        $data['perfil'] = "";    
        $data['modificarPerfil'] = "active";
        $data['main_content'] = 'alumnos/ver_perfil_alumno_view';
		$this->load->view('main_template', $data);
    }
    public function modificar_perfil($id)
    {    
         $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
        $celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
        echo "celui".$this->input->post('CELULAR1');
        $persona = array(
            'ci_persona' => $id,
            'telefono' => $telefonos,
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
                $actualizar = $this->persona_model->modificar_mi_perfil($persona);
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
    public function ver_lista_alumnos()
    {
        $persona = $this->alumno_model->ver_lista_alumnos();
        $data['alumnos'] = $persona;
        $data['main_content'] = 'alumnos/lista_alumnos_views';
		$this->load->view('main_template', $data);
    }
    
    public function registrar_alumno()
    {
        $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
        $celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
         $Alumno = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $telefonos,
                    'celular' => $celular,
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => 'Alumno',
                    'estado'=> 'Activo'
                );   
       $usuario = array (
            'ci_persona' => $Alumno['ci_persona'],
            'login' =>$this->input->post('LOGIN'),
            'password' =>$this->input->post('CONTRACENA')
                ); 
        print_r($usuario);
        if(!empty($usuario['login'])) 
        {
        $registro = $this->padre_model->verificar_ci($Alumno);        
        $registro1 = $this->persona_model->verificar_usuario($usuario);
        $MSN = $registro;       
        if(!empty($registro1))
        {
            $MSN = $registro1;
            }
            if(strcmp( "registrar" ,$MSN)==0 && empty($registro1) )
            {
                $this->session->set_userdata("AlumnoSesion",$Alumno);
                $this->session->set_userdata("UsuarioSesion",$usuario);
                $data['main_content'] ='alumnos/seleccionar_padre_view';
                $this->load->view('main_template', $data); 
            }
            else
            {
                $data['usuario'] = $usuario;
                $data['alumno'] =$Alumno;
                $data['MSN'] = $MSN;           
             $data['main_content'] = 'usuarios/fin_registro';
            $this->load->view('main_template', $data); 
            }  
        }
        else
        {
             $data['main_content'] = 'alumnos/registrar_alumno_view';
            $this->load->view('main_template', $data); 
        }
    }
    
    public function terminar_registro_alumno()
    { 
        $padres = $this->input->post('padres');
        $Alumno = $this->session->userdata("AlumnoSesion");
        $usuario =$this->session->userdata("UsuarioSesion");
       $registro = $this->padre_model->registrar_padre($Alumno);    
        $registro1 = $this->persona_model->registrar_usuario($usuario);
        $padre_alumno = array(
         'ci_padre'=> $padres,
         'ci_alumno'=> $Alumno['ci_persona']
        );
        $this->persona_model->registrar_padre_alumno($padre_alumno);
       $data['main_content'] = 'usuarios/fin_registro';
        $this->load->view('main_template', $data);
        
        
        
    }
}
?>