<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {       
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
	}

    public function index()
	{
         $data['main_content'] = 'notificaciones/crear_notificacion_view';
        $this->load->view('main_template', $data);
    
	}

    public function enviar_notificaciones()
    {    
        
        $data['main_content'] = 'notificaciones/crear_notificacion_view';
        $this->load->view('main_template', $data);
    }
    public function seleccionar_destinatarios()
    { if(!isset($_SESSION['notificacion']))
         {
             $_SESSION['notificacion']= array();
         }
        $_SESSION['notificacion'] =array(
                        'asunto' =>$this->input->post('ASUNTO'),
                        'cuerpo' => $this->input->post('CUERPO'),
                        'fecha' => date("d-m-y H:i:s")
                    );
        
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
     $subgrupos = $this->grupo_model->obtener_todos_los_subgrupos();
     $lista = array();
   
       $alumnos=array();
        foreach($subgrupos  as $subgrupo)
        {
        $id_alumnos_grupo = $this->grupo_model->obtener_id_alumnos_por_id_grupo($subgrupo['id_subgrupo']);
            foreach($id_alumnos_grupo as $id_alumno_grupo)
            {
        $alumno = $this->persona_model->persona_by_id($id_alumno_grupo['id_alumno']);
                if(count($alumno)==1)
                {
                array_push($alumnos,$alumno[0]);
                }             
            }         
            if(count($alumnos)>0)
            {
$nom_grupo = $this->grupo_model->obtener_nombre_grupo_por_id($subgrupo['id_grupo']);
            $nom_grupo = $nom_grupo[0];    
$elem = array($nom_grupo['nombre_grupo']."*".$subgrupo['nombre_subgrupo']=> $alumnos);  
                  array_push($lista,$elem); 
            }
            $alumnos = array();
        }
        $data['grupos'] = $lista; 
        $data['main_content'] = 'notificaciones/seleccionar_destinatarios';
        $this->load->view('main_template', $data);        
    }
    public function enviar_notificacion()
    {       
        $destinatarios = $this->input->post('destinatarios'); 
        if(count($destinatarios)>=1)
        {
            $not = $_SESSION['notificacion'];
            $resp = $this->notificacion_model->registrar_notificacion($not);
            $resp = $this->notificacion_model->id_notificacion($not);           
            $resp= $resp[0];
            foreach($destinatarios as $destinatario)
            {       
              
                echo "<br>";
                    $envio = array(
                        'id_notificacion' => $resp['id_notificacion'],
                        'ci_destinatario' => $destinatario,
                        'tipo' => ''
                    );
                    $this->notificacion_model->registrar_envio($envio);
                
            }          
            $data['main_content'] = 'notificaciones/envio_satisfactorio';
            $_SESSION['notificacion'] = null;
            $this->load->view('main_template', $data); 
        }
    }
        
        
        public function ver_notificaciones()
        {
         
    $id_notificaciones = $this->notificacion_model->ver_notificaciones();
            $notificaciones = array();
            foreach($id_notificaciones as $notif)
            {
$elem=$this->notificacion_model->notificaion_id($notif['id_notificacion']);
                if(count($elem)>0)
                {
                    array_push($notificaciones,$elem[0]);    
                }
            }            
            $data['notificaciones'] = $notificaciones;    
        $data['main_content'] ='notificaciones/ver_notificaciones_view';
    
            $this->load->view('main_template', $data); 
        }
    
     public function eliminar_notificaciones()
     {
          $notificaciones = $this->input->post('notificaciones'); 
      
        if(count($notificaciones)>=1 && isset($notificaciones))
        {
            foreach($notificaciones as $notificacion)
            {       
               $this->notificacion_model->elimniar_notificaion($notificacion);
            }
        }
        $id_notificaciones = $this->notificacion_model->ver_notificaciones();
            $notificaciones = array();
            foreach($id_notificaciones as $notif)
            {
$elem=$this->notificacion_model->notificaion_id($notif['id_notificacion']);
                if(count($elem)>0)
                {
                    array_push($notificaciones,$elem[0]);    
                }
            }            
            $data['notificaciones'] = $notificaciones;   
        $data['main_content'] ='notificaciones/ver_notificaciones_view';    
        $this->load->view('main_template', $data); 
                      
     }
    
}