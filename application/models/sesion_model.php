<?php 

class sesion_model extends CI_Model
{
	var $detail;
	public function __construct()
	{
		$this->load->database();
	}
}

?>