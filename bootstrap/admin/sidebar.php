<?php

$sections = array(

    'setup' => array(
        'title' => 'Easy Setup',
        'controller' => 'admin',
        'links' => array(
            '1. Location' => '/locatio2',
            '2. Plan' => '/pla2',
            '3. DNS' => '/dn2',
            '4. Add Node' => '/nod2',
            '5. IP Blocks' => '/i2',
            '6. VPS Templates' => '/templat2',
            '7. Add VPS' => '/create_vp2',
        )
    ),

        'admin' => array(
                'title' => 'Admin',
                'controller' => 'admin',
                'links' => array(
                        'Admin Home' => '/admin/index',
                        'Add VPS' => '/create_vps',
                        'List All VPS' => '/listall',
                )
        ),
        
        'manage' => array(
                'title' => 'Manage',
                'controller' => 'node',
                'links' => array(
                        'Nodes' => '/node/index',
                        'Plans' => '/plan/index',
                        'Locations' => '/location/index',
                        'Users' => '/user/list',
                        'Staff' => '/staff/list',
                        'Groups' => '/group/list',
                        'IP Blocks' => '/ip/index',
                        'DNS Zones' => '/dns/index',
                )
        ),

        'templates' => array(
                'title' => 'Media',
                'controller' => 'template',
                'links' => array(
                        'Templates' => '/template/index',
                        'ISO Images' => '/iso/index',
                )
        ),
        
        'settings' => array(
                'title' => 'Settings',
                'controller' => 'settings',
                'links' => array(
                        'General Settings' => '/settings/general',
                        'Automation Settings' => '/settings/suspension',
			'SMTP Settings' => '/settings/smtp',
			'API Keys' => '/apikeys/index',
                        'License Settings' => '/settings/license',
                        'Backup Settings' => '/settings/backup',
			
                )
        ),

        'logs' => array(
                'title' => 'Logs',
                'controller' => 'logs',
                'href' => '/logs/index',
        ),
);

$controller = $this->uri->segment(1);
$func = $this->uri->segment(2);
if ($func === false) {
        $url = $controller;
} else {
        $url = $controller.'/'.$func;
}

// This is a really hacky way of making the Media section of the sidebar work properly....
if ($controller == "template" && ($func == "edit" || $func == "delete")) {
        $s = "template";
} elseif ($controller == "iso" && ($func == "edit" || $func == "delete")) {
        $s = "iso";
}

function substr_array_search($needle, $haystack) {
        foreach ($haystack as $h) {
                if (substr($h, 0, strlen($needle)) == $needle) {
                        return true;
                }
        }
        return false;
}

?>


	<div class="row">
        <div id="sidebar" class="col-sm-3 col-md-2">
			<?php
				if ($this->ion_auth->is_admin() == true) {
					echo form_open('search', array('class' => 'side-search', 'role' => 'search'));
					echo '<div class="form-group"><input type="text" class="form-control" placeholder="search" name="q" /></div>';
					echo form_close();
				} 
			?>

			<ul class="nav">
					<?php
					foreach ($sections as $section) {
							if (array_key_exists('links', $section)) {
									echo '
											<li><a data-toggle="collapse" href="#'.str_replace(' ', '', $section['title']).'">'.$section['title'].'</a>
											<div class="list-group panel-collapse '.(array_search('/'.$controller.'/'.$func, $section['links']) !== FALSE || substr_array_search('/'.$controller, $section['links']) !== FALSE ? 'in' : 'collapse').'" id="'.str_replace(' ', '', $section['title']).'">';

									foreach ($section['links'] as $text => $href) {
											echo '<a class="list-group-item '.
												(
												$href === '/'.$url ||
												(($section['title'] == "Manage") && substr($href, 0, strlen('/'.$controller)) == '/'.$controller) ||
												($s == "template" && $href == "/template/index") ||
												($s == "iso" && $href == "/iso/index")
													? 'active'
													: ''
												)

												.'" href="'.$href.'">'.$text.'</a>';
									}
									echo '</div></li>';
							} else {
									echo '
											<li><a href="'.$section['href'].'">'.$section['title'].'</a></li>';
							}
					}

					$files = scandir('/opt/hostguard/codeigniter/application/themes/bootstrap/sidebar/admin');
					$exclude = array('..', '.');
					foreach ($files as $file) {
							if (!in_array($file, $exclude)) {
									include '/opt/hostguard/codeigniter/application/themes/bootstrap/sidebar/admin/'.$file;
							}
					}
					?>
					
					<li><a data-toggle="collapse" href="#my-servers">My VPS</a>
					<?php
						echo '<div class="list-group panel-collapse '.($controller == 'server' ? 'in' : 'collapse').'" id="my-servers">
						<a class="list-group-item" href="/create_vps">Add VPS</a>
						';
						$sql = 'SELECT * FROM containers WHERE user = ? ORDER BY hostname ASC';
						$servers = $this->db->query($sql, array($this->session->userdata('user_id')));
						foreach ($servers->result() as $server) {
								echo '<a class="list-group-item '.($func == $server->ctid || $this->uri->segment(3, 0) == $server->ctid ? 'active' : '').'" href="/server/'.$server->ctid.'">'.$server->hostname.'</a>
								';
						}
					?>
					</div></li>
			</ul>
		</div>
		<!--<div id="admin-main" class="container"> -->
        <div id="admin-main" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
			<div class="row">
					<?php 
						if ($this->session->flashdata('message-type') != FALSE) {
							$this->load->view('error', array(
								'type' => $this->session->flashdata('message-type'),
								'message' => $this->session->flashdata('message-text')
								)
							);
						}
					?>