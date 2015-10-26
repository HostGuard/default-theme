<?php if ($this->ion_auth->is_admin()): ?>

<?php
	$sections = array(
        'admin' => array(
                'title' => 'Admin',
                'controller' => 'admin',
                'links' => array(
                        'Admin Home' => '/admin/index',
                        'Add VPS' => '/create_vps',
                        'List All' => '/listall',
                )
        ),
        
        'manage' => array(
                'title' => 'Manage',
                'controller' => 'node',
                'links' => array(
                        'Nodes' => '/node/index',
                        'Plans' => '/plan/index',
                        'Locations' => '/location/index',
                        'Accounts' => '/user/list',
                        'Staff' => '/staff/list',
                        'Groups' => '/group/list',
                        'IP Blocks' => '/ip/index',
                        'API Keys' => '/apikeys/index',
                        'DNS Zones' => '/dns/index',
                )
        ),

        'templates' => array(
                'title' => 'Media',
                'controller' => 'template',
                'links' => array(
                        'Templates' => '/template/index',
                        'Add Template' => '/template/add',
                        'Template Groups' => '/template/groups',
                        'ISO Images' => '/iso/index',
                        'Add ISO Image' => '/iso/add',
                        'ISO Groups' => '/iso/groups',
                        'Media Nodes' => '/mediastorage/index',
                        'Add Media Node' => '/mediastorage/add',
                )
        ),
        
        'settings' => array(
                'title' => 'Settings',
                'controller' => 'settings',
                'links' => array(
                        'General Settings' => '/settings/general',
                        'SMTP Settings' => '/settings/smtp',
                        'Auto-Suspend Settings' => '/settings/suspension',
                        'License Settings' => '/settings/license',
                        'Backup Settings' => '/settings/backup',
                )
        ),

        'logs' => array(
                'title' => 'Logs',
                'controller' => 'logs',
                'links' => array(
                        'View Logs' => '/logs/index',
                )
        ),
	);
?>

	<?php
		foreach ($sections as $section) {
			echo '
				<li class="dropdown visible-xs visible-sm">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$section['title'].' <b class="caret"></b></a>
								<ul class="dropdown-menu">';

			foreach ($section['links'] as $text => $href) {
					echo '<li><a href="'.$href.'">'.$text.'</a></li>';
			}
			echo '</ul></li>';
		}
	?>

<?php else: ?>
	<li class="dropdown visible-xs visible-sm">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Servers <b class="caret"></b></a>
		<ul class="dropdown-menu">
		<?php                        
			$sql = 'SELECT * FROM containers WHERE user = ? ORDER BY hostname ASC';
			$servers = $this->db->query($sql, array($this->session->userdata('user_id')));
			foreach ($servers->result() as $server) {
				echo '<li><a href="/server/'.$server->ctid.'">'.$server->hostname.'</a></li>';
			}
		?>
		</ul>
	</li>

<?php endif; ?>