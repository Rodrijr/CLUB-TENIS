<?php 

class sesion_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function login($username, $password)
	{
		$data = array(
        	'login' => $username,
        	'password' => $password
        );
        $query = $this->db->get_where('usuario',$data);
        if($query->num_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}

	public function obtenerPersonaPorUsernamePassword($username,$password)
	{
		$ci_user = $this->obtenerCiPorUsernamePassword($username,$password);
		$data = array(
        	'id_persona' => $ci_user,
        );
        $query = $this->db->get_where('persona',$data);
        return $query->row_array();
	}

	function obtenerCiPorUsernamePassword($username,$password)
	{
		$data = array(
        	'login' => $username,
        	'password' => $password
        );
        $query = $this->db->get_where('usuario',$data);
        return $query->row()->id_persona;
	}
}

?>