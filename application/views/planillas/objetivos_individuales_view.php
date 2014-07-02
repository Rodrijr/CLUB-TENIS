
   

<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center>Objetivos Individuales</center></h1>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-lg-offset-1">
    <div class="col-lg-10">
    <?php echo form_open('planilla_controller/guardar_datos_objetivos_individuales');?>   
      <div class="form-group">
        <label for="inputEmail" class="control-label">Alumno: </label><br>
        <div class="col-lg-4">
          <input type="text" class="form-control" id="inputDefault" value="<?php echo $objetivos_individuales['alumno'];?>" disabled>
        </div>
        <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_alumno;?>">
      </div>

      <!-- _______________ Derecha _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color: purple" >DERECHA</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_derecha"><?php echo $objetivos_individuales['derecha']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_derecha"><?php echo $objetivos_individuales['derecha']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_derecha"><?php echo $objetivos_individuales['derecha']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Reves _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color: green">REVES</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_reves" ><?php echo $objetivos_individuales['reves']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_reves" ><?php echo $objetivos_individuales['reves']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_reves" ><?php echo $objetivos_individuales['reves']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Volea De Drive _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:blue">VOLEA DE DRIVE</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_volea_de_drive" ><?php echo $objetivos_individuales['volea_de_drive']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_volea_de_drive" ><?php echo $objetivos_individuales['volea_de_drive']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_volea_de_drive" ><?php echo $objetivos_individuales['volea_de_drive']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ VOLEA DE REVES _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:red">VOLEA DE REVES</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_volea_de_reves" ><?php echo $objetivos_individuales['volea_de_reves']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_volea_de_reves" ><?php echo $objetivos_individuales['volea_de_reves']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_volea_de_reves" ><?php echo $objetivos_individuales['volea_de_reves']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ SAQUE + SMASH _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:orange">SAQUE + SMASH</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_saque_mas_smash" ><?php echo $objetivos_individuales['saque_mas_smash']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_saque_mas_smash" ><?php echo $objetivos_individuales['saque_mas_smash']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_saque_mas_smash" ><?php echo $objetivos_individuales['saque_mas_smash']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ DEVOLUCION _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:purple">DEVOLUCION</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:purple" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_devolucion" ><?php echo $objetivos_individuales['devolucion']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:purple" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_devolucion" ><?php echo $objetivos_individuales['devolucion']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:purple" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_devolucion" ><?php echo $objetivos_individuales['devolucion']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ SLICE _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:green">SLICE</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:green" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_slice" ><?php echo $objetivos_individuales['slice']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:green" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_slice" ><?php echo $objetivos_individuales['slice']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:green" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_slice" ><?php echo $objetivos_individuales['slice']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ CONTROL DE DIRECCION _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:blue">CONTROL DE DIRECCION</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_control_de_direccion" ><?php echo $objetivos_individuales['control_de_direccion']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_control_de_direccion" ><?php echo $objetivos_individuales['control_de_direccion']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_control_de_direccion" ><?php echo $objetivos_individuales['control_de_direccion']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ CONTROL DE PROFUNDIDAD _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:brown">CONTROL DE PROFUNDIDAD</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:brown" class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_control_de_profundidad" ><?php echo $objetivos_individuales['control_de_profundidad']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:brown" class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_control_de_profundidad" ><?php echo $objetivos_individuales['control_de_profundidad']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:brown" class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_control_de_profundidad" ><?php echo $objetivos_individuales['control_de_profundidad']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ MECANICA _______________ -->
      <div class="col-lg-12">
        <br>
        <legend >MECANICA</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Primera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="primera_evaluacion_mecanica" ><?php echo $objetivos_individuales['mecanica']['primera'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Segunda Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="segunda_evaluacion_mecanica" ><?php echo $objetivos_individuales['mecanica']['segunda'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Tercera Evaluaci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="tercera_evaluacion_mecanica" ><?php echo $objetivos_individuales['mecanica']['tercera'] ?></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>index.php/planilla_controller/ver_lista_de_alumnos">Cancel</a>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>