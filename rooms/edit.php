<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Quarto</h2>

<form action="edit.php?id=<?php echo $room['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="room['name']" value="<?php echo $room['name']; ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-12">
      <label for="campo2">Descrição</label>
      <input type="textarea" class="form-control" name="room['description']" value="<?php echo $room['description']; ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo3">Valor R$:</label>
      <input type="number" class="form-control" name="room['value']" value="<?php echo $room['value']; ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo4">Quantidade</label>
      <input type="number" class="form-control" name="romm['qtd']" value="<?php echo $room['qtd']; ?>">
    </div>
  </div>
  
  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>