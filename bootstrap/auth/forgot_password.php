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
		
		<a href="/" title="HOST GUARD"><img src="/graphics/host-guard-bar.png" alt="HOST GUARD" class="center-block" /></a>
                
		<div class="box">
			<div class="alert alert-info"><strong>Forgot Password</strong> Enter your email address below and we'll send you a link to reset your password.</div>

			<?php echo strlen($message) > 0 ? '<div class="alert alert-info">'.$message.'</div>' : '' ?>

			<?php echo form_open("auth/forgot_password");?>
            
				<div class="form-group">
						<label class="control-label">Email</label>
						<a href="login" class="pull-right">Login</a>
						<?php echo form_input($email, null, 'class="form-control" required autofocus');?>
				</div>

				<div class="form-group">
						<?php echo form_submit('submit', 'Submit', 'class="btn btn-lg btn-primary center-block"');?>
				</div>

			<?php echo form_close();?>

        </div>
	</div>
</body>
</html>
