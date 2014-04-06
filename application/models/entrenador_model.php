<?php 

class Entrenador_model extends CI_Model
{
	var $details;
	public function __construct()
	{
		$this->load->database();
	}

	public function obtener_todos_los_entrenador()
	{		
		$query = $this->db->get('entrenador');
		return $query->result_array();
	}
    
    public function registrar_entrenador($entrenador)
    {
        $ci = $entrenador['ci_persona'];
        
        $query = $this->db->get_where('persona', array('ci_persona' => $ci));
            
        
        if($query->num_rows() >=1 )
        {
            return "El numero de CI ya fue registrado";
        }
        else
        {
            $resp = $this->db->insert('persona', $entrenador);

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

}

?>