<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Editar valor por período</h2>

<form action="edit.php?id=<?php echo $room['id'];?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Selecione o quarto: </label>
      <select name="room['room_id']">
      <option value="">Selecione</option>
      <?php foreach($rooms as $r) : ?>
        <?php if($r['id'] === $room['room_id']) : ?>

            <option value="<?php echo $r['id'] ?>" selected><?php echo $r['name'] ?></option>

        <?php else : ?>

            <option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>

        <?php endif ?>
      <?php endforeach ?>
      </select>
    </div>
  </div>

  <div class="row">  
    <div class="form-group col-md-6">
      <label for="campo2">Data Início</label>
      <input type="date" class="form-control" name="room['date_start']" value="<?php echo $room['date_start'] ?>">
    </div>
  </div>  

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo3">Data Fim</label>
      <input type="date" class="form-control" name="room['date_end']" value="<?php echo $room['date_end'] ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo4">Valor</label>
      <input type="number" class="form-control" name="room['value']" value="<?php echo $room['value'] ?>">
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