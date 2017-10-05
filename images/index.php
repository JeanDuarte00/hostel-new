<?php
    require_once('functions.php');
    index();
    
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Imagens</h2>

<div class="row">
  <?php foreach($images as $img) : ?>
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <img src="<?php echo BASEURL .'upload/'. $img['url']?>" alt="...">
    </a>
  </div>
  <?php endforeach ?>
</div>

<?php include(FOOTER_TEMPLATE); ?>