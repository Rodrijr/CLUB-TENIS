<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            #$data['main_content'] = 'sesiones/form_login_views';
            #$this->load->view('main_template', $data);
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
	}

    public function ver_grupo($id_grupo)
    {        
        $data['grupo'] = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        $data['listaEntrenadores'] = $this->entrenador_model->obtener_todos_los_entrenadores();
        $horarios = $this->horario_model->obtener_todos_los_horarios_de_grupo($id_grupo);
        $data['listaHorarios'] = $this->establecer_horario($horarios);
        $data['alumnos'] = $this->alumno_model->ver_lista_alumnos();
        $id_alumnos = $this->grupo_model->obtener_id_alumnos_por_id_grupo($id_grupo);
        $data['listaAlumnos'] = $this->obtener_alumnos($id_alumnos);
        $data['main_content'] = 'grupos/ver_grupo_view';
        $this->load->view('main_template', $data);
    }
    public function ver_lista_grupos()
    {
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
        //$this->eliminar_grupos_repetidos($grupos);
        $data['grupos'] = $grupos;
        $data['main_content'] = 'grupos/ver_lista_de_grupos_view';
        $this->load->view('main_template', $data);
    }

    public function buscar_grupos()
    {   
        $idEntrenador = "";     
        $nombreEntrenador = $this->input->post('nombreGrupo');
        $listaDeGrupos = $this->grupo_model->buscar_grupo_por_nombre($nombreEntrenador);
        $data['grupos'] = $listaDeGrupos;
        $data['main_content'] = 'grupos/ver_lista_de_grupos_view';
        $this->load->view('main_template', $data);
    }

    public function editar_grupo($id_grupo)
    { 
        $data = $this->establecer_datos_necesarios_para_editar_grupo($id_grupo,"",1,"",1);
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function actualizar_grupo()
    {
        $id_grupo = $this->input->post('id_grupo');
        $nombre_grupo = $this->input->post('nombreGrupo');
        $this->grupo_model->actualizar_grupo($id_grupo, $nombre_grupo);
        $this->ver_lista_grupos();
    }

    public function nuevo_grupo()
    {
        $data['main_content'] = 'grupos/crear_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function crear_grupo()
    {
        $nombre_grupo = $this->input->post('nombreGrupo');
        $this->grupo_model->crear_grupo($nombre_grupo);
        $this->ver_lista_grupos();
    }

    public function eliminar_grupo($id_grupo)
    {
        $this->grupo_model->elimiar_grupo($id_grupo);
        $this->ver_lista_grupos();
    }
    // -------------------- Metodos de Sub Grupo -------------------- //

    public function agregar_sub_grupo()
    {
        //$entrenadores=array();
        $id_grupo = $this->input->post('id_grupo');
        $desde = $this->input->post('desde_hora');
        $hasta = $this->input->post('hasta_hora');
        $entrenadores = $this->input->post('entrenadores');
        print_r($entrenadores);
        //echo 'count: '.count($entrenadores);
        if($desde >= $hasta) {$alerta_hora=1;} else {$alerta_hora=0;}
        if(count($entrenadores)<1) {$alerta_entrenador=1;} else { $alerta_entrenador=0;}
        //$alerta_hora = if($desde )
        //$alerta_entrenador = validar_hora($entrenadores);
        echo "alerta ora: ".$alerta_hora;
        echo "alerta entre: ".$alerta_entrenador;
        if($alerta_hora==1||$alerta_entrenador==1)
        {
            $this->nuevo_sub_grupo($id_grupo, $alerta_hora, $alerta_entrenador);
        }
        else
        {
            $id_entrenadores='';
            foreach ($entrenadores as $id_entrenador) {
                $id_entrenadores = $id_entrenadores.'-'.$id_entrenador;
            }
            $id_entrenadores=substr($id_entrenadores, 1);

            $sub_grupo = array(
                'id_grupo'=>$id_grupo,
                'nombre'=>$this->input->post('nombreSubGrupo'),
                'descripcion'=>$this->input->post('descripcionSubGrupo'),
                'desde'=>$desde,
                'hasta'=>$hasta,
                'entrenadores'=>$id_entrenadores
                );
            $this->grupo_model->agregar_sub_grupo($sub_grupo);
            $this->editar_grupo($id_grupo);
        }
    }

    // -------------------- Metodos de Horario -------------------- //

    public function agregar_horario()
    {
        $id_grupo = $this->input->post('id_grupo');
        $desde = $this->input->post('desde_hora');
        $hasta = $this->input->post('hasta_hora');
        $tipo = $this->input->post('tipo_entrenamiento');
        $entrenador = $this->input->post('entrenador');
        // ------------- Agregando Horario ------------- //
        $id_entrenador_grupo = $this->obtener_id_de_entrenador_por_nombre_apellido($entrenador);
        $alerta = $this->validar_horario($desde, $hasta, $id_grupo, $id_entrenador_grupo);
        if($alerta==0){
            $horario = $desde."-".$hasta;
            $mensaje = $this->horario_model->crear_horario($horario, $id_grupo, $id_entrenador_grupo, $tipo); }
        else {
            $mensaje = $this->establecer_mensaje_alerta($alerta); }
        $data = $this->establecer_datos_necesarios_para_editar_grupo($id_grupo, $mensaje, $alerta,"",3); 
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function agregar_alumno()
    {
        $id_grupo = $this->input->post('id_grupo');
        $alumno = $this->input->post('nombreAlumno');

        $id_alumno = $this->obtener_id_de_alumno_por_nombre_apellido($alumno);
        $alerta = $this->validar_alumno($id_alumno,$id_grupo);
        if($alerta==0)
            $mensaje = $this->grupo_model->asignar_alumno_a_grupo($id_grupo, $id_alumno);
        else
            $mensaje = "El Alumno ya se encuentra INSCRITO en este GRUPO..!!";

        $data = $this->establecer_datos_necesarios_para_editar_grupo($id_grupo, "",1,$mensaje,$alerta);
        $data['main_content'] = 'grupos/editar_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function agregar_alumnos_a_sub_grupo($id_subgrupo)
    {
        $data['id_subgrupo'] = $id_subgrupo;
        $data['listaAlumnos'] = $this->alumno_model->ver_lista_alumnos();
        $data['main_content'] = 'grupos/agregar_alumnos_view';
        $this->load->view('main_template', $data);
    }

    public function guardar_alumnos_en_sub_grupo()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id_subgrupo = $this->input->post('id_subgrupo');

        $alumnos = $this->input->post('alumnos');
        foreach ($alumnos as $id_alumno) {
            $alumno_sub_grupo = array();
            $alumno_sub_grupo['id_subgrupo']=$id_subgrupo;
            $alumno_sub_grupo['id_alumno']=$id_alumno;
            $this->grupo_model->asignar_alumno_a_sub_grupo($alumno_sub_grupo);
        }
        $this->ver_sub_grupo($id_subgrupo);
    }

    public function ver_lista_de_grupos_de_entrenador($id_entrenador)
    {
        $sub_grupos_de_entrenador = $this->grupo_model->obtener_grupos_de_entrenador();
    }

    public function ver_sub_grupo($id_subgrupo)
    {
        $data = $this->establecer_datos_necesarios_para_ver_editar_sub_grupo($id_subgrupo);
        $data['main_content'] = 'grupos/ver_sub_grupo_view';
        $this->load->view('main_template', $data);
    } 

    public function editar_sub_grupo($id_subgrupo)
    {
        $data = $this->establecer_datos_necesarios_para_ver_editar_sub_grupo($id_subgrupo);
        $data['main_content'] = 'grupos/editar_sub_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function nuevo_sub_grupo($id_grupo, $alerta_hora, $alerta_entrenador)
    {
        $data['id_grupo']= $id_grupo;
        $data['alerta_hora'] = $alerta_hora;
        $data['alerta_entrenador'] = $alerta_entrenador;
        $data['listaEntrenadores'] = $this->entrenador_model->obtener_todos_los_entrenadores();
        $data['main_content'] = 'grupos/agregar_sub_grupo_view';
        $this->load->view('main_template', $data);
    }

    public function agregar_entrenador()
    {
        $id_subgrupo = $this->input->post('id_subgrupo');
        $sub_grupo = $this->grupo_model->obtener_sub_grupo_por_id($id_subgrupo);
        
        $entrenadores_sub_grupo = explode("-",$sub_grupo['id_entrenador']); 
        $id_entrenadores_seleccionados = $this->input->post('entrenadores');
        foreach ($id_entrenadores_seleccionados as $id_entrenador) {
            $entrenadores_sub_grupo[] = $id_entrenador;
        }
        $entrenadores_sub_grupo = array_unique($entrenadores_sub_grupo);
        $id_entrenadores='';
        foreach ($entrenadores_sub_grupo as $id_entrenador) {
            $id_entrenadores = $id_entrenadores.'-'.$id_entrenador;
        }
        $id_entrenadores=substr($id_entrenadores, 1);

        $sub_grupo = array(
            'id_subgrupo' => $id_subgrupo,
            'entrenadores' => $id_entrenadores
            );
        $this->grupo_model->asignar_entrenador_a_sub_grupo($sub_grupo);
        $this->ver_sub_grupo($id_subgrupo);
    }
    // ----------------------------------- METODOS PRIVADOS ------------------------- //

    function validar_alumno($id_alumno, $id_grupo)
    {
        return $this->grupo_model->existe_alumno_en_alumno_grupo($id_grupo, $id_alumno);
    }

    function obtener_alumnos($id_alumnos)
    {
        $listaAlumnos = array();
        foreach ($id_alumnos as $alumno) {
            $itemAlumno = array();
            $get_alumno = $this->alumno_model->obtener_alumno_por_id($alumno['id_alumno']);
            $itemAlumno['nombre_alumno'] = $get_alumno['nombre_persona'];
            $itemAlumno['apellido_alumno'] = $get_alumno['apellido_persona'];
            $listaAlumnos[] = $itemAlumno;
        }
        return $listaAlumnos;
    }
    
    function establecer_horario($horarios)
    {
        $listaHorarios = array();
        foreach ($horarios as $horario ) {
            $itemHorario = array();
            $itemHorario['hora'] = $horario['hora'];
            $entrenador = $this->entrenador_model->obtener_entrenador_por_id($horario['id_entrenador']);
            $itemHorario['entrenador'] = $entrenador['nombre_persona']." ".$entrenador['apellido_persona'];
            $itemHorario['tipo'] = $horario['tipo'];
            $listaHorarios[] = $itemHorario;
        }
        return $listaHorarios;
    }

    function obtener_id_de_alumno_por_nombre_apellido($alumno)
    {
        $nombre_apellido = explode(" - ", $alumno);
        $nombre_alumno = $nombre_apellido[0];
        $apellido_alumno = $nombre_apellido[1];
        $id_alumno = $this->alumno_model->obtener_id_alumno_por_nombre_apellido($nombre_alumno, $apellido_alumno);
        return $id_alumno['id_persona'];
    }

    function validar_horario($desde, $hasta, $id_grupo, $id_entrenador_grupo)
    {
        $alerta = $this->horario_model->buscar_horario_por_todos_sus_datos($desde."-".$hasta, $id_grupo, $id_entrenador_grupo);
        if($desde>=$hasta)
            return 2;
        else
            return $alerta;
    }

    function establecer_mensaje_alerta($alerta)
    {
        if($alerta==2)
            return "El Horario DESDE no puede ser MAYOR que el Horario HASTA..!!";
        else
            return "El Horario ya se encuentra REGISTRADO..!!";
    }

    function obtener_id_de_entrenador_por_nombre_apellido($entrenador)
    {
        $nombre_apellido = explode(" - ", $entrenador);
        $nombre_entrenador = $nombre_apellido[0];
        $apellido_entrenador = $nombre_apellido[1];
        $entrenador_grupo = $this->entrenador_model->obtener_id_entrenador_por_nombre_apellido($nombre_entrenador, $apellido_entrenador);
        return $entrenador_grupo['id_persona'];
    }

    function establecer_datos_necesarios_para_editar_grupo($id_grupo, $mensaje_horario, $alerta_horario, $mensaje_alumno, $alerta_alumno)
    {
        // ------------- Datos de Grupo ---------- //
        $data['grupo'] = $this->grupo_model->obtener_grupo_por_id($id_grupo);
        // ------------- .Datos de Grupo ---------- //

        // ------------- Lista de todo los Sub-Grupos ---------- //
        $lista_sub_grupos = $this->grupo_model->obtener_todos_los_sub_grupos_por_id_de_grupo($id_grupo);

        $data['sub_grupos'] = $this->establecer_datos_necesarios_para_sub_grupo($lista_sub_grupos);
        // ------------- /. Lista de todo los Sub-Grupos ---------- //

        // ------------- Lista de todos los Entrenadores ---------- //
        $data['listaEntrenadores'] = $this->entrenador_model->obtener_todos_los_entrenadores();
        // ------------- /. Lista de todos los Entrenadore ---------- //

        // ------------- Lista de todos los Alumnos ---------- //
        #$data['listaAlumnos'] = $this->alumno_model->ver_lista_alumnos();
        // ------------- /. Lista de todos los Alumnos ---------- //
        return $data;
    }

    function establecer_datos_necesarios_para_sub_grupo($lista_sub_grupos)
    {
        $sub_grupos = array();
        foreach ($lista_sub_grupos as $sub_grupo) {
            $item_sub_grupo = array();
            $item_sub_grupo['id_subgrupo'] = $sub_grupo['id_subgrupo'];
            $item_sub_grupo['nombre_subgrupo'] = $sub_grupo['nombre_subgrupo'];
            $item_sub_grupo['entrenadores'] = $this->establecer_datos_entrenadores_para_sub_grupo($sub_grupo['id_entrenador']);
            $item_sub_grupo['horario'] = $sub_grupo['horario'];
            $item_sub_grupo['descripcion'] = $sub_grupo['descripcion'];
            $item_sub_grupo['alumnos'] = $this->establecer_datos_alumnos_para_sub_grupo($sub_grupo['id_subgrupo']);
            $sub_grupos[] = $item_sub_grupo;
        }
        return $sub_grupos;
    }

    function establecer_datos_necesarios_para_ver_editar_sub_grupo($id_subgrupo)
    {
        $sub_grupo = $this->grupo_model->obtener_sub_grupo_por_id($id_subgrupo);
        $horario = explode(" - ", $sub_grupo['horario']);
        $datos_sub_grupo = array(
            'id_grupo' => $sub_grupo['id_grupo'],
            'id_subgrupo' => $sub_grupo['id_subgrupo'],
            'nombre_subgrupo' => $sub_grupo['nombre_subgrupo'],
            'entrenadores' => $this->establecer_datos_entrenadores_para_sub_grupo($sub_grupo['id_entrenador']),
            'listaEntrenadores' => $this->establecer_datos_entrenadores_para_editar_sub_grupo($sub_grupo['id_entrenador']),
            'desde' => $horario[0],
            'hasta' => $horario[1],
            'horario' => $sub_grupo['horario'],
            'descripcion' => $sub_grupo['descripcion'],
            'alumnos' => $this->establecer_datos_alumnos_para_sub_grupo($id_subgrupo),
            'listaTodosEntrenadores' => $this->entrenador_model->obtener_todos_los_entrenadores()
            #'alerta_hora' => "";
        );
        return $datos_sub_grupo;
    }

    function establecer_datos_entrenadores_para_sub_grupo($id_entrenadores)
    {
        if($id_entrenadores[0]!="0")
        {
            $entrenadores = '';
            $lista_id_entrenadores = explode("-", $id_entrenadores);
            foreach ($lista_id_entrenadores as $id_entrenador) {
                $entrenador = $this->entrenador_model->obtener_entrenador_por_id($id_entrenador);
                $entrenadores = $entrenadores.' - '.$entrenador['nombre_persona'].' '.$entrenador['apellido_persona'];
            }
            return substr($entrenadores, 3);
        }
        else
        {
            return "";
        }
    }

    public function establecer_datos_entrenadores_para_editar_sub_grupo($id_entrenadores)
    {
        $listaEntrenadores = array();
        if($id_entrenadores[0]!="0")
        {
            $lista_id_entrenadores = explode("-", $id_entrenadores);
            foreach ($lista_id_entrenadores as $id_entrenador) {
                $listaEntrenadores[] = $this->entrenador_model->obtener_entrenador_por_id($id_entrenador);
            }
        }
        return $listaEntrenadores;
    }

    function establecer_datos_alumnos_para_sub_grupo($id_sub_grupo)
    {
        $alumnos_por_sub_grupo = $this->grupo_model->obtener_id_alumnos_por_id_grupo($id_sub_grupo);
        $lista_de_alumnos = array();
        foreach ($alumnos_por_sub_grupo as $alumno_grupo) {
            $itemAlumno = array();
            $alumno = $this->alumno_model->obtener_alumno_por_id($alumno_grupo['id_alumno']);
            $itemAlumno['nombre_persona'] = $alumno['nombre_persona'];
            $itemAlumno['apellido_persona'] = $alumno['apellido_persona'];
            $lista_de_alumnos[] = $itemAlumno;
        }

        return $lista_de_alumnos;
        
    }
}
?>