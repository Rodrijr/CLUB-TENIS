<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Padres_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();        
    }
 
    public function index()
	{
        $data['main_content'] = 'registrar_padre';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
    
    public function ingresar_datos_padre_codigo()
    {
        $data['main_content'] ='padres/reg_padre_views';
        $this->load->view('main_template', $data);
    }

    public function registrar_padre_codigo()
    {
        $codigo = $this->input->post('CODIGO');
        $sep = explode('-',$codigo);
        $validar = $this->persona_model->verificar_codigo($sep[1]);
        if(count($validar)>=1)
        {
            /* funcion que verifique  el codigo  de alumno para validar el registro de padre */ 
            $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
            $celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
            $padre = array(
                'ci_persona'=> $this->input->post('CI'),
                'nombre_persona' => $this->input->post('NOMBRE'),
                'apellido_persona' => $this->input->post('APELLIDO'),
                'telefono' => $telefonos,
                'celular' => $celular,
                'direccion' => $this->input->post('DIRECCION'),  
                'email' => $this->input->post('EMAIL'),
                'tipo' => 'Padre',
                'estado'=> 'Activo'
                );   
            $usuario = array(
                'login' =>$this->input->post('LOGIN'),
                'password' =>$this->input->post('CONTRACENA')
                ); 
            $registro = $this->padre_model->verificar_ci($padre);    
            $registro1 = $this->persona_model->verificar_usuario($usuario);
            $MSN = $registro;       
            if(!empty($registro1)){
                $MSN = $registro1;
            }
            if(strcmp("registrar",$MSN)==0 && empty($registro1)){
                $registro = $this->padre_model->registrar_padre($padre);    
                $per = $this->persona_model->retornar_persona_por_ci($padre);                   $per  = $per[0];
                $usuario = array(
                    'ci_persona' => $per['ci_persona'],
                    'login' =>$this->input->post('LOGIN'),
                    'password' =>$this->input->post('CONTRACENA')
                    ); 
                $registro1 = $this->persona_model->registrar_usuario($usuario);
                $MSN = $registro;
                if(!empty($registro1)){
                    /* eliminar padre registrado y retornar datos */
                    $MSN = $registro1;
                    $data['padre'] =$padre;
                }
                else{
                    /* el registro fue exitoso */

                    /* Iniciando Datos De Sesion */
                    $persona_usuario = $this->sesion_model->obtenerPersonaPorUsernamePassword($usuario['login'],$usuario['password']);
                    $datos_de_session = array(
                        'id_usuario' => $persona_usuario['ci_persona'],
                        'identificador_usuario' => $persona_usuario['id_persona'],
                        'nombre_usuario' => $persona_usuario['nombre_persona'].' '.$persona_usuario['apellido_persona'],
                        'tipo_usuario'=> $persona_usuario['tipo']
                    );
                    $this->session->set_userdata($datos_de_session);
                    $this->session->set_userdata('estaLogeado', TRUE);
                    if(strcmp($datos_de_session['tipo_usuario'],"Padre") ||strcmp($datos_de_session['tipo_usuario'],"Alumno") )
                    {
                       $count = count($this->notificacion_model->ver_notificaciones());
                       $_SESSION['notif'] = $count;
                    }
                    /* Vista Codigo Padre */
                    $data['main_content'] ='padres/buscar_hijos_views';
                    $this->load->view('main_template', $data);
                }
            }
            else{
                $data['usuario'] = $usuario;
                $data['padre'] =$padre;
            }
        }
        else{
            $MSN = "El codigo ingresado no es valido.";
            $data['MSN'] = $MSN;
            $data['main_content'] ='padres/reg_padre_views';
            $this->load->view('main_template', $data);
        }
    }

    public function ingresar_codigo()
    {
        $data['alumnos'] = $this->persona_model->obtener_alumnos();
        $data['main_content'] ='padres/buscar_hijos_views';
        $this->load->view('main_template', $data);
    }

    public function agregar_hijo_por_codigo()
    {
        $codigo_alumno = $this->input->post('codigo_alumno');
        $persona = $this->persona_model->verificar_codigo($codigo_alumno);
        if(count($persona)>=1)
        {   
            $padre_alumno = array(
                'ci_padre' => $this->session->userdata('id_usuario'),
                'ci_alumno' => $persona[0]['ci_persona']
                );
            $this->persona_model->registrar_padre_alumno($padre_alumno);
        }
        $data['main_content'] ='padres/buscar_hijos_views';
        $this->load->view('main_template', $data);
    }
    
}