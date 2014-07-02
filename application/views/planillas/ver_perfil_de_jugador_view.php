
<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center> Perfil De Jugador </center></h1>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-lg-offset-1">
    <div class="col-lg-10">
    <?php echo form_open('planilla_controller/guardar_datos_planilla_perfil_de_jugador');?>   
      <div class="form-group">
        <label for="inputEmail" class="control-label">Alumno: </label><br>
        <div class="col-lg-4">
          <input type="text" class="form-control" id="inputDefault" value="<?php echo $perfil_de_jugador['alumno'];?>" disabled>
        </div>
        <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_alumno;?>">
      </div>

      <!-- _______________ Servicios _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color: purple" >Servicios </legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: purple" class="control-label">Servicios: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="servicios" disabled><?php echo $perfil_de_jugador['servicios']['servicios_data'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Aspectos Positivos: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="servicios_aspectos_positivos" disabled><?php echo $perfil_de_jugador['servicios']['aspectos_positivos'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style = "color: purple" class="control-label" for="inputDefault">Aspectos A Mejorar: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="servicios_aspectos_a_mejorar" disabled><?php echo $perfil_de_jugador['servicios']['aspectos_a_mejorar'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Devolucion _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style = "color: green">Devoluci&oacute;n</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Devoluci&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="devolucion" disabled><?php echo $perfil_de_jugador['devolucion']['devolucion_data'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Aspectos Positivos:: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="devolucion_aspectos_positivos" disabled><?php echo $perfil_de_jugador['devolucion']['aspectos_positivos'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color: green" class="control-label" for="inputDefault">Aspectos A Mejorar: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="devolucion_aspectos_a_mejorar" disabled><?php echo $perfil_de_jugador['devolucion']['aspectos_a_mejorar'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Cancha _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:red">Cancha</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Fondo de la cancha: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="cancha" disabled><?php echo $perfil_de_jugador['cancha']['cancha_data'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Aspectos Positivos: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="cancha_aspectos_positivos" disabled><?php echo $perfil_de_jugador['cancha']['aspectos_positivos'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:red" class="control-label" for="inputDefault">Aspectos A Mejorar: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="cancha_aspectos_a_mejorar" disabled><?php echo $perfil_de_jugador['cancha']['aspectos_a_mejorar'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Red _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:blue">Red</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">En la red: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="red" disabled><?php echo $perfil_de_jugador['red']['red_data'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Aspectos Positivos: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="red_aspectos_positivos" disabled><?php echo $perfil_de_jugador['red']['aspectos_positivos'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:blue" class="control-label" for="inputDefault">Aspectos A Mejorar: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="red_aspectos_a_mejorar" disabled><?php echo $perfil_de_jugador['red']['aspectos_a_mejorar'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Aspecto mental _______________ -->
      <div class="col-lg-12">
        <br>
        <legend style="color:orange">Aspecto Mental</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Aspecto Mental: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="aspecto_mental" disabled><?php echo $perfil_de_jugador['aspecto_mental']['aspecto_mental_data'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Aspectos Positivos: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="aspecto_mental_aspectos_positivos" disabled><?php echo $perfil_de_jugador['aspecto_mental']['aspectos_positivos'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label style="color:orange" class="control-label" for="inputDefault">Aspectos A Mejorar: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="aspecto_mental_aspectos_a_mejorar" disabled><?php echo $perfil_de_jugador['aspecto_mental']['aspectos_a_mejorar'] ?></textarea>
          </div>
        </div>
      </div>

      <!-- _______________ Objetivos de competición _______________ -->
      <div class="col-lg-12">
        <br>
        <legend>Competici&oacute;n</legend>
        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Competici&oacute;n: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="competicion" disabled><?php echo $perfil_de_jugador['competicion']['competicion_data'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Aspectos Positivos: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="competicion_aspectos_positivos" disabled><?php echo $perfil_de_jugador['competicion']['aspectos_positivos'] ?></textarea>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Aspectos A Mejorar: </label>
          </div>
          <div class="col-lg-12">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px" placeholder="Evaluaci&oacute;n" name="competicion_aspectos_a_mejorar" disabled><?php echo $perfil_de_jugador['competicion']['aspectos_a_mejorar'] ?></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <?php 
              if($this->session->userdata('tipo_usuario')=="Padre")
              {
                echo '<a type="button" class="btn btn-warning" onclick="history.back()">Atrás</a>';
              }
              else{
                echo '<a type="button" class="btn btn-warning" href="'.base_url().'index.php">Atrás</a>';
              }
            ?>
            <!-- <a type="button" class="btn btn-warning" href="<?php #echo base_url(); ?>index.php/Planilla_controller/ver_lista_de_alumnos">Cancel</a> 
            <button type="submit" class="btn btn-primary">Guardar Cambios</button> -->
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>