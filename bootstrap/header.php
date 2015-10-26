<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8"/>
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

<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars"></i>
			</button>
			<a href="/"><img class="navbar-brand" src="<?php echo '/themes/'.$current_theme.'/img/logo-inline.png' ?>" /></a>
		</div>
        
        <div class="collapse navbar-collapse" id="header-navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/alert/index">Alerts <span class="badge <?php echo ($alert_count == 0 ? '' : 'badge-danger'); ?>"><?php echo $alert_count; ?></span></a></li>
					
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $this->ion_auth->user()->row()->first_name ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/profile/edit">Edit Profile / Settings</a></li>
							<li><a href="/profile/logs">Logs</a></li>
							<li class="divider"></li>
							<li><a href="/auth/logout">Log Out</a></li>
						</ul>
				</li>
					
				<?php if ($this->ion_auth->is_admin() == true) {
					echo form_open('search', array('class' => 'form-inline visible-xs visible-sm', 'role' => 'search'));
					echo '<div style="margin: 2px 0 2px 10px;"><input type="text" class="form-control" placeholder="search" name="q" /></div>';
					echo form_close(); }
				?>

				<?php $this->load->view('header-nav'); ?>
			</ul>
        </div>
	</div>

	<div id="container-fluid">