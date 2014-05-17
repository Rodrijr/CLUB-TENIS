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
}