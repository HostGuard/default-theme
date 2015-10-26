	<div class="col-xs-12">
		<?php				
				if ($this->licensing->node_count == $this->licensing->data['customfields']['allowedslaves']) {
						$this->load->view('error', array('type' => 'error-empty', 'message' => 'You have reached the maximum number of nodes allowed with your HostGuard license.  Please visit <a href="https://portal.hostguard.net/clientarea.php">https://portal.hostguard.net/clientarea.php</a> to purchase licensing for additional nodes.'));
				}
		?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Latest Logs</div>
				<div class="panel-body no-pad panel-scroll">
					<table class="table table-condensed">
						<tr><th>Time</th><th>Node</th><th>CT</th><th>Message</th></tr>
						<?php
							foreach($logs as $log) {
								echo '<tr><td>'.elapsed_time(time()-$log->log_time, true).' ago</td><td>'.$log->node_name.'</td><td>'.$log->log_container.'</td><td>'.$log->log_message.'</td></tr>';
							}
						?>
					</table>
				</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Statistics</div>
			<div class="panel-body no-pad panel-scroll">
				<table class="table table-condensed">
					<?php foreach($stats['virt'] as $key => $value) {
							if (intval($value['count']) > 0) {
								echo '<tr><td>Total '.$key.' virtual servers</td><td class="text-center">'.$value['count'].'</td></tr>';
							}
						}
					?>
					
					<tr>
							<td>Total Nodes</td>
							<td class="text-center"><?php echo count($nodes); ?></td>
					</tr>
					<tr>
							<td>IP addresses total</td>
							<td class="text-center"><?php echo $ip['total']; ?></td>
					</tr>
					<tr>
							<td>IP addresses used</td>
							<td class="text-center"><?php echo $ip['used']; ?></td>
					</tr>
					<tr>
							<td>IP addresses free</td>
							<td class="text-center"<?php ($ip['free'] == 0 ? ' class="msg-error"': '')?>><?php echo $ip['free']; ?></td>
					</tr>
					<tr>
							<td>ICMP Monitoring Daemon</td>
							<?php
									if($hgstatus_server == "Not Running") {
											echo '<td class="text-center"><span class="badge badge-danger">Not Running</span></td>';
									} else {
											echo '<td class="text-center"><span class="badge badge-success">Running</td>';
									}
							?>
					</tr>
					<!--<tr>
						<td>Advanced Monitoring Daemon</td>
						<?php
							if($hgstatus_pinger == "Not Running") {
									echo '<td class="text-center"><span class="badge badge-danger">Not Running</span></td>';
							} else {
									echo '<td class="text-center"><span class="badge badge-success">Running</td>';
							}
						?>
					</tr>-->
				</table>
			</div>
		</div>
	</div>
	
</div>
<div class="row">

	<div class="col-md-6">
        <div class="panel panel-default">
			<div class="panel-heading">Suspended VPSes</div>
			<div class="panel-body no-pad panel-scroll">
				<table class="table table-condensed">
					<tr><th>ID</th><th>User</th><th>Hostname</th><th>Node</th>
					<?php
						if ($suspended["row_count"] == 0) {
							echo '<tr><td colspan="4">No suspended VPSes</td></tr>';
						} else {
							foreach($suspended as $container) {
								echo '<tr><td><a href="/server/'.$container->ctid.'">'.$container->ctid.'</a></td><td>'.$container->first_name.' '.$container->last_name.'</td><td>'.$container->hostname.'</td><td>'.$container->node_name.'</td></tr>';
							}
						}
					?>
				</table>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
        <div class="panel panel-default">
			<div class="panel-heading">Latest HostGuard News</div>
			<div class="panel-body no-pad panel-scroll">
				<table class="table table-condensed">
				<?php
				foreach($news as $n) {
					echo('<tr><td>
<a href="'.$n->url.'" target="_blank">'.$n->name.'</a></td><td>'.elapsed_time(time()-date_timestamp_get(new DateTime($n->date)), true).' ago
</td></tr>');
				}
        			?>
				</table>
			</div>
        </div>
</div>
<div class="row">
<div class="col-md-12">
	<?php $this->load->view('node/admin-home'); ?>
</div>
</div>

