<?php

class Grupo_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}
    public function obtener_horario($id_grupo)
    {
        $query = $this->db->get_where('horario', array('id_grupo'=>$id_grupo)); 
        //print_r($query);
        return $query->result_array();
    }

    public function obtener_grupo_por_id($id_grupo)
    {
    	$query = $this->db->get_where('grupo', array('id_grupo'=>$id_grupo)); 
        return $query->row_array();
    }

    public function actualizar_grupo($id,$nombre_grupo)
    {
        $datos_grupo = array(
            'nombre_grupo' => $nombre_grupo,
            );
        $this->db->where('id_grupo',$id);
        return $this->db->update('grupo',$datos_grupo);
    }

    public function obtener_todos_los_grupos()
    {
        $query = $this->db->get('grupo');
        return $query->result_array();
    }
    public function obtener_todos_los_subgrupos()
    {
        $query = $this->db->get('sub_grupo');
        return $query->result_array();
    }

    public function grupos_entrenador($id_entrenador)
    {
        $query = $this->db->get_where('grupo', array('id_entrenador' => $id_entrenador)); 
            //print_r($query->result_array());
            return $query->result_array();            
    }
    public function id_alumno_horario($id_hora)
    {
         $query = $this->db->get_where('alumno_horario',array('id_horario' => $id_hora));                  
        return $query->result_array();
    }
    public function desasignar_entrenador_de_grupo($id_grupo)
    {
        $nuevo_grupo = array(
            'id_entrenador'=>0
        );
        $this->db->where('id_grupo',$id_grupo);
        $this->db->update('grupo',$nuevo_grupo);
        $afftected_rows = $this->db->affected_rows();
        if($afftected_rows==1)
            return "El Entrenador fue Des-asignado del grupo exitosamente";
        else
            return "Error al Des-asignar este Entreador del grupo ";
    }

    public function asignar_entrenador_de_grupo($id_grupo, $id_entrenador)
    {
        $nuevo_grupo = array(
            'id_entrenador'=>$id_entrenador
        );
        $this->db->where('id_grupo',$id_grupo);
        $this->db->update('grupo',$nuevo_grupo);
        $afftected_rows = $this->db->affected_rows();
        if($afftected_rows==1)
            return "El Entrenador fue Asignado Exitosamente";
        else
            return "Error al Asignar este Entreador";
    }

    public function crear_grupo($nombre_grupo)
    {
        $nuevo_grupo = array(
            'nombre_grupo' => $nombre_grupo);

        $resp = $this->db->insert('grupo', $nuevo_grupo);
        if($resp==1)
        {
            return "El registro fue existoso";
        }
        else
        {
            return "Revise el formato de los datos";
        }
    }

    public function asignar_horarios($id_grupo,$lista_horarios,$id_alumno)
    {
        foreach ($lista_horarios as $horario) {
            $nuevo_horario_grupo_alumno = array(
            'id_grupo' => $id_grupo, 
            'id_horario' => $horario,
            'id_alumno' => $id_alumno);

            $this->db->insert('grupo_horario_alumno', $nuevo_horario_grupo_alumno);
        }
    }

    public function ver_mis_grupos()
    {
        $id_entrenador=$this->session->userdata('id_usuario');
        $query = $this->db->get_where('horarios', array('id_entrenador' =>$id_entrenador)); 
        $horarios = $query->result_array();
        $grupos = array();
        foreach($horarios as $hora)
        {
            $grupo = $this->db->get_where('grupo',array('id_grupo' => $hora['id_grupo']));
            $aux=array();
            $g = $grupo->result_array();
            array_push($grupos,$g);
        }
        return $grupos;
    }

    public function alumnos_horario($id_horario)
    {
        $query = $this->db->get_where('alumno_horario',array('id_horario' =>$id_horario));
        return $query->result_array();
    }

    public function buscar_grupo_por_nombre($nombre_grupo)
    {
        $this->db->select('*');
        $this->db->like('nombre_grupo', $nombre_grupo);
        $query=$this->db->get('grupo');
        return $query->result_array();
    }

    public function asignar_alumno_a_grupo($id_grupo, $id_alumno)
    {
        $nuevo_grupo_alumno = array(
            'id_grupo' => $id_grupo, 
            'id_alumno' => $id_alumno);
        $resp = $this->db->insert('alumno_grupo', $nuevo_grupo_alumno);
        if($resp==1 )
            return "El Alumno Fue Registrado En El Grupo Exitosamente...!!";
        else
            return "Error Al Registar Alumno En Este Grupo...!!";
    }

    public function existe_alumno_en_alumno_grupo($id_grupo, $id_alumno)
    {
        $grupo_alumno = array(
            'id_grupo' => $id_grupo, 
            'id_alumno' => $id_alumno);
        $query = $this->db->get_where('alumno_grupo',$grupo_alumno);
        if($query->num_rows() >=1 )
            return 1;
        else
            return 0;
    }

    public function obtener_id_alumnos_por_id_grupo($id_subgrupo)
    {
        $this->db->select('*');
        $this->db->where('id_subgrupo', $id_subgrupo);
        $query=$this->db->get('alumno_grupo');
        return $query->result_array();

        //$afftected_rows = $this->db->affected_rows();
        //if($afftected_rows==1)
        //    return "El Entrenador fue Asignado Exitosamente";
        //else
        //   return "Error al Asignar este Entreador";
    }

    public function agregar_sub_grupo($sub_grupo)
    {
        $nuevo_sub_grupo = array(
            'id_grupo'=>$sub_grupo['id_grupo'],
            'nombre_subgrupo'=>$sub_grupo['nombre'],
            'id_entrenador'=>$sub_grupo['entrenadores'],
            'horario'=>$sub_grupo['desde'].' - '.$sub_grupo['hasta'],
            'descripcion'=>$sub_grupo['descripcion']
            );
        $resp = $this->db->insert('sub_grupo', $nuevo_sub_grupo);
    }

    public function obtener_nombre_grupo_por_id($id_grupo)
    {
         $this->db->select('*');
        $this->db->like('id_grupo', $id_grupo);
        $query=$this->db->get('grupo');
        return $query->result_array();
    }

    public function obtener_todos_los_sub_grupos_por_id_de_grupo($id_grupo)
    {
        $grupo = array(
            'id_grupo' => $id_grupo
            );
        $query = $this->db->get_where('sub_grupo',$grupo);
        $count = $query->num_rows();
        return $query->result_array();
    }
 
}
?>
