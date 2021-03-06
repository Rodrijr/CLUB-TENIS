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
        $ci_persona = $this->session->userdata('ci_usuario');
        $query= $this->db->get_where('persona',array('ci_persona'=> $ci_persona));
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
    public function modificar_mi_perfil($persona,$ci)
    {
      print_r($persona);
        $this->db->where('ci_persona',$ci);
        return $this->db->update('persona',$persona);
        
    }
    public function cambiar_contracenas($id, $usuario)
    {
        $this->db->where('ci_persona',$id);
        return $this->db->update('usuario',$usuario);
    }
    public function retornar_persona_por_ci($persona)
    {        
         $query = $this->db->get_where('persona', array('ci_persona' => $persona['ci_persona'])); 
        if($query->num_rows() >= 1 )
        { 
         return $query->result_array();
        }   
        return 0;
    }
    public function obtener_persona_CI($persona)
    {
        $query = $this->db->get_where('persona', array('ci_persona' => $persona['ci_persona'])); 
         $per = $query->result_array();
        
        if($query->num_rows() >= 1 )
        { 
            $per2 = $per[0];
            if($per2['ci_persona'] == $persona['ci_persona'])
            {
               return 0;
            }
            else
                return 1;
        }
        return 0;
    }
    public function obtener_usuario($ci)
    {
        $query = $this->db->get_where('usuario', array('ci_persona' => $ci)); 
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
         $alumnos_horario=array();
         foreach($grupos as $grupo)
         {
         
                $id_grupo= $grupo['id_grupo'];
               
            $horarios= $this->grupo_model->obtener_horario($id_grupo);
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
        
    $this->db->order_by('nombre_persona', 'asc');
       $query = $this->db->get_where('persona', array('tipo' => 'Entrenador')); 
       return $query->result_array();
    }
    public function obtener_padres()
    {
       $query = $this->db->get_where('persona', array('tipo' => 'Padre')); 
       return $query->result_array();
    }
    public function obtener_alumnos()
    {
       $query = $this->db->get_where('persona', array('tipo' => 'Alumno')); 
       return $query->result_array();
    }
    public function persona_ci($persona)
    {
        $this->db->select('*');
        if(!empty($persona['ci_persona']))
        {
        $this->db->or_like('ci_persona', $persona['ci_persona']);
        }
        if(!empty($persona['nombre_persona']))
        {
        $this->db->or_like('nombre_persona', $persona['nombre_persona']);
        }
        if(!empty($persona['apellido_persona']))
        {
        $this->db->or_like('apellido_persona', $persona['apellido_persona']);
        }
        $query=$this->db->get('persona');
        return $query->result_array();
    }
   /* public function persona_nombre($persona)
    {
        $this->db->select('*');
        $this->db->like('nombre_persona', $persona['nombre_persona']);
        $query=$this->db->get('persona');
      
        return $query->result_array();
    }
    public function persona_apellido($persona)
    {
        $this->db->select('*');
        $this->db->like('apellido_persona', $persona['apellido_persona']);
        $query=$this->db->get('persona');
        return $query->result_array();
    }*/
    
    public function registrar_padre_alumno($padre_alumno)
    {
        $resp = $this->db->insert('padre_alumno', $padre_alumno);
        if($resp!=1)
        {
            return "No se pudo registrar el usuario";
        }
    }
    public function verificar_usuario($usuario)
    {
        $query = $this->db->get_where('usuario', array('login' => $usuario['login']));       
        if($query->num_rows() >=1 )
        {
            return "El nombre de usuario ya fue usado";
        }
    }
    public function registrar_usuario($usuario)
    {
        $resp = $this->db->insert('usuario', $usuario);
        if($resp!=1)
        {
            return "No se pudo registrar el usuario";
        }
    }
    public function persona_by_id($id)
    {
         $query = $this->db->get_where('persona', array('id_persona' => $id)); 
         return $query->result_array();
    }   
    public function buscar_padre_alumno($ci_alumno)
    {
        $query = $this->db->get_where('padre_alumno', array('ci_alumno' => $ci_alumno)); 
         return $query->result_array();
    }
    public function persona_por_ci($ci)
    {
         $query = $this->db->get_where('persona', array('ci_persona' => $ci,'tipo'=>'Alumno')); 
         return $query->result_array();
    }
    public function persona_por_apellido($apellido)
    {
        $this->db->select('*');
        $this->db->like('apellido_persona', $apellido);
        $this->db->where('tipo', 'Alumno');
        $query=$this->db->get('persona');
        return $query->result_array();    
    }
    
    public function persona_por_apellido1($apellido)
    {
        $this->db->select('*');
        $this->db->like('apellido_persona', $apellido);
        $this->db->where('tipo', 'Padre');
        $query=$this->db->get('persona');
        return $query->result_array();    
    }
    public function persona_por_apellido2($apellido)
    {
        $this->db->select('*');
        $this->db->like('apellido_persona', $apellido);
        $query=$this->db->get('persona');
        return $query->result_array();    
    }
    
    
    
    public function persona_por_ci1($nuevo,$ci)
    {
        $query = $this->db->get_where('persona', array('ci_persona' => $nuevo)); 
        $per = $query->result_array();
        
        $query1 = $this->db->get_where('persona', array('ci_persona' => $ci)); 
        $per1 = $query->result_array();
        if(count($per)==1 )
        {
            $per = $per[0];
            $per1 = $per1[0];
            if($per['ci_persona']==$ci)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }
        if(count($per)> 1 )
        {
                return 1;
        }
        return 0;
    }
    
    public function cambiar_estado($persona)
    {
        $this->db->where('ci_persona', $persona['ci_persona']);
        $this->db->update('persona', $persona); 
    }
   
    public function poner_ci()
    {
        $query = $this->db->get('persona');
        $query = $query->result_array();
        foreach($query as $persona)
        {
            if(empty($persona['estado']))
            {
                $persona['estado']='Activo';
                $this->db->where('id_persona', $persona['id_persona']);
                $this->db->update('persona', $persona); 
            }
        }
    }
    
    /* 
    borrar una ves q los padres se registraron
    */
    public function verificar_codigo($codigo)
    {
         $query = $this->db->get_where('persona', array('codigo' => $codigo)); 
         return $query->result_array();
    }
    public function ususario_por_ci($ci)
    {
      $query = $this->db->get_where('usuario', array('ci_persona' => $ci)); 
         return $query->result_array();   
    }
    
    
    
    public function actualizar_destinatarios($ci_nuevo,$ci)
    {
        $mensajes=$this->db->get_where('destinatarios',array('ci_destinatario'=>$ci));   
        $mensajes = $mensajes->result_array();         
        foreach($mensajes as $mensaje)
        {
            $mensaje['ci_destinatario'] = $ci_nuevo."";
            $this->db->where('ci_destinatario', $ci);
            $this->db->update('destinatarios', $mensaje); 
        }
    }
    public function actualizar_padre_alumno($ci_nuevo,$ci)
    {
$rel1=$this->db->get_where('padre_alumno',array('ci_alumno'=>$ci));
        $rel1 = $rel1->result_array();
    
        $rel2 = $this->db->get_where('padre_alumno',array('ci_padre'=>$ci));
        $rel2 = $rel2->result_array();
        foreach($rel1 as $rel )
        {
            $rel['ci_alumno']= $ci_nuevo."";
            $this->db->where('ci_alumno', $ci);
            $this->db->update('padre_alumno', $rel); 
        }
        foreach($rel2 as $rela )
        {
            $rela["ci_padre"]= $ci_nuevo."";
            $this->db->where('ci_padre', $ci);
            $this->db->update('padre_alumno', $rela); 
        }
        
        
    }
   
    public function actualizar_usuario($ci_nuevo,$ci)
    {
        $usuario=$this->db->get_where('usuario',array('ci_persona'=>$ci));   
        $usuario = $usuario->result_array();    
        print_r($usuario);
        $usuario['ci_persona'] = $ci_nuevo."";
        $this->db->where('ci_persona', $ci);
        $this->db->update('usuario', $usuario);         
    }
    public function actualizar_ci_en_tablas($persona,$ci)
    {        
    $this->actualizar_destinatarios($persona['ci_persona'],$ci);
    $this->actualizar_padre_alumno($persona['ci_persona']."",$ci);
    }
}
?>