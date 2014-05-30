<?php 


class Notificacion_model extends CI_Model
{
    var $details;
	public function __construct()
	{
		$this->load->database();
	}
    public function registrar_notificacion($not)
    {
        $query = $this->db->insert('notificacion', $not);
         return $query;
    }
    public function registrar_envio($envio)
    {
        $query = $this->db->insert('destinatarios', $envio);
         return $query;
    }
    public function id_notificacion($not)
    {
      $query = $this->db->get_where('notificacion',
                                    array('fecha' => $not['fecha'])); 
     
            return $query->result_array();            
    
    }
    public function ver_notificaciones()
    {
        $id=$this->session->userdata('id_usuario');
$query=$this->db->get_where('destinatarios',array('ci_destinatario'=>$id));   
            return $query->result_array();
	}
    public function notificaion_id($id_not)
    {
$query=$this->db->get_where('notificacion',array('id_notificacion'=>$id_not));   
            return $query->result_array();
    }
    public function elimniar_notificaion($id)
    {
        $id_usuario=$this->session->userdata('id_usuario');
        $this->db->delete('destinatarios', array('id_notificacion' => $id,'ci_destinatario'=>$id_usuario)); 
    }
    public function obtener_alumnos_de_grupo($id)
    {
        $query=$this->db->get_where('alumno_grupo',array('id_subgrupo'=>$id));   
            return $query->result_array();
    }
    public function buscarnot($not)
    {
$query=$this->db->get_where('destinatarios',array('id_notificacion'=>$not['id_notificacion'],'ci_destinatario'=>$not['ci_destinatario']));   
            return $query->result_array();
    }
    
}