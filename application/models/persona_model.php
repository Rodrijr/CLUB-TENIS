<?php 
	
class Persona_model extends CI_Model
{
	var $details;
	public function __construct()
	{
		$this->load->database();
	}
    public function ver_perfil_Persona_CI($ci)
	{
        $query = $this->db->get_where('persona', array('ci_persona' => $ci)); 
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();
        }
        return "";
	}
    public function ver_mi_perfil()
	{
       //$ci= $_SESSION["ci_persona"];
       // $id_persona = $this->session->userdata('id_persona');        
        $id_persona = $this->session->userdata('id_usuario');
        $query= $this->db->get_where('persona',array('id_persona'=> $id_persona));
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();            
        }
        return "";
	}
    public function ver_perfil($id_persona)
    {
        $query= $this->db->get_where('persona',array('id_persona'=> $id_persona));
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();            
        }
        return "";
	}
    public function editar_perfil_Persona_ID($id)
	{
    }
    public function modificar_mi_perfil($id,$persona)
    {
        $this->db->where('id_persona',$id);
        return $this->db->update('persona',$persona);
        
    }
    public function cambiar_contracenas($id, $usuario)
    {
        $this->db->where('id_persona',$id);
        return $this->db->update('usuario',$usuario);
    }
    public function obtener_usuario($id)
    {
        $query = $this->db->get_where('usuario', array('id_persona' => $id)); 
        if($query->num_rows() >= 1 )
        {
            return $query->result_array();
        }
        return "";
    }
    
    public function lista_alumno_horario()
    {
         $id_persona = $this->session->userdata('id_usuario');
         $grupos = $this->grupo_model->grupos_entrenador($id_persona);
        //print_r($grupos);
         $alumnos_horario=array();
         foreach($grupos as $grupo)
         {
//print_r($grupo);echo "<br>";
         
                $id_grupo= $grupo['id_grupo'];
               
            $horarios= $this->grupo_model->obtener_horario($id_grupo);
           // print_r($horarios);
            foreach($horarios as $hora)
             {
                 $id_hora=$hora['id_horario'];
   array_push($alumnos_horario,$this->grupo_model->id_alumno_horario($id_hora));
              
             }
             
         }
         return $alumnos_horario;
    
    }
    public function ver_lista_entrenadores()
    {
       $query = $this->db->get_where('persona', array('tipo' => 'Entrenador')); 
       return $query->result_array();
    }
    
    
    

}

?>