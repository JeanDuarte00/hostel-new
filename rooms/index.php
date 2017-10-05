<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Quartos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Quarto</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
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
		<th>ID</th>
		<th>Nome</th>
		<th width="30%">Descrição</th>
		<th>Atualizado em</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($rooms) : ?>
<?php foreach ($rooms as $room) : ?>
	<tr>
		<td><?php echo $room['id']; ?></td>
		<td><?php echo $room['name']; ?></td>
		
		<?php if(strlen($room['description']) < 50) : ?>
			<td><?php echo $room['description']; ?></td>
		<?php else : ?>
			<td><?php echo substr($room['description'], 0,50) . "..."; ?></td>
		<?php endif; ?>

		<td><?php echo $room['updated_at']; ?></td>
		<td class="actions text-right">
			<a href="view.php?id=<?php echo $room['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $room['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="remove.php?id=<?php echo $room['id']; ?>" class="btn btn-sm btn-danger">
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