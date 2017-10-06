<?php
    require_once('functions.php');
    index();
    
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Imagens</h2>
<a href="../images/add.php" class="btn btn-primary">Adicionar</a>
<hr>
<?php if($images != null) : ?>
  <div class="row">
    <?php foreach($images as $img) : ?>
    <div class="col-xs-6 col-md-3">
      <a href="#" class="thumbnail">
        <img src="<?php echo BASEURL .'upload/'. $img['url']?>" alt="...">
      </a>
    </div>
    <?php endforeach ?>
  </div>
<?php else : ?>
  <hr>
  <h2>Nenhuma foto foi adicionada</h2>
<?php endif ?>

<?php include(FOOTER_TEMPLATE); ?>