
<div class="container" >
<div class="row"><br>
    <div class="col-md-2"></div>
  <div class="col-md-9">
      
<?php echo form_open('Notificacion_controller/eliminar_notificaciones'); ?>

    <table class="table table-bordered">
       
        <tbody>
<?php
 $count = 1;

if(count($notificaciones)==0)
{
    echo "<h1> NO TIENE NOTIFICACIONES PARA VER.</h1>";
}
foreach($notificaciones as $noti)
{
   
   switch ($count) {
    case 1:
       $tipo = "success";
        $count=$count+1;
        break;
    case 2:
        $tipo = "active";
            $count=$count+1;
        break;
    case 3:
         $tipo = "info";
          $count=1;
        break;
   }
                ?>
           
                <tr class="<?php echo $tipo;?>">
                    <td><?php 
    echo '<br><span class="label label-primary">FECHA</span>&nbsp&nbsp&nbsp'.$noti['fecha']; 
             echo '<span class="input-group-addon">
        <input id="id_notificacion" name="notificaciones[]" value="'.$noti['id_notificacion'].'" type="checkbox">
      </span>';            
             ?>          
                    </td>
                    <td><?php 
    echo '<span class="label label-primary">ASUNTO</span><br><textarea rows="2" cols="20" readonly>'.$noti['asunto']."</textarea>";?>
                    </td>
                    <td><?php 
    echo '<span class="label label-primary">MENSAJE</span><br><textarea rows="4" cols="40" readonly>'.$noti['cuerpo']."</textarea>"; ?>
                    </td>
                </tr>
  <?php                   
}?>
            
</table>
      <div class="row">
            <div class="col-md-5">            
           </div>
                <div class="col-md-5">
            <input class='btn btn-default'  type='button' value='VOLVER ATRAS' onclick='history.back()'> <?PHP
                    if(count($notificaciones)!=0)
{
    echo "<INPUT VALUE='ELIMINAR SELECCIONADOS' class='btn btn-success' TYPE='submit'>  ";
}?>
    
               
                </div>
    
<?php echo form_close() ?>
</div></div>
</div>

