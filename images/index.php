<?php
  require_once "functions.php";  
  index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Quartos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Inserir imagens</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i>Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<p><?php echo $_SESSION['message'] ?></p>
	</div>

<?php $_SESSION['message'] = "" ?>	
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th class="text-center">Nome Quarto</th>
		<th class="text-center">Data Atualização</th>
		<th class="text-center">Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($rooms) : ?>
<?php foreach ($rooms as $room) : ?>
	<tr>
		<td class="text-center"><?php echo $room['name']; ?></td>
		<td class="text-center"><?php echo $room['updated_at']; ?></td>
		<td class="actions text-center">
			<a href="view.php?room_id=<?php echo $room['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?room_id=<?php echo $room['room_id']; ?>&image_id=<?php echo $room['image_id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="remove.php?room_id=<?php echo $room['room_id']; ?>&image_id=<?php echo $room['image_id']; ?>" class="btn btn-sm btn-danger">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>