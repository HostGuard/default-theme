<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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

<body>
<div id="wrapper">
        <div style="width: 350px; margin: 100px auto 250px">
                <h1 id="logo" style="margin: 0 auto; text-align: center; margin-bottom: 25px;"><a href="/" title="HOST GUARD"><img src="/graphics/host-guard-bar.png" title="HOST GUARD" alt="HOST GUARD" /></a></h1>

                <div class="panel panel-default">
                        <div class="panel-heading">Reset Password</div>
                        <div class="panel-body">
                            <?php echo strlen($message) > 0 ? '<div class="alert alert-info">'.$message.'</div>' : '' ?>

                                <?php echo form_open('/auth/reset_password/'.$code);?>

                            <?php echo form_input($user_id);?>
                            <?php echo form_hidden($csrf); ?>

                                <div class="form-group">
                                        <label class="control-label">New Password (at least <?php echo $min_password_length;?> characters long)</label>
                                        <?php echo form_input($new_password, null, 'class="form-control" required autofocus');?>
                                </div>

                                <div class="form-group">
                                        <label class="control-label">Confirm New Password</label>
                                        <?php echo form_input($new_password_confirm, null, 'class="form-control" required');?>
                                </div>

                                <div class="form-group">
                                        <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"');?>
                                </div>

                                <?php echo form_close();?>

                        </div>
                </div>
        </div>
</div>
        <div id="footer">
                <p id="credit" class="pull-right">POWERED BY: <a href="http://www.hostguard.net">HOSTGUARD<?php if ($this->ion_auth->is_admin() == true) { echo ' v'.$this->ion_auth->hgsettings['CURRENT_VERSION']; } ?></a></p>
        </div>

</body>
</html>