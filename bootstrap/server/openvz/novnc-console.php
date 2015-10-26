<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>ajaxTerm Console</title>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo '/themes/'.$current_theme.'/img/favicon.ico' ?>" />
        
	<link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/bootstrap.min.css' ?>" />
	<link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/bootstrap-switch.min.css' ?>" />
	<link rel="stylesheet" type="text/css" href="/ajaxterm/ajaxterm.css"/>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/hostguard.css' ?>" />
        
        

        <script src="/ajaxterm/sarissa.js"></script>
	<script src="/ajaxterm/sarissa_dhtml.js"></script>
	<script src="/ajaxterm/ajaxterm.js"></script>
		
        <script src="<?php echo '/themes/'.$current_theme.'/javascript/jquery-1.11.0.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/old-bootstrap.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/bootstrap-switch.min.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/widget-scroller.js' ?>"></script>
	<script src="<?php echo '/themes/'.$current_theme.'/javascript/hostguard.js' ?>"></script>	
		
        <script type="text/javascript">window.onload=function() {t=ajaxterm.Terminal("term",80,25); };</script>
	
</head>

<body class="novnc">
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" id="noVNC_bar">
		<div class="container" id="noVNC_screen">
			<div class="navbar-header">				
				<div id="noVNC_buttons" class="btn-group pull-right">
					<button type="button" class="btn btn-default" id="noVNC_paste">Paste</button>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Options <span class="caret"></span></button>
					
					<ul id="noVNC_buttons" class="dropdown-menu" role="menu">
						<li><a href="/server/boot/<?php echo $container->ctid ?>" data-action="boot" data-verb="Booting">Boot</a></li>
						<li><a href="/server/shutdown/<?php echo $container->ctid ?>" data-action="shut down" data-verb="Shutting down">Shut Down</a></li>
						<li><a href="/server/reboot/<?php echo $container->ctid ?>" data-action="reboot" data-verb="Rebooting">Reboot</a></li>
						<li><a href="/server/poweroff/<?php echo $container->ctid ?>" data-action="power off" data-verb="Powering off">Power Off</a></li>
					</ul>
				</div>
			
				<span class="noVNC_status_bar" id="noVNC_status_bar">
					<span id="noVNC_status">Loading</span>
				</span>
			</div>
				
		</div>
	</nav>
	
	<div id="term"></div>

	<script type="text/javascript">$('#noVNC_buttons a').click(function(e) { e.preventDefault(); var r = confirm('Are you sure you want to ' + this.getAttribute('data-action') + ' this VPS?'); if (r == true) { $('#noVNC_status').text(this.getAttribute('data-verb') + '...'); var req = $.post(this.href); req.done(function() { $('#noVNC_status').text('Done!') }); } else {} });</script>
</body>
</html>