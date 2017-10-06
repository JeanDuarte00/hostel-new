<?php require_once 'functions.php'; 
	index();
?>
<?php include(HEADERNONAV_TEMPLATE);  ?>

<form>
	<div class="row">
		<div class="form-group col-md-3">
			<label for="dataInicio">Data Inicio</label>
			<input type="date" id="dataInicio" class="form-control" name="dataInicio" placeholder="data de início" />
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-3">
			<label for="dataInicio">Data Fim</label>
			<input type="date" id="dataFim" class="form-control" name="dataFim" placeholder="data de fim" />
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-3">
			<input class="btn btn-info" type="submit" value="Pesquisar"/>
		</div>
	</div>
</form>


<hr>

	<?php if($images != null) : ?>
	<div class="row">
		<?php foreach($images as $img) : ?>
			<img src="<?php echo BASEURL .'upload/'. $img['url']?>" alt="...">
		<?php endforeach ?>
	</div>
	<?php endif ?>
<?php include(FOOTER_TEMPLATE); ?>
	