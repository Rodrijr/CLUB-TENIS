
<div class="container">
    <ul id="myTab" class="nav nav-pills">
        <?php
//print_r($grupos);
            foreach ($grupos as $grupo)
            {
                
echo '<li><a href="#'.$grupo['id_grupo'].'" data-toggle="tab">'.$grupo['nombre_grupo'].'</a></li>';
            }
        ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        <?php
          // print_r($grupos);
$cont = 0;
            foreach ($grupos as $grupo)
            {                 
        echo '<div class="tab-pane fade" id="'.$grupo['id_grupo'].'">' ;
    ?>
        <div class="container">
          <div class="col-lg-3">   
            <div class="row">
            <?php 
               
                $lista[$cont];
                //print_r($lista[$cont]);
                $aux = $lista[$cont];
                //print_r($aux);
                foreach($aux as $no)
                {print_r($no);
                    foreach($no as $n)
                    {
                        
                        foreach($n as $horario_al)
                        {///print_r($horario_al[0]);
                        //echo $horario_al[0]['id_alumno'];
                          echo "<br><br><br>";
                        }
                        
                    // echo $n['0'];
                    echo "<br><br><br>";
                    }
                
                }
                /*$nombre = $grupo['nombre_grupo'];
                 echo "<h1>".$nombre."</h1>";
               // $horarios= $aux[$nombre];
                foreach($horarios as $horario)
                {
                    echo "<h1>".$horario['horario']."</h1>";
                }*/
               
    /*            
Array 
( 
                    
            [0] => Array 
            (
                
                [Grupo 1] => Array 
                ( 
                [0] => Array( [id_horario] => 4 [horario] => 15:00 - 16:00 [id_grupo] => 2 )
                    
                [1] => Array ( [id_horario] => 5 [horario] => 16:00 - 17:00 [id_grupo] => 2 ) 
                    
                [2] => Array ( [id_horario] => 6 [horario] => 18:00 - 19:00 [id_grupo] => 2 ) 
                    
                ) 
            ) 
                    
            [1] => Array 
            ( [Grupo 2] => Array 
            ( [0] => Array 
             ( [id_horario] => 7 [horario] => 7:00 - 8:00 [id_grupo] => 3 ) [1] => Array ( [id_horario] => 8 [horario] => 8:00 - 9:00 [id_grupo] => 3 ) [2] => Array ( [id_horario] => 9 [horario] => 9:00 - 10:00 [id_grupo] => 3 ) [3] => Array ( [id_horario] => 10 [horario] => 10:00 - 11:00 [id_grupo] => 3 ) 
            ) 
            )
) */
                
                
                foreach($lista as $nose)
                {
                   // echo "NOSE". $nose[$grupo['nombre_grupo']];
                    //print_r($nose);
                 echo "<br><br>";
                   
//print_r($nose[0]);
                    /*foreach($nose as $algo)
                    {
                        echo "algo";
                        
                        foreach ($algo as $algo1)
                        {
                            print_r($algo1);echo "<br><br>";
                        }
                    }*/
                   
                }
            ?>    
            </div>
          </div>
        </div>
            <?php 
             echo "</div>";
                $cont=$cont+1;
            } ?>
              
    </div>
      </div>