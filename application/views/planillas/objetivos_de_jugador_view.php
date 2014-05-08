
   

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
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Id alumno</label>
        <div class="col-lg-10">
          <input type="text" value="<?php echo $id_alumno; ?>">
        </div>
      </div>

      <!-- _______________ Objeticos Tecnicos _______________ -->
      <legend>Objetios Tecnicos</legend>
      <div class="form-group">
        <label class="control-label" for="focusedInput">Focused input</label>
        <input class="form-control" id="focusedInput" type="text" value="This is focused...">
      </div>

      <div class="form-group">
        <label class="control-label" for="disabledInput">Disabled input</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
      </div>

      <div class="form-group has-warning">
        <label class="control-label" for="inputWarning">Input warning</label>
        <input type="text" class="form-control" id="inputWarning">
      </div>

      <div class="form-group has-error">
        <label class="control-label" for="inputError">Input error</label>
        <input type="text" class="form-control" id="inputError">
      </div>

      <div class="form-group has-success">
        <label class="control-label" for="inputSuccess">Input success</label>
        <input type="text" class="form-control" id="inputSuccess">
      </div>

      <div class="form-group">
        <label class="control-label" for="inputLarge">Large input</label>
        <input class="form-control input-lg" type="text" id="inputLarge">
      </div>

      <div class="form-group">
        <label class="control-label" for="inputDefault">Default input</label>
        <input type="text" class="form-control" id="inputDefault">
      </div>

      <div class="form-group">
        <label class="control-label" for="inputSmall">Small input</label>
        <input class="form-control input-sm" type="text" id="inputSmall">
      </div>

      <div class="form-group">
        <label class="control-label">Input addons</label>
        <div class="input-group">
          <span class="input-group-addon">$</span>
          <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Button</button>
          </span>
        </div>
      </div>

      <!-- _______________ Objeticos Tecnicos _______________ -->

    </div>
  </div>
</div>