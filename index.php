<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>
<?php global $user ?>
<?php include(HEADERNONAV_TEMPLATE);  ?>


<div class="container">
<form action="login/login.php" method="post"> 
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" placeholder="" class="form-control" id="username" name="user['user']" />
</div>
<div class="form-group">
	<label for="password">Email</label>
	<input type="password" placeholder="" class="form-control" id="password" name="password"/>
</div>

	<button class="btn btn-block btn-danger btn-lg">Send Password</button>
	<button class="btn btn-block btn-danger btn-lg">Cancel</button>
</form>
<?php include(FOOTER_TEMPLATE); ?>
	