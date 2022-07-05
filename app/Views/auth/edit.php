<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cerrar()"></button>
      </div>
      <div class="modal-body">
        <div id="resultados"></div>
        <form method="post" name="formedit" id="formEdit">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombres:</label>
            <input type="text" class="form-control" name="nombres" id="nombresed" required>
            <input type="hidden" name="iduser" id="iduser">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo:</label>
            <input type="text" class="form-control" name="correo" id="correoed" required>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Clave:</label>
            <input type="text" class="form-control" name="clave" id="claveed" required>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Rol:</label>
            <select name="rol" id="roled">
              <option value="0">Admin</option>
              <option value="1">User</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cerrar()">Close</button>
        <button type="submit" class="btn btn-primary" id="guardared">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  function OpenModal(idp) {
    $.post("<?php echo site_url('auth/getByid/'); ?>" + idp, function(datos) {
      var obj = JSON.parse(datos); //convierte una cadena de texto JSON en un objeto JavaScript.
      $('[name="iduser"]').val(obj["id"]); //el campo oculto hidden
      $('[name="nombres"]').val(obj["nombres"]);
      $('[name="correo"]').val(obj["correo"]);
      $('[name="clave"]').val(obj["clave"]);
      $('[name="rol"]').val(obj["rol"]);
    });

    $('#modalEdit').modal('show');
  }

  $('#formEdit').submit(function(event) {
    var parametros = $('#formEdit').serialize(); //obtiene todos los campos con sus datos
    // console.log(parametros);
    var salida = "";

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('auth/actualizar'); ?>",
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

  const cerrar = () => location.reload();
</script>