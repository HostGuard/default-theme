<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8"/>
		<meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $this->ion_auth->hgsettings['COMPANY']; ?> :: HostGuard Control Panel</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo '/themes/'.$current_theme.'/img/favicon.ico' ?>" />

	<link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/bootstrap.min.css' ?>" />
	<link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/bootstrap-switch.min.css' ?>" />
	<link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/hostguard.css' ?>" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/jquery-1.11.0.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/old-bootstrap.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/bootstrap-switch.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/jquery.tablesorter.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/jquery.tablesorter.widgets.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/widget-scroller.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/hostguard.js' ?>"></script>
</head>

<body class="login">
	<div id="container">
	
<?php if (count($this->ion_auth->users()->result()) == 0): ?>
        <a href="/" title="HOST GUARD"><img src="/graphics/host-guard-bar.png" alt="HOST GUARD" class="center-block" /></a>
                
		<div class="box">
			<div class="alert alert-info"><strong>Create Admin Account</strong> Please fill out the fields below to create your initial Administrator account</div>
                                
			<?php echo form_open("auth/login");?>
				<div class="form-group">
						<label class="control-label">Email</label>
						<?php echo form_input($identity, null, 'class="form-control" required autofocus tabindex="1"');?>
				</div>

				<div class="form-group">
						<label class="control-label">Password</label>
						<?php echo form_input($password, null, 'class="form-control" required tabindex="2"');?>
				</div>

				<div class="form-group">
						<?php echo form_submit('submit', 'Create Account', 'class="btn btn-lg btn-primary center-block" tabindex="3"');?>
				</div>
			<?php echo form_close();?>
		</div>
<?php else: ?>
        
		<a href="/" title="HOST GUARD"><img src="/graphics/host-guard-bar.png" alt="HOST GUARD" class="center-block" /></a>
                
		<div class="box">
			<?php echo strlen($message) > 0 ? '<div class="alert alert-danger">'.$message.'</div>' : '' ?>

			<?php echo form_open("auth/login");?>
			<?php echo form_hidden("return_url", ($_GET["return_url"] > "" ? $_GET["return_url"] : $_POST["return_url"])) ?>

			<div class="form-group">
					<label class="control-label">Email</label>
					<?php echo form_input($identity, null, 'class="form-control" required autofocus tabindex="1"');?>
			</div>

			<div class="form-group">
					<label class="control-label">Password</label>
					<?php echo form_input($password, null, 'class="form-control" required tabindex="2"');?>
			</div>

			<div class="form-group">
					<a href="forgot_password" class="pull-right">Forgot password?</a>
					
					<?php echo form_checkbox('remember', '1', FALSE, 'id="remember" tabindex="3"');?>
					<label for="remember">Remember Me</label>
			</div>

			<div class="form-group">
					<?php echo form_submit('submit', 'Login', 'class="btn btn-lg btn-primary center-block" tabindex="4"');?>
			</div>

			<?php echo form_close();?> 
		</div>
        
<?php endif; ?>
	
</div>

</body>
</html>