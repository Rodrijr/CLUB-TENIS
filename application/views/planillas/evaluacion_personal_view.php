
<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center> EVALUACIÓN PERSONAL </center></h1>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-lg-offset-1">
    <div class="col-lg-10">
    <?php echo form_open('Planilla_controller/guardar_datos_planilla_evaluacion_personal');?>   
      <div class="form-group">
        <label for="inputEmail" class="control-label">Alumno: </label><br>
        <div class="col-lg-4">
          <input type="text" class="form-control" id="inputDefault" value="<?php echo $evaluacion_personal['alumno'];?>" disabled>
        </div>
        <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_alumno;?>">
      </div>

      <!-- _______________ COMPORTAMIENTO _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color: purple" >COMPORTAMIENTO(Disciplina) </legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: purple" class="control-label">Primera Evaluaci&oacute;n:</label>
            <?php $comportamiento_primera_evaluacion = explode("+", $evaluacion_personal['comportamiento']['primera_evaluacion']); ?>
            <label class="control-label"><?php echo $comportamiento_primera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="comportamiento_primera_evaluacion_fecha" value="<?php echo $comportamiento_primera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            <select class="form-control" id="select" name="comportamiento_primera_evaluacion">
              <option value="" <?php if($comportamiento_primera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($comportamiento_primera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($comportamiento_primera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($comportamiento_primera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($comportamiento_primera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
            <?php $comportamiento_segunda_evaluacion = explode("+", $evaluacion_personal['comportamiento']['segunda_evaluacion']); ?>
            <label class="control-label"> <?php echo $comportamiento_segunda_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="comportamiento_segunda_evaluacion_fecha" value="<?php echo $comportamiento_segunda_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            <select class="form-control" id="select" name="comportamiento_segunda_evaluacion">
              <option value="" <?php if($comportamiento_segunda_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($comportamiento_segunda_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($comportamiento_segunda_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($comportamiento_segunda_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($evaluacion_personal['comportamiento']['primera_evaluacion']=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
            <?php $comportamiento_tercera_evaluacion = explode("+", $evaluacion_personal['comportamiento']['tercera_evaluacion']); ?>
            <label class="control-label"> <?php echo $comportamiento_tercera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="comportamiento_tercera_evaluacion_fecha" value="<?php echo $comportamiento_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            <select class="form-control" id="select" name="comportamiento_tercera_evaluacion">
              <option value="" <?php if($comportamiento_tercera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($comportamiento_tercera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($comportamiento_tercera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($comportamiento_tercera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($evaluacion_personal['comportamiento']['primera_evaluacion']=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>
      </div>

      <!-- _______________ DISPOSICIÓN AL TRABAJO  _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color: green">DISPOSICIÓN AL TRABAJO(Entrega) </legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
            <?php $disposicion_al_trabajo_primera_evaluacion = explode("+", $evaluacion_personal['disposicion_al_trabajo']['primera_evaluacion']); ?>
            <label class="control-label"><?php echo $disposicion_al_trabajo_primera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="comportamiento_primera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_primera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="disposicion_al_trabajo_primera_evaluacion">
              <option value="" <?php if($disposicion_al_trabajo_primera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($disposicion_al_trabajo_primera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($disposicion_al_trabajo_primera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($disposicion_al_trabajo_primera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($disposicion_al_trabajo_primera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
            <?php $disposicion_al_trabajo_segunda_evaluacion = explode("+", $evaluacion_personal['disposicion_al_trabajo']['segunda_evaluacion']); ?>
            <label class="control-label"><?php echo $disposicion_al_trabajo_segunda_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="disposicion_al_trabajo_segunda_evaluacion_fecha" value="<?php echo $comportamiento_primera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="disposicion_al_trabajo_segunda_evaluacion">
              <option value="" <?php if($disposicion_al_trabajo_segunda_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($disposicion_al_trabajo_segunda_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($disposicion_al_trabajo_segunda_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($disposicion_al_trabajo_segunda_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($disposicion_al_trabajo_segunda_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
            <?php $disposicion_al_trabajo_tercera_evaluacion = explode("+", $evaluacion_personal['disposicion_al_trabajo']['tercera_evaluacion']); ?>
            <label class="control-label"><?php echo $disposicion_al_trabajo_tercera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="comportamiento_primera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="disposicion_al_trabajo_tercera_evaluacion">
              <option value="" <?php if($disposicion_al_trabajo_tercera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($disposicion_al_trabajo_tercera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($disposicion_al_trabajo_tercera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($disposicion_al_trabajo_tercera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($disposicion_al_trabajo_tercera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>
      </div>

      <!-- _______________ ACTITUD  EN CANCHA _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:red">ACTITUD EN CANCHA:</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
            <?php $actitud_en_cancha_primera_evaluacion = explode("+", $evaluacion_personal['actitud_en_cancha']['primera_evaluacion']); ?>
            <label class="control-label"><?php echo $actitud_en_cancha_primera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="actitud_en_cancha_primera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="actitud_en_cancha_primera_evaluacion">
              <option value="" <?php if($actitud_en_cancha_primera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($actitud_en_cancha_primera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($actitud_en_cancha_primera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($actitud_en_cancha_primera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($actitud_en_cancha_primera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
            <?php $actitud_en_cancha_segunda_evaluacion = explode("+", $evaluacion_personal['actitud_en_cancha']['segunda_evaluacion']); ?>
            <label class="control-label"><?php echo $actitud_en_cancha_segunda_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="actitud_en_cancha_segunda_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="actitud_en_cancha_segunda_evaluacion">
              <option value="" <?php if($actitud_en_cancha_segunda_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($actitud_en_cancha_segunda_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($actitud_en_cancha_segunda_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($actitud_en_cancha_segunda_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($actitud_en_cancha_segunda_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
            <?php $actitud_en_cancha_tercera_evaluacion = explode("+", $evaluacion_personal['actitud_en_cancha']['tercera_evaluacion']); ?>
            <label class="control-label"><?php echo $actitud_en_cancha_tercera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="actitud_en_cancha_tercera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="actitud_en_cancha_tercera_evaluacion">
              <option value="" <?php if($actitud_en_cancha_tercera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($actitud_en_cancha_tercera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($actitud_en_cancha_tercera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($actitud_en_cancha_tercera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($actitud_en_cancha_tercera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>
      </div>

      <!-- _______________ ACTITUD EN PREPARACIÓN FISICA _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:blue">ACTITUD EN PREPARACIÓN FISICA</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
            <?php $actitud_en_preparacion_fisica_primera_evaluacion = explode("+", $evaluacion_personal['actitud_en_preparacion_fisica']['primera_evaluacion']); ?>
            <label class="control-label"><?php echo $actitud_en_preparacion_fisica_primera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="actitud_en_preparacion_fisica_primera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="actitud_en_preparacion_fisica_primera_evaluacion">
              <option value="" <?php if($actitud_en_preparacion_fisica_primera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($actitud_en_preparacion_fisica_primera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($actitud_en_preparacion_fisica_primera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($actitud_en_preparacion_fisica_primera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($actitud_en_preparacion_fisica_primera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
            <?php $actitud_en_preparacion_fisica_segunda_evaluacion = explode("+", $evaluacion_personal['actitud_en_preparacion_fisica']['segunda_evaluacion']); ?>
            <label class="control-label"><?php echo $actitud_en_preparacion_fisica_segunda_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="actitud_en_cancha_segunda_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="actitud_en_preparacion_fisica_segunda_evaluacion">
              <option value="" <?php if($actitud_en_preparacion_fisica_segunda_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($actitud_en_preparacion_fisica_segunda_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($actitud_en_preparacion_fisica_segunda_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($actitud_en_preparacion_fisica_segunda_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($actitud_en_preparacion_fisica_segunda_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
            <?php $actitud_en_preparacion_fisica_tercera_evaluacion = explode("+", $evaluacion_personal['actitud_en_preparacion_fisica']['tercera_evaluacion']); ?>
            <label class="control-label"><?php echo $actitud_en_preparacion_fisica_tercera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="actitud_en_preparacion_fisica_tercera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="actitud_en_preparacion_fisica_tercera_evaluacion">
              <option value="" <?php if($actitud_en_preparacion_fisica_tercera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($actitud_en_preparacion_fisica_tercera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($actitud_en_preparacion_fisica_tercera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($actitud_en_preparacion_fisica_tercera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($actitud_en_preparacion_fisica_tercera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>'
          </div>
        </div>
      </div>

      <!-- _______________ ASISTENCIA _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:orange">ASISTENCIA </legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
            <?php $asistencia_primera_evaluacion = explode("+", $evaluacion_personal['asistencia']['primera_evaluacion'] ); ?>
            <label class="control-label"><?php echo $asistencia_primera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="asistencia_primera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="asistencia_primera_evaluacion">
              <option value="" <?php if($asistencia_primera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($asistencia_primera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($asistencia_primera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($asistencia_primera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($asistencia_primera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
            <?php $asistencia_segunda_evaluacion = explode("+", $evaluacion_personal['asistencia']['segunda_evaluacion']); ?>
            <label class="control-label"><?php echo $asistencia_segunda_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="asistencia_segunda_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="asistencia_segunda_evaluacion">
              <option value="" <?php if($asistencia_segunda_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($asistencia_segunda_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($asistencia_segunda_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($asistencia_segunda_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($asistencia_segunda_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
            <?php $asistencia_tercera_evaluacion = explode("+", $evaluacion_personal['asistencia']['tercera_evaluacion']); ?>
            <label class="control-label"><?php echo $asistencia_tercera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="asistencia_tercera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="asistencia_tercera_evaluacion">
              <option value="" <?php if($asistencia_tercera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($asistencia_tercera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($asistencia_tercera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($asistencia_tercera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($asistencia_tercera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>
      </div>

      <!-- _______________ PUNTUALIDAD _______________ -->
      <div class="col-lg-12">
        <br>
        <legend>PUNTUALIDAD</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
            <?php $puntualidad_primera_evaluacion = explode("+", $evaluacion_personal['puntualidad']['primera_evaluacion']); ?>
            <label class="control-label"><?php echo $puntualidad_primera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="puntualidad_primera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="puntualidad_primera_evaluacion">
              <option value="" <?php if($puntualidad_primera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($puntualidad_primera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($puntualidad_primera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($puntualidad_primera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($puntualidad_primera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
            <?php $puntualidad_segunda_evaluacion = explode("+", $evaluacion_personal['puntualidad']['segunda_evaluacion']); ?>
            <label class="control-label"><?php echo $puntualidad_segunda_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="puntualidad_segunda_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
             <select class="form-control" id="select" name="puntualidad_segunda_evaluacion">
              <option value="" <?php if($puntualidad_segunda_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($puntualidad_segunda_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($puntualidad_segunda_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($puntualidad_segunda_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($puntualidad_segunda_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
            <?php $puntualidad_tercera_evaluacion = explode("+", $evaluacion_personal['puntualidad']['tercera_evaluacion']); ?>
            <label class="control-label"><?php echo $puntualidad_tercera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="puntualidad_tercera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            
            <select class="form-control" id="select" name="puntualidad_tercera_evaluacion">
              <option value="" <?php if($puntualidad_tercera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($puntualidad_tercera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($puntualidad_tercera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($puntualidad_tercera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($puntualidad_tercera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>
      </div>

      <!-- _______________ RENDIMIENTO  EN TORNEOS _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:skyblue">RENDIMIENTO EN TORNEOS:</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:skyblue" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
            <?php $rendimiento_en_torneos_primera_evaluacion = explode("+", $evaluacion_personal['rendimiento_en_torneos']['primera_evaluacion']); ?>
            <label class="control-label"><?php echo $rendimiento_en_torneos_primera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="rendimiento_en_torneos_primera_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            <select class="form-control" id="select" name="rendimiento_en_torneos_primera_evaluacion">
              <option value="" <?php if($rendimiento_en_torneos_primera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($rendimiento_en_torneos_primera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($rendimiento_en_torneos_primera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($rendimiento_en_torneos_primera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($rendimiento_en_torneos_primera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:skyblue" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
            <?php $rendimiento_en_torneos_segunda_evaluacion = explode("+", $evaluacion_personal['rendimiento_en_torneos']['segunda_evaluacion']); ?>
            <label class="control-label"><?php echo $rendimiento_en_torneos_segunda_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="form-control" name="rendimiento_en_torneos_segunda_evaluacion_fecha" value="<?php echo $disposicion_al_trabajo_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            <select class="form-control" id="select" name="rendimiento_en_torneos_segunda_evaluacion">
              <option value="" <?php if($rendimiento_en_torneos_segunda_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($rendimiento_en_torneos_segunda_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($rendimiento_en_torneos_segunda_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($rendimiento_en_torneos_segunda_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($rendimiento_en_torneos_segunda_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:skyblue" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
            <?php $rendimiento_en_torneos_tercera_evaluacion = explode("+", $evaluacion_personal['rendimiento_en_torneos']['tercera_evaluacion']); ?>
            <label class="control-label"><?php echo $rendimiento_en_torneos_tercera_evaluacion[1]; ?></label>
            <input type="HIDDEN" class="rendimiento_en_torneos_tercera_evaluacion_fecha" value="<?php echo $rendimiento_en_torneos_tercera_evaluacion[1];?>">
          </div>
          <div class="col-lg-12">
            <select class="form-control" id="select" name="rendimiento_en_torneos_tercera_evaluacion">
              <option value="" <?php if($rendimiento_en_torneos_tercera_evaluacion[0]==""){echo "selected";}?> >No Registrado</option>
              <option value="0" <?php if($rendimiento_en_torneos_tercera_evaluacion[0]=="0"){echo "selected";}?> >Malo</option>
              <option value="1" <?php if($rendimiento_en_torneos_tercera_evaluacion[0]=="1"){echo "selected";}?> >Regular</option>
              <option value="2" <?php if($rendimiento_en_torneos_tercera_evaluacion[0]=="2"){echo "selected";}?> >Bueno</option>
              <option value="3" <?php if($rendimiento_en_torneos_tercera_evaluacion[0]=="3"){echo "selected";}?> >Muy Bueno</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_lista_de_alumnos">Atrás</a>
            <!--<a type="button" class="btn btn-warning" href="<?php #echo base_url(); ?>index.php/Planilla_controller/ver_lista_de_alumnos">Cancel</a> -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>