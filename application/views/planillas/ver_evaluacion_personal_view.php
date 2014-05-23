<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center> EVALUACION PERSONAL </center></h1>
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
            <label style="color: purple" class="control-label">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="comportamiento_primera_evaluacion" disabled><?php echo $evaluacion_personal['comportamiento']['primera_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="comportamiento_segunda_evaluacion" disabled><?php echo $evaluacion_personal['comportamiento']['segunda_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="comportamiento_tercera_evaluacion" disabled><?php echo $evaluacion_personal['comportamiento']['tercera_evaluacion'] ?></textarea>
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
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="disposicion_al_trabajo_primera_evaluacion" disabled><?php echo $evaluacion_personal['disposicion_al_trabajo']['primera_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="disposicion_al_trabajo_segunda_evaluacion" disabled><?php echo $evaluacion_personal['disposicion_al_trabajo']['segunda_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="disposicion_al_trabajo_tercera_evaluacion" disabled><?php echo $evaluacion_personal['disposicion_al_trabajo']['tercera_evaluacion'] ?></textarea>
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
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="actitud_en_cancha_primera_evaluacion" disabled><?php echo $evaluacion_personal['actitud_en_cancha']['primera_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="actitud_en_cancha_segunda_evaluacion" disabled><?php echo $evaluacion_personal['actitud_en_cancha']['segunda_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="actitud_en_cancha_tercera_evaluacion" disabled><?php echo $evaluacion_personal['actitud_en_cancha']['tercera_evaluacion'] ?></textarea>
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
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="actitud_en_preparacion_fisica_primera_evaluacion" disabled><?php echo $evaluacion_personal['actitud_en_preparacion_fisica']['primera_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="actitud_en_preparacion_fisica_segunda_evaluacion" disabled><?php echo $evaluacion_personal['actitud_en_preparacion_fisica']['segunda_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="actitud_en_preparacion_fisica_tercera_evaluacion" disabled><?php echo $evaluacion_personal['actitud_en_preparacion_fisica']['tercera_evaluacion'] ?></textarea>
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
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="asistencia_primera_evaluacion" disabled><?php echo $evaluacion_personal['asistencia']['primera_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="asistencia_segunda_evaluacion" disabled><?php echo $evaluacion_personal['asistencia']['segunda_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="asistencia_tercera_evaluacion" disabled><?php echo $evaluacion_personal['asistencia']['tercera_evaluacion'] ?></textarea>
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
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="puntualidad_primera_evaluacion" disabled><?php echo $evaluacion_personal['puntualidad']['primera_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="puntualidad_segunda_evaluacion" disabled><?php echo $evaluacion_personal['puntualidad']['segunda_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="puntualidad_tercera_evaluacion" disabled><?php echo $evaluacion_personal['puntualidad']['tercera_evaluacion'] ?></textarea>
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
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="rendimiento_en_torneos_primera_evaluacion" disabled><?php echo $evaluacion_personal['rendimiento_en_torneos']['primera_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:skyblue" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="rendimiento_en_torneos_segunda_evaluacion" disabled><?php echo $evaluacion_personal['rendimiento_en_torneos']['segunda_evaluacion'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:skyblue" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="rendimiento_en_torneos_tercera_evaluacion" disabled><?php echo $evaluacion_personal['rendimiento_en_torneos']['tercera_evaluacion'] ?></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>index.php">Atras</a>
            <!-- <button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>