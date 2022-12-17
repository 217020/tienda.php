<?php
include "assets/encabezado.php";

?>

<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">BIENVENIDO AL REGISTRO DE DATOS DE CLIENTE!</h4>

    <hr>
    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
    data-bs-whatever="@mdo"><span class="fas fa-save"></span> Registrar</button>
<div class="loader" id="loader" style="position: absolute; text-align: center; top: 10px;  width: 100%;"></div>
<div id="mensajede" class="mensajede"></div>
<div class="vertabla"></div>

<script src="./js/Cliente.js"></script>

<script>
cargar();

function cargar() {
    $("#loader").fadeIn('slow');
    $.ajax({
        type: 'GET',
        url: './Controllers/ClienteController.php?consult=true',
        beforeSend: function(objeto) {
            $('#loader').html('<h3>Cargando...</h3>');
        },
        success: function(data) {

            $(".vertabla").html(data).fadeIn('slow');
            $('#loader').html('');


        }

    });


};
</script>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PRODCUTOS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="saveform" name="saveform" autocomplete="off" action="javascript: void();" method="POST"
                    enctype="multipart/form-data">
                    <div id="mensajedetexto" class="mensajedetexto"></div>

                    <div class="mb-3">
                        <label for="nombres" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="col-form-label">Dirección:</label>
                        <textarea class="form-control" id="direccion" name="direccion"></textarea>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span
                        class="fas fa-times"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Guardar
                </button>
            </div>

            </form>
        </div>
    </div>
</div>


<!-- Modal de edición -->
<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR PRODCUTOS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editform" name="saveform" autocomplete="off" action="javascript: void();" method="POST"
                    enctype="multipart/form-data">
                    <div id="mensajedetextoedit" class="mensajedetextoedit"></div>
                    <input type="hidden" name="idedit" id="idedit">
                    <div class="mb-3">
                        <label for="nombresedit" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombresedit" name="nombresedit">
                    </div>
                    <div class="mb-3">
                        <label for="direccionedit" class="col-form-label">Direccion:</label>
                        <textarea class="form-control" id="direccionedit" name="direccionedit"></textarea>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span
                        class="fas fa-times"></span> Close</button>
                <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Editar</button>
            </div>

            </form>
        </div>
    </div>
</div>

<?php
include "assets/footer.php";
?>