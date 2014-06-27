<?php 

class Padre_model extends CI_Model
{
	var $details;
	public function __construct()
	{
		$this->load->database();
	}

	public function obtener_todos_los_padres()
	{		
		$query = $this->db->get('padre');
		return $query->result_array();
	}
    public function verificar_ci($padre)
    {
        $ci = $padre['ci_persona'];
        $query = $this->db->get_where('persona', array('ci_persona' => $ci));
            
        
        if($query->num_rows() >=1 )
        {
            return "El numero de CI ya fue registrado";
        }
        else
        {
            return "registrar";
        }
    }
    public function registrar_padre($padre)
    {
        $resp = $this->db->insert('persona', $padre);

        if($resp==1)
        {
            return "El registro fue existoso";
        }
        else
        {
            return "Revise el formato de los datos";
        }
    }

}

?>