<?php
    require_once('functions.php');
    add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Nova(s) foto(s)</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />

   <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Selecione o quarto: </label>
      <select name="room['room_id']">
      <option value="">Selecione</option>
      <?php foreach($rooms as $r) : ?>
        <option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>
      <?php endforeach ?>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Imagens</label>
      <input type="file" id="file" class="form-control" name="files[]" multiple="multiple" accept="image/*" />
    </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>