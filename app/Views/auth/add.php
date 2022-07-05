<div class="modal fade" id="modalNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cerrar();"></button>
      </div>
      <div class="modal-body">
        <div id="resultados"> </div>
        <form method="post" name="formnew" id="formnew">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombres:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo:</label>
            <input type="text" class="form-control" name="correo" id="correo" required>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Clave:</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Rol:</label>
            <select name="rol" id="rol" class="form-select">
              <option value="0">Admin</option>
              <option value="1">User</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cerrar();">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#formnew').submit(function(event) {
    var parametros = $('#formnew').serialize(); //obtiene todos los campos con sus datos
    //console.log(parametros);
    var salida = "";
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('auth/add'); ?>",
      data: parametros,
      beforeSend: function() {
        $('#resultados').show();
      },
      error: function() {
        $('#resultados').html(salida);
      },
      success: function(datos) {
        $('#resultados').html(datos);
        // limpiar();
        // removeMessage();
      }
    });
    event.preventDefault();
  });
</script>