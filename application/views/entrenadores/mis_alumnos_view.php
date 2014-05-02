<div class="container">
<br>
    <h1><p>Seleccione ALUMNO </p></h1>

<?php 

foreach($lista as $alumno )
{
?>
    <p>
       <a href="<?php echo base_url(); ?>index.php/Planilla_controller/registrar_evaluacion_personal/<?php echo $alumno['id_persona']?>">
       <?php echo $alumno['nombre_persona']." ".
    $alumno['apellido_persona']; ?>
       </a>
    </p>   
<?php
}
?>
   
    <br>
</div>
<br>
<br>