<?php require_once 'functions.php' ?>
<?php include(HEADERNONAV_TEMPLATE);  ?>


<h2>Login</h2>

<form action="login.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Email</label>
      <input type="text" class="form-control" name="user['email']">
    </div>
  </div>

  <div class="row">  
    <div class="form-group col-md-12">
      <label for="campo2">Senha</label>
      <input type="password" class="form-control" name="user['password']">
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
	