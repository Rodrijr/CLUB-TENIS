<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notificacion_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('estaLogeado')) {
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
    }
    public function index() {
        $data['main_content'] = 'notificaciones/crear_notificacion_view';
        $this->load->view('main_template', $data);
    }
    public function enviar_notificaciones() {
        $data['main_content'] = 'notificaciones/crear_notificacion_view';
        $this->load->view('main_template', $data);
    }
    public function seleccionar_destinatarios() {
        if (!isset($_SESSION['notificacion'])) {
            $_SESSION['notificacion'] = array();
        }
        $_SESSION['notificacion'] = array('asunto' => $this->input->post('ASUNTO'), 'cuerpo' => $this->input->post('CUERPO'), 'fecha' => date("d-m-y H:i:s"));
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
        $subgrupos = $this->grupo_model->obtener_todos_los_subgrupos();
        $lista = array();
        $alumnos = array();
        foreach($subgrupos as $subgrupo) {
            $id_alumnos_grupo = $this->grupo_model->obtener_id_alumnos_por_id_grupo($subgrupo['id_subgrupo']);
            foreach($id_alumnos_grupo as $id_alumno_grupo) {
                $alumno = $this->persona_model->persona_by_id($id_alumno_grupo['id_alumno']);
                if (count($alumno) == 1) {
                    array_push($alumnos, $alumno[0]);
                }
            }
            if (count($alumnos) > 0) {
                $nom_grupo = $this->grupo_model->obtener_nombre_grupo_por_id($subgrupo['id_grupo']);
                $nom_grupo = $nom_grupo[0];
                $elem = array($nom_grupo['nombre_grupo'] . "*" . $subgrupo['nombre_subgrupo'] . "*" . $subgrupo['id_subgrupo'] => $alumnos);
                array_push($lista, $elem);
            }
            $alumnos = array();
        }
        $data['grupos'] = $lista;
        $data['main_content'] = 'notificaciones/seleccionar_destinatarios';
        $this->load->view('main_template', $data);
    }
    public function enviar_a_grupo($grupos, $resp) {
        $not = $_SESSION['notificacion'];
        $destinatarios = array();
        if (array($grupos) && count($grupos) > 0) {
            foreach($grupos as $grupo) {
                $alumnos = $this->notificacion_model->obtener_alumnos_de_grupo($grupo);
                foreach($alumnos as $alumno) {
                    $ci_alumno = $this->persona_model->persona_by_id($alumno['ci_alumno']);
                    $ci_alumno = $ci_alumno[0];
                    $ci_alumno = $ci_alumno["ci_persona"];
                    $_padre = $this->persona_model->buscar_padre_alumno($ci_alumno);
                    $_padre = $_padre[0];
                    $envio = array('id_notificacion' => $resp['id_notificacion'], 'ci_destinatario' => $ci_alumno["ci_persona"], 'tipo' => '');
                    if (count($this->notificacion_model->buscarnot($envio)) == 0) {
                        $this->notificacion_model->registrar_envio($envio);
                        
                        
                        $this->enviar_email($ci_alumno['email'], $not);
                    }
                    $envio = array('id_notificacion' => $resp['id_notificacion'], 'ci_destinatario' => $_padre['ci_padre'], 'tipo' => '');
                    if (count($this->notificacion_model->buscarnot($envio)) == 0) {
                        $this->notificacion_model->registrar_envio($envio);
                         if (isset($alumno['email']) && !empty($alumno['email'])) {
            $email_to = $alumno['email'];
        } else {
            $email_to = "rodri_a_11@hotmail.es";
        }         
                    $this->enviar_email($email_to, $not);
                        $this->enviar_email($email_to, $not);
                    }
                }
            }
        }
        return;
    }
    public function enviar_email($email, $not) {
        if (isset($email) && !empty($email)) {
            $email_to = $email;
        } else {
            $email_to = "rodri_a_11@hotmail.es";
        }
        $email_subject = $not['asunto'];
        $email_from = "rodri_n@hotmail.es";
        $email_message = $not['cuerpo'] . "\n";
        $email_message.= "Fecha: " . $not['fecha'] . "\n";
        $email_message.= " \n\n\n\n";
        $email_message.= " El hogar perfecto para la familia.";
        $email_message.= " \n Direccion: Ramon Rivero casi puente Cala Cala\n";
        $email_message.= "TelÃ©fono: 591-4-4257080    Fax: 591-4-4257080 \n";
        $email_message.= " Administracion    ESCUELA DE TENIS COCHABAMBA. \n";
        $headers = 'From: ' . $email_from . " \r\n" . 'Reply-To: ' . $email_from . " \r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($email_to, $email_subject, $email_message, $headers);
    }
    public function ennviar_a_destinatarios($destinatarios, $resp) {
        $not = $_SESSION['notificacion'];
        if (is_array($destinatarios) && count($destinatarios) > 0) {
            foreach($destinatarios as $destinatario) {
        $_padre = $this->persona_model->buscar_padre_alumno($destinatario);
                $envio = array('id_notificacion' => $resp['id_notificacion'], 'ci_destinatario' => $destinatario, 'tipo' => '');
                if (count($this->notificacion_model->buscarnot($envio)) == 0) {
            $this->notificacion_model->registrar_envio($envio);
            $alumno = $this->persona_model->persona_por_ci1($destinatario);
            
        if (isset($alumno['email']) && !empty($alumno['email'])) {
            $email_to = $alumno['email'];
        } else {
            $email_to = "rodri_a_11@hotmail.es";
        }         
                    $this->enviar_email($email_to, $not);
                }
                
                if(isset( $_padre[0]))
                {
                     $_padre = $_padre[0];
                }
                else
                {
                    $padre= array(
                        'ci_padre'=>'921153'
                    );
                }
            if(!isset( $_padre['ci_padre']) || empty($_padre['ci_padre']))
                {
                    $_padre['ci_padre'] = '921153';
                }
                
                $envio = array(
                    'id_notificacion' => $resp['id_notificacion'],
                    'ci_destinatario' => $_padre['ci_padre'],
                    'tipo' => '');
                
            if (count($this->notificacion_model->buscarnot($envio)) == 0) 
            {
                    $this->notificacion_model->registrar_envio($envio);
                if (isset($_padre['email']) && !empty($_padre['email'])) {
                    $email_to = $_padre['email'];
                } 
                else {
                    $email_to = "rodri_n@hotmail.es";
                }   
                    
                    $this->enviar_email($email_to, $not);
            }
          }
        }
        return;
    }
    public function enviar_notificacion() {
        $destinatarios = $this->input->post('destinatarios');
        $grupos = $this->input->post('grupos');
        if (count($destinatarios) >= 1) {
            $not = $_SESSION['notificacion'];
            if(isset($_SESSION['notificacion']))
            {
                $not = $_SESSION['notificacion'];
           
            
            
            $resp = $this->notificacion_model->registrar_notificacion($not);
            $resp = $this->notificacion_model->id_notificacion($not);
            $resp = $resp[0];
            if (is_array($grupos) && count($grupos) > 0) {
                $this->enviar_a_grupo($grupos, $resp);
            }
            if (is_array($destinatarios) && count($destinatarios) > 0) {
                $this->ennviar_a_destinatarios($destinatarios, $resp);
            }
            $data['main_content'] = 'notificaciones/envio_satisfactorio';
            $_SESSION['notificacion'] = null;
            $this->load->view('main_template', $data);
            }
            else
            {
            $data['main_content'] = 'notificaciones/crear_notificacion_view';
        $this->load->view('main_template', $data);
            }
            
            
            
        }
            
            
        
    }
    public function ver_notificaciones() {
        $id_notificaciones = $this->notificacion_model->ver_notificaciones();
        $notificaciones = array();
        foreach($id_notificaciones as $notif) {
            $elem = $this->notificacion_model->notificaion_id($notif['id_notificacion']);
            if (count($elem) > 0) {
                array_push($notificaciones, $elem[0]);
            }
        }
        $data['notificaciones'] = $notificaciones;
        $data['main_content'] = 'notificaciones/ver_notificaciones_view';
        $this->load->view('main_template', $data);
    }
    public function eliminar_notificaciones() {
        $notificaciones = $this->input->post('notificaciones');
        if (count($notificaciones) >= 1 && isset($notificaciones)) {
            foreach($notificaciones as $notificacion) {
                $this->notificacion_model->elimniar_notificaion($notificacion);
            }
        }
        $id_notificaciones = $this->notificacion_model->ver_notificaciones();
        $notificaciones = array();
        foreach($id_notificaciones as $notif) {
            $elem = $this->notificacion_model->notificaion_id($notif['id_notificacion']);
            if (count($elem) > 0) {
                array_push($notificaciones, $elem[0]);
            }
        }
        $data['notificaciones'] = $notificaciones;
        $data['main_content'] = 'notificaciones/ver_notificaciones_view';
        $this->load->view('main_template', $data);
    }
}
?>