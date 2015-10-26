<!DOCTYPE html>
<html>
<head>
    <title>noVNC Console</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link rel="apple-touch-startup-image" href="images/screen_320x460.png" />
    <link rel="apple-touch-icon" href="images/screen_57x57.png">
		
    <script type="text/javascript">var INCLUDE_URI = '/novnc/include/'</script>
    <script src="/novnc/include/util.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo '/themes/'.$current_theme.'/img/favicon.ico' ?>" />

    <link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/bootstrap.min.css' ?>" />
    <link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/bootstrap-switch.min.css' ?>" />
    <link rel="stylesheet" href="<?php echo '/themes/'.$current_theme.'/css/hostguard.css' ?>" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
    <script src="<?php echo '/themes/'.$current_theme.'/javascript/jquery-1.11.0.min.js' ?>"></script>
    <script src="<?php echo '/themes/'.$current_theme.'/javascript/old-bootstrap.min.js' ?>"></script>
    <script src="<?php echo '/themes/'.$current_theme.'/javascript/bootstrap-switch.min.js' ?>"></script>
    <script src="<?php echo '/themes/'.$current_theme.'/javascript/widget-scroller.js' ?>"></script>
    <script src="<?php echo '/themes/'.$current_theme.'/javascript/hostguard.js' ?>"></script>
</head>

<!-- KVM -->

<body class="novnc">
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
		<div class="container" id="noVNC_screen">
			<div class="navbar-header">				
				<div id="noVNC_buttons" class="btn-group pull-right">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Options <span class="caret"></span></button>
					
					<ul id="noVNC_buttons" class="dropdown-menu" role="menu">
						<li><a href="/server/boot/<?php echo $container->ctid ?>" data-action="boot" data-verb="Booting">Boot</a></li>
						<li><a href="/server/shutdown/<?php echo $container->ctid ?>" data-action="shut down" data-verb="Shutting down">Shut Down</a></li>
						<li><a href="/server/reboot/<?php echo $container->ctid ?>" data-action="reboot" data-verb="Rebooting">Reboot</a></li>
						<li><a href="/server/poweroff/<?php echo $container->ctid ?>" data-action="power off" data-verb="Powering off">Power Off</a></li>
						<li class="divider"></li>
						<li><a href="#" value="CtrlAltDel" id="sendCtrlAltDelButton">Send Ctrl+Alt+Del</a></li>
						<li><a href="#" value="Reconnect" id="reconnect">Reconnect</a></li>
					</ul>
				</div>
			
				<span class="noVNC_status_bar" id="noVNC_status_bar">
					<span id="noVNC_status">Loading</span>
				</span>
			</div>
				
		</div>
	</nav>
	
	<div id="noVNC_message" style="display:none;width:100%;height:100%;margin-top:70px;"></div>
        <canvas id="noVNC_canvas" width="640px" height="20px">
                Canvas not supported.
        </canvas>

        
        <script type="text/javascript">
                
                $('#noVNC_buttons a').click(function(e) {
                        e.preventDefault();
                        var r = confirm('Are you sure you want to ' + this.getAttribute('data-action') + ' this VPS?');
                        if (r == true) {
                                $('#noVNC_status').text(this.getAttribute('data-verb') + '...');
                                var req = $.post(this.href);
                                req.done(function() { $('#noVNC_status').text('Done!') });
                        } else {

                        }
                });
        </script>
        <script>
        /*jslint white: false */
        /*global window, $, Util, RFB, */
        "use strict";

        // Load supporting scripts
        Util.load_scripts(["webutil.js", "base64.js", "websock.js", "des.js",
                           "input.js", "display.js", "jsunzip.js", "rfb.js"]);

        var rfb;

        function passwordRequired(rfb) {
            var msg;
            msg = '<form onsubmit="return setPassword();"';
            msg += '  style="margin-bottom: 0px">';
            msg += 'Password Required: ';
            msg += '<input type=password size=10 id="password_input" class="noVNC_status">';
            msg += '<\/form>';
            $D('noVNC_status_bar').setAttribute("class", "noVNC_status_warn");
            $D('noVNC_status').innerHTML = msg;
        }
        function setPassword() {
            rfb.sendPassword($D('password_input').value);
            return false;
        }
        function sendCtrlAltDel() {
            rfb.sendCtrlAltDel();
            return false;
        }
        function reconnect() {
                $.post('/libkvm/noVNCreconnect/<?php echo $container->ctid; ?>');
                var path;
                var host;
                host = WebUtil.getQueryVar('host', window.location.hostname);
                path = WebUtil.getQueryVar('path', 'websockify');
                rfb = new RFB({'target':       $D('noVNC_canvas'),
                'encrypt':      WebUtil.getQueryVar('encrypt',
                        (window.location.protocol === "https:")),
                'repeaterID':   WebUtil.getQueryVar('repeaterID', ''),
                'true_color':   WebUtil.getQueryVar('true_color', true),
                'local_cursor': WebUtil.getQueryVar('cursor', true),
                'shared':       WebUtil.getQueryVar('shared', true),
                'view_only':    WebUtil.getQueryVar('view_only', false),
                'updateState':  updateState,
                'onPasswordRequired':  passwordRequired});
                rfb.connect(host, <?php echo ($container->kvm_vnc_port + 10000); ?>, '<?php echo $container->kvm_password; ?>', path);
        }
        function updateState(rfb, state, oldstate, msg) {
            var s, sb, cad, level;
            s = $D('noVNC_status');
            sb = $D('noVNC_status_bar');
            cad = $D('sendCtrlAltDelButton');
            switch (state) {
                case 'failed':       level = "error";  break;
                case 'fatal':        level = "error";  break;
                case 'normal':       level = "normal"; break;
                case 'disconnected': level = "normal"; break;
                case 'loaded':       level = "normal"; break;
                default:             level = "warn";   break;
            }

            if (state === "normal") { cad.disabled = false; }
            else                    { cad.disabled = true; }

            if (typeof(msg) !== 'undefined') {
                sb.setAttribute("class", "navbar-text noVNC_status_" + level);
                s.innerHTML = msg;

                if (s.innerHTML.indexOf('Connect timeout') != -1 || s.innerHTML.indexOf('1006') != -1) {
                    var url = "https://" + WebUtil.getQueryVar('host', window.location.hostname) + ":<?php echo ($container->kvm_vnc_port + 10000); ?>/websockify";
                    $("#noVNC_message").html("<div class='col-md-12'><p class='alert alert-warning'>Please make sure you have added a security exception for self signed certificates.  Click this link and add a security exception to connect to NoVNC.  Then close and re-open this browser window.:<br />" +
                    "<a href='" + url + "'>" + url + "</a>" +
                    "</p></div>").show();
                } else {
                    $("#noVNC_message").hide();
                }
            }
        }

        window.onscriptsload = function () {
            var host, port, password, path, token;

            $D('sendCtrlAltDelButton').onclick = sendCtrlAltDel;
            $D('reconnect').onclick = reconnect;
            WebUtil.init_logging(WebUtil.getQueryVar('logging', 'warn'));
            document.title = unescape(WebUtil.getQueryVar('title', 'noVNC'));
            // By default, use the host and port of server that served this file
            host = WebUtil.getQueryVar('host', window.location.hostname);
            port = WebUtil.getQueryVar('port', window.location.port);

            // if port == 80 (or 443) then it won't be present and should be
            // set manually
            if (!port) {
                if (window.location.protocol.substring(0,4) == 'http') {            
                    port = 80;
                }
                else if (window.location.protocol.substring(0,5) == 'https') {            
                    port = 443;
                }
            }

            // If a token variable is passed in, set the parameter in a cookie.
            // This is used by nova-novncproxy.
            token = WebUtil.getQueryVar('token', null);
            if (token) {
                WebUtil.createCookie('token', token, 1)
            }

            password = WebUtil.getQueryVar('password', '');
            path = WebUtil.getQueryVar('path', 'websockify');

            if ((!host) || (!port)) {
                updateState('failed',
                    "Must specify host and port in URL");
                return;
            }

            rfb = new RFB({'target':       $D('noVNC_canvas'),
                           'encrypt':      WebUtil.getQueryVar('encrypt',
                                    (window.location.protocol === "https:")),
                           'repeaterID':   WebUtil.getQueryVar('repeaterID', ''),
                           'true_color':   WebUtil.getQueryVar('true_color', true),
                           'local_cursor': WebUtil.getQueryVar('cursor', true),
                           'shared':       WebUtil.getQueryVar('shared', true),
                           'view_only':    WebUtil.getQueryVar('view_only', false),
                           'updateState':  updateState,
                           'onPasswordRequired':  passwordRequired});
            rfb.connect(host, <?php echo ($container->kvm_vnc_port + 10000); ?>, '<?php echo $container->kvm_password; ?>', path);
        };
        </script>

</body>
</html>
