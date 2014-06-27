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
        $query= $this->db->get_where('persona',array('ci_persona'=> $id_persona));
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
    public function modificar_mi_perfil($persona)
    {
        $this->db->where('ci_persona',$persona['ci_persona']);
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
    public function obtener_usuario($id)
    {
        $query = $this->db->get_where('usuario', array('ci_persona' => $id)); 
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
    public function persona_por_ci1($ci)
    {
         $query = $this->db->get_where('persona', array('ci_persona' => $ci)); 
         return $query->result_array();
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
        print_r($query);
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
}
/*

E1262;GIPPONI BOCANGEL RICARDO ANDRES
E1293;GONGORA MEJIA DIEGO FABRICIO
E324;GUERRA VILLARROEL FERNANDA
E1186;GUERRA VILLARROEL JAVIER
E1244;GUTIERREZ GARCIA JUAN MARCELO
E1121;GUZMAN CASTRO ANA CAMILA
E968;GUZMAN CASTRO ANDRES GABRIEL
E1026;HAWLEY VRSALOVIC DEAN
E1316;HENNINGSSON REYES KASSANDRA KERSTIN
E1318;HENNINGSSON REYES KRISTOF KARL - OLOF
E1174;HINOJOSA MARTINEZ ALEJANDRO PABLO
E973;HOCHSTATTER PALACIOS JUAN BERNARDO
E341;HUDSON LOZANO MICHAEL ANDRES
E1085;IBA�EZ BARRIGA JOHNN NICOLAS
E1302;IRIARTE LACAZE DIANA VALERIA
E1142;IRIARTE LACAZE DIEGO ANDRES
E1304;JALDIN BALDELOMAR CAROLINA
E1304;JALDIN BALDELOMAR CAROLINA
E755;JARA UNZUETA RODRIGO
E755;JARA UNZUETA RODRIGO
E1222;JIMENEZ ARCE ADRIANA
E1221;JIMENEZ ARCE IGNACIO
E818;JORDAN AVILA STEPHANIE LUCIANA
E1319;LA FUENTE MONTA�O IGNACIO
E1149;LICHTENFELD RAMIREZ LUCIANO
E1295;LLANOS ARAMAYO LUCIANA
E678;LOAYZA CABALLERO VALENTINA
E1268;LOAYZA CARVAJAL RENATA LORENA
E1082;LOPEZ MERCADO SABRINA
E1081;LOPEZ MERCADO VALENTINA
E727;LOPEZ RICALDI ARKAITZ
E855;LOPEZ RICALDI HAIZEA
E515;LOPEZ RODRIGUEZ JUAN SEBASTIAN
E795;LOPEZ RODRIGUEZ MATEO SEBASTIAN
E947;LORA SORIA GALVARRO SANTIAGO
E125;MALDONADO MU�OZ ADRIAN GABRIEL
E1108;MALDONADO NAVARRO SEBASTIAN
E126;MALDONADO ORELLANA FERNANDA
E1249;MANCILLA SORIA GALVARRO MAURICIO INTI
E1254;MARINOVITCH ZEGARRA CAMILLE SOFIA
E1253;MARINOVITCH ZEGARRA NATHALIE GERALDINE
E1299;MARTINIS ZAMORANO BENJAMIN
E716;MARTINIS ZAMORANO RENATO
E1213;MEDINA PONCE ANDRES
E1069;MENDIETA CAMPOS THIAGO
E1257;MERCADO REVOLLO VERONICA PAOLA
E136;MOLINA URIA LUIS
E138;MONTALVO PEREZ LAURA MARIANA
E139;MONTALVO PEREZ RAQUEL ADRIANA
E829;MORALES REYES KARINA ANDREA
E830;MORALES REYES MARIA ISABEL
E140;MOSCOSO QUIROGA ALVARO GASTON
E1287;MOSTAJO GREER LUCAS
E981;NEVEU CORNEJO CRISTOBAL IGNACIO
E805;NOGALES SEJAS DAVID OSVALDO
E1177;NOGALES SEJAS VALENTINA
E1276;NUÑEZ CESPEDES BERENICE INDRA
E1292;NUÑEZ CESPEDES MAURICIO ROBERTO
E1267;OLGUIN OVANDO SAMMY
E1153;OLIVA MELGAR CAMILA
E945;OLIVERA BARRIOS MIGUEL
E163;OPORTO VIDAL ANDRES
E1243;ORELLANA CASTILLO ALEJANDRO SANTIAGO
E1242;ORELLANA CASTILLO JORGE ANDRES
E1259;ORELLANA ORELLANA WALTER SAMUEL
E424;OSORIO CAZZOL NICOLE
E1204;PACHECO GORDILLO ADRIAN
E1273;PANIAGUA TERZO LUIS EDUARDO
E1171;PAZ CERDA FRANCO
E690;PAZ SOLDAN LEYTON CONSTANZA
E803;PAZ SOLDAN LEYTON MARTINA
E1308;PELAEZ ARAMAYO GUILLERMO
E1047;PEÑA CHAVEZ NICOLE SARA
E182;PEREZ JORDAN VALERIA
E184;PEREZ SUAREZ ARIANA SOL
E1224;PERROGON GUILLEN VALENTINA BELEN
E1225;PIEROLA LARA DIEGO EDUARDO
E185;PIEROLA ROMERO ALEJANDRO
E186;PIEROLA ROMERO NICOLAS
E187;PINTO VILLARROEL BERNARDO JESUS
E188;PINTO VILLARROEL JORGE ALEJANDRO
E313;PINTO VILLARROEL NICOLAS
E189;PORRO BECCAR MATIAS
E190;PORRO BECCAR TOMAS
E697;QUEVEDO AGRAMONT FLAVIA
E1200;QUINTANILLA CESPEDES ALEJANDRA
E950;QUIROGA RICALDI LUCIA BELEN
E1310;QUIROGA RICALDI THAIS LILLY
E1280;QUIROZ BLOCH MARIO ALEJANDRO (ACCION)
E1172;QUIROZ ROSSELL CARLOS FABRICIO
E1272;RAMALLO CAMPOS ABBY   MICHELLE
E807;RAMOS DAVILA CAMILA
E952;REJAS ZURITA LAURA ANDREA
E951;REJAS ZURITA MATEO ALEJANDRO
E912;REQUENA LEIGUE ERNESTO
E913;REQUENA LEIGUE MARIA ZARELA
E1109;RESNIKOWSKI CONDARCO ADRIANA
E196;REVUELTA TABERA MATEO
E1313;RIVERA SORIA GALVARRO AARON LANDO
E1134;RIVERO PALACIO CAMILO
E1283;ROCHA VACAFLORES MARCO ANTONIO
E1300;ROCHA VACAFLORES MAURICIO ALEJANDRO
E720;RODRIGUEZ ANDRADE SEBASTIAN
E212;RODRIGUEZ ARANIBAR MARIA ALEJANDRA
E213;RODRIGUEZ ARANIBAR MARIA CAMILA
E683;RODRIGUEZ CASTILLO ORLANDO RAFAEL
E980;RODRIGUEZ FUENTES ADRIANA
E976;RODRIGUEZ PALACIOS JORGE ANDRES
E1303;ROJAS AGUIRRE SOFIA
E1271;ROJAS NERY IGNACIO EDUARDDO
E490;ROJAS NERY NATALIA
E1169;ROJAS VERDUGUEZ MARCO ESTEBAN
E1322;ROMANO ANGULO MONICA CAMILA
E1049;SABAG ALISS SHADIA
E1239;SAGARNAGA TABORGA VERONICA
E579;SAGUEZ RODRIGUEZ JUAN PABLO
E802;SALABERRY MANZONI RAFFAELLA
E1275;SALINAS OSINAGA AUGUSTO LEONEL
E1279;SALINAS OSINAGA DHANA ESTELI
E520;SALINAS SORIANO ALEJANDRO
E1233;SAN MIGUEL SORIA MAURICIO
E1234;SAN MIGUEL SORIA VALERIA
E940;SANCHEZ VELASCO JONATHAN ADRIAN
E1307;SANDI ESPINOZA SARA
E858;SANDY LAZCANO JUAN DANIEL
E889;SANDY LAZCANO SOFIA BELEN
E1291;SAUNERO BELTRAN MARIANA
E1290;SAUNERO BELTRAN MATIAS
E1075;SERRANO ALCOCER DANIELA
E691;SILES GUILLEN CAMILO NICOLAS
E1245;SILES REYES ORTIZ SEBASTIAN GUSTAVO
E234;SILVENTE VILLARROEL ESTEFANY
E1160;SILVENTE VILLARROEL HELEN
E1089;SOLIZ TERRAZAS MACIEL
E237;SORIA GONZALES NICOLE
E715;STAMBUK GOMEZ LJUBI LUCAS
E1208;SUAREZ VARGAS NARA
E1297;SUAREZ VARGAS TAIS
E1163;TAPIA ZULETA JORGE ANDRES
E1162;TAPIA ZULETA MARIA FERNANDA
E1164;TAPIA ZULETA MIGUEL IGNACIO
E986;TARDIO VIRREIRA ANDRES
E987;TARDIO VIRREIRA GABRIEL
E1154;TARDIO VIRREIRA MATIAS
E1087;TEJERINA TREWHELLA FABIANA ALEXANDRA
E1139;TEJERINA TREWHELLA FREDDY SERGIO
E252;TERAN MUÑOZ MARCO ANTONIO
E1296;TERAN RODRIGUEZ ADRIANA PATRICIA
E942;TORREZ AITKEN CAYARA
E910;TORREZ AITKEN IAN
E908;TORREZ AITKEN JUAN MATEO
E909;TORREZ AITKEN LUCAS
E1012;TRIANTAFILO CALLISPERIS JENNY
E1115;UREÑA AYLLON GENESIS ZARELLA
E1315;UZQUIANO ABULARACH JOSE ABRAHAM
E1282;VACA ANAYA ARIANA
E1320;VALDERRAMA OYOLA ALEJANDRO
E941;VALDIVIA SANCHEZ BERZAIN RAFAEL BERNARDO
E1045;VALLEJO BARRIENTOS SARA
E265;VARGAS CLAVIJO SEBASTIAN
E1096;VARGAS ESCOBAR SAMUEL FERNANDO
E879;VARGAS GUEVARA NICOLAS ALBERTO
E1236;VARGAS SILES FERNANDO TITO
E614;VASQUEZ VIDAL JUAN LEONARDO
E1250;VEIZAGA BARRIENTOS RICHARD ROGER
E868;VENEGAS GUTIERREZ DANIEL MATEUS
E869;VENEGAS GUTIERREZ JHIRE RICHARD
E304;VILLAFAÑE CALVIMONTE AMANDA
E1266;VILLAFAÑE LAREDO ANDRES
E1157;VILLAFAÑE LAREDO DIEGO
E378;VILLAFAÑE LAREDO SANTIAGO
E1314;VILLARROEL CARVAJAL DAVID  NICOLAS
E1238;VILLELA ZABUSKY ERBA LUIZA
E329;VRSALOVIC GIMENEZ MASHA
E917;ZEBALLOS PEÑARRIETA ANDREA
E332;ZEGADA OSUNA MARIANA
E1161;ZELADA ARCE IGNACIO
A012;ZELAYA GUZMAN GABRIELA DE
E1281;ZENTENO RICALDES ANDRES OSCAR

*/
?>