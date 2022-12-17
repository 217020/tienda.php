$(document).ready(function () {
  $("#saveform").submit(function (e) {
    e.preventDefault();

    var errores = "";
    if ($("#nombres").val() == "") {
      errores += "<strong><li>Nombre</li></strong>";
      $("#nombres").focus();
    }

    if ($("#descripcion").val() == "") {
      errores += "<strong><li>Descripción</li></strong>";
      $("#descripcion").focus();
    }
    if ($("#categoria").val() == "" || $("#categoria").val() == "0") {
      errores += "<strong><li>Categoría</li></strong>";
      $("#categoria").focus();
    }

    if (errores != "") {
      let datos =
        '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>DATOS OBLIGATORIOS!</strong>' +
        errores +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

      $(".mensajedetexto").html(datos);

      errores = "";
      return;
    } else {
      var parametros = new FormData(this);

      $(":submit").attr("disabled", true);
      $.ajax({
        type: "POST",
        url: "./Controllers/ProductoController.php?action=save",
        data: parametros,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (objeto) {
          $(".mensajedetexto").html(
            '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>CARGANDO...! </strong><br><br>Estamos procesando su petición...<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
          );
        },
        success: function (datos) {
          if (datos.trim() == "exito") {
            $(".mensajedetexto").html(
              '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>¡Datos Almacenados Correctamente!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
            );

            document.getElementById("saveform").reset();
          } else {
            $(".mensajedetexto").html(
              '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>ERROR...! </strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
            );
          }
          cargar();
          $(":submit").attr("disabled", false);
        },
      });
    }
  });

  $("#editform").submit(function (e) {
    e.preventDefault();

    var errores = "";
    if ($("#nombresedit").val() == "") {
      errores += "<strong><li>Nombre</li></strong>";
      $("#nombresedit").focus();
    }

    if ($("#descripcionedit").val() == "") {
      errores += "<strong><li>Descripción</li></strong>";
      $("#descripcionedit").focus();
    }
    if ($("#categoriaedit").val() == "" || $("#categoriaedit").val() == "0") {
      errores += "<strong><li>Categoría</li></strong>";
      $("#categoriaedit").focus();
    }

    if (errores != "") {
      let datos =
        '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>DATOS OBLIGATORIOS!</strong>' +
        errores +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

      $(".mensajedetextoedit").html(datos);

      errores = "";
      return;
    } else {
      var parametros = new FormData(this);

      $(":submit").attr("disabled", true);
      $.ajax({
        type: "POST",
        url: "./Controllers/ProductoController.php?action=edit",
        data: parametros,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (objeto) {
          $(".mensajedetextoedit").html(
            '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>CARGANDO...! </strong><br><br>Estamos procesando su petición...<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
          );
        },
        success: function (datos) {
          if (datos.trim() == "exito") {
            $(".mensajedetextoedit").html(
              '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>¡Datos Modificados Correctamente!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
            );
          } else {
            $(".mensajedetextoedit").html(
              '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>ERROR...! </strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
            );
          }
          cargar();
          $(":submit").attr("disabled", false);
        },
      });
    }
  });
});

function eliminar(id) {
  if (confirm("Seguro de Eliminar este Producto")) {
    $.ajax({
      type: "POST",
      url: "./Controllers/ProductoController.php?action=eliminar&id=" + id,

      beforeSend: function (objeto) {
        $(".mensajede").html(
          '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>CARGANDO...! </strong><br><br>Estamos procesando su petición...<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
        );
      },
      success: function (datos) {
        if (datos.trim() == "exito") {
          $(".mensajede").html(
            '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>¡Datos Eliminados Correctamente!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
          );
          cargar();
        } else {
          $(".mensajedetexto").html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>ERROR...! </strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
          );
        }
      },
    });
  }
}

function editar(id) {
  let nombre = $("#nombre_" + id).val();
  let descripcion = $("#descripcion_" + id).val();
  let categoria = $("#categoria_" + id).val();

  $("#nombresedit").val(nombre);
  $("#descripcionedit").val(descripcion);
  $("#categoriaedit").val(categoria);
  $("#idedit").val(id);
}
