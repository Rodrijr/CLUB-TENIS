
   

<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center>Establecimiento De Objetivos Del Jugador</center></h1>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-lg-offset-1">
    <div class="col-lg-10">
    <?php echo form_open('Planilla_controller/guardar_datos_planilla_objetivos_de_jugador');?>   
      <div class="form-group">
        <label for="inputEmail" class="control-label">Alumno: </label><br>
        <div class="col-lg-4">
          <input type="text" class="form-control" id="inputDefault" value="<?php echo $objetivos_de_jugador['alumno'];?>" disabled>
        </div>
        <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_alumno;?>">
      </div>

      <!-- _______________ Objeticos Tecnicos _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color:purple" >Objetios T&eacute;cnicos</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_obj_tecnicos"><?php echo $objetivos_de_jugador['obj_tecnicos']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_obj_tecnicos"><?php echo $objetivos_de_jugador['obj_tecnicos']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_obj_tecnicos"><?php echo $objetivos_de_jugador['obj_tecnicos']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Objetivos tácticos _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color: green">Objetios T&aacute;ctios</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_obj_tacticos" ><?php echo $objetivos_de_jugador['obj_tacticos']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_obj_tacticos" ><?php echo $objetivos_de_jugador['obj_tacticos']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_obj_tacticos" ><?php echo $objetivos_de_jugador['obj_tacticos']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Objetivos psicológicos _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:blue">Objetios Psicol&oacute;gicos</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_obj_psicologicos" ><?php echo $objetivos_de_jugador['obj_psicologicos']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_obj_psicologicos" ><?php echo $objetivos_de_jugador['obj_psicologicos']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_obj_psicologicos" ><?php echo $objetivos_de_jugador['obj_psicologicos']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Objetivos de competición _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:brown">Objetios De Competici&oacute;n</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:brown" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_obj_de_competicion" ><?php echo $objetivos_de_jugador['obj_de_competicion']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:brown" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_obj_de_competicion" ><?php echo $objetivos_de_jugador['obj_de_competicion']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:brown" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_obj_de_competicion" ><?php echo $objetivos_de_jugador['obj_de_competicion']['tercera'] ?></textarea>
          </div>
        </div>
      </div>
       <!-- _______________ Observaciones _______________ -->
      <div class="col-lg-12">
        <br>
        <legend>Observaciones</legend>
        <div class="col-lg-10 col-lg-offset-2">
          <div class="col-lg-10">
            <label class="control-label" for="inputDefault">Descripci&oacute;n: </label>
          </div>
          <div class="col-lg-10">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Observaciones" name="observaciones"><?php echo $objetivos_de_jugador['observaciones']?></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_lista_de_alumnos">Atras</a>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>