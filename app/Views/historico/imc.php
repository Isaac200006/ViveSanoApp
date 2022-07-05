<!DOCTYPE html>
<html lang="es">

<?php

use App\Models\UserModel;

$Muser = new UserModel();
?>
<div>
  <img id="imc" src="https://masvidasinobesidad.com/wp-content/uploads/2018/02/IMC.png" alt="" width="440px" height="300px">
</div>
<h5>Calculo de IMC</h5>
<div id="resultados"> </div>
<form method="post" name="formnew" id="formnew">

  <div class="mb-3">
    <input type="number" class="form-control" name="peso" id="peso" required placeholder="Ingrese su peso (Kg)">
  </div>

  <div class="mb-3">
    <input type="number" class="form-control" name="estatura" id="estatura" step="any" required placeholder="Ingrese su estatura (m)">
  </div>

  <div id="selec-imc" class="mb-3">
    <select class="form-select" style="visibility:hidden" aria-label="Default select example" name="idusuarios" id="idusuarios">
      <?php
      $registros = $Muser->getData2();
      foreach ($registros as $row) {
      ?>
        <option selected value="<?= $row['id']; ?>"> <?= $row['id'] . ' - ' . $row['nombres']; ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <button id="btn-guardar" type="submit" class="btn btn-success">Calcular</button>
  <br><br>
  <div class="container-fluid oculto" id="container">
    <div class="row">
      <div class="col-md-10">
        <a id="btn-tablas" class="btn btn-info" href="<?= site_url('rutina/ejercicio'); ?>" target="_blank">Ejercicio</a>
        <a id="btn-tablas" class="btn btn-info" href="<?= site_url('alimentacion/alimentacion'); ?>" target="_blank">Alimentacion</a>
      </div>
    </div>
  </div>
</form>
<script>
  $('#formnew').submit(function(event) {
    var parametros = $('#formnew').serialize(); //obtiene todos los campos con sus datos
    //console.log(parametros);
    var salida = "";
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('historico/add'); ?>",
      data: parametros,
      beforeSend: function() {
        $('#resultados').show();
      },
      error: function() {
        $('#resultados').html(salida);
      },
      success: function(datos) {
        $('#resultados').html(datos);
        // limpiar( );
        // removeMessage();
      }
    });
    event.preventDefault();
  });

  const btnCalcular = document.getElementById('btn-guardar');
  btnCalcular.addEventListener('click', () => {
    const inputPeso = document.getElementById('peso'),
      inputEstatura = document.getElementById('estatura');

    let estatura = Math.pow(inputEstatura.value, 2),
      imc = Math.round(inputPeso.value / estatura, 2);

    if (imc >= 25) {
      const div = document.querySelector('.oculto');
      div.classList.remove('oculto');
    } else {
      const div = document.querySelector('#container');
      div.classList.add('oculto');
    }

    // inputPeso.value = "";
    // inputEstatura.value = "";
  });
</script>

<style>
  h5 {
    text-align: center;
    font-family: Georgia, 'Times New Roman', Times, serif;
    padding: 20px;
  }

  #peso,
  #estatura {
    width: 400px;
    margin-left: 350px;

  }

  .oculto {
    display: none;
  }

  #selec-imc {
    width: 400px;
    margin-top: 20px;
    margin-left: 350px;
  }

  #btn-tablas {
    width: 140px;
    margin-left: 260px;
    margin-bottom: 50px;
  }

  #btn-guardar {
    width: 140px;
    margin-left: 480px;
  }

  #imc {
    margin-left: 320px;
  }

  body {
    background: #D3CCE3;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #E9E4F0, #D3CCE3);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  }
</style>

</html>