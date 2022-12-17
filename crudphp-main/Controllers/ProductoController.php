<?php

require_once '../Model/Producto.php';

if (isset($_GET['consult'])) { //Mostrar Usuarios
	$ProductoModel = new Producto();

?>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				"order": [
					[0, "desc"]
				]
			});
		});
	</script>

	<table id="example" class="table table-striped table-hover table-bordered">
		<thead class="btn-primary">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Categoria</th>
				<th width="8%">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($ProductoModel->MostrarProducto() as $data) {

			?>

				<tr><input type="hidden" id="nombre_<?php echo $data['id']; ?>" value="<?php echo $data['nombre']; ?>">
					<input type="hidden" id="descripcion_<?php echo $data['id']; ?>" value="<?php echo $data['descripcion']; ?>">
					<input type="hidden" id="categoria_<?php echo $data['id']; ?>" value="<?php echo $data['categoria']; ?>">
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['nombre']; ?></td>
					<td><?php echo $data['descripcion']; ?></td>
					<td><?php echo $data['categoria']; ?></td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic mixed styles example">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaledit" data-bs-whatever="@mdo" onclick="editar(<?php echo $data['id']; ?>)"><span class="fas fa-edit"></span></button>
							<button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $data['id']; ?>)"><span class="fas fa-trash"></span></button>

						</div>
					</td>
				</tr>


			<?php
			}

			?>
		</tbody>
	</table>


<?php
} else if (isset($_GET['action']) && $_GET['action'] == "save") {
	$ProductoModel = new Producto();

	$ProductoModel->nombre = htmlentities($_POST['nombres']);
	$ProductoModel->descripcion = htmlentities($_POST['descripcion']);
	$ProductoModel->categoria = htmlentities($_POST['categoria']);



	$prod = $ProductoModel->RegistrarProducto($ProductoModel);

	if ($prod) {
		echo "exito";
	} else {
		echo "error";
	}
} else if (isset($_GET['action']) && $_GET['action'] == "eliminar") {
	$ProductoModel = new Producto();

	$ProductoModel->id = htmlentities($_GET['id']);




	$prod = $ProductoModel->eliminarProducto($ProductoModel);

	if ($prod) {
		echo "exito";
	} else {
		echo "error";
	}
} else if (isset($_GET['action']) && $_GET['action'] == "edit") {
	$ProductoModel = new Producto();
	$ProductoModel->id = htmlentities($_POST['idedit']);
	$ProductoModel->nombre = htmlentities($_POST['nombresedit']);
	$ProductoModel->descripcion = htmlentities($_POST['descripcionedit']);
	$ProductoModel->categoria = htmlentities($_POST['categoriaedit']);



	$prod = $ProductoModel->EditarProducto($ProductoModel);

	if ($prod) {
		echo "exito";
	} else {
		echo "error";
	}
}
?>