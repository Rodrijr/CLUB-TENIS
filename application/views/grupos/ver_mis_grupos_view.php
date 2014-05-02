
<div class="container">
    <ul id="myTab" class="nav nav-pills">
        <?php
//print_r($grupos);
            foreach ($grupos as $grupo)
            { foreach ($grupo as $grupo1)
            {
                
echo '<li><a href="#'.$grupo1['id_grupo'].'" data-toggle="tab">'.$grupo1['nombre_grupo'].'</a></li>';
            }
            }
        ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        <?php
$cont = 0;
    foreach ($grupos as $grupo)
    {            
        foreach ($grupo as $grupo1)
        {          
              
        echo '<div class="tab-pane fade" id="'.$grupo1['id_grupo'].'">' ;
        ?>
        <div class="container">
          <div class="col-lg-3">   
            <div class="row">
                <h1><?php echo $grupo1['nombre_grupo'] ?></h1>
                       <?php 
                    
                 }     
            ?>    
            </div>
          </div>
        </div>
            <?php 
             echo "</div>";
               
            } ?>
              
    </div>
      </div>