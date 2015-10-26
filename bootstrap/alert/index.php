	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Server Alerts</h2>
		</div>
	</div>
</div>

<div class="row">

<?php if ($this->ion_auth->is_admin()): ?><div class="col-md-6"><?php else: ?><div class="col-md-12"><?php endif; ?>
	<div class="panel panel-default">
		<div class="panel-heading">Server Alerts - <?php echo count($vm_alerts); ?><a class="pull-right" href="/alert/ackuser/all">Clear All</a></div>
		
		<table id="server-alerts-body" class="table table-condensed table-striped">
			<thead>
				<tr><th>Server</th><th>Time</th><th>Module</th><th>Value</th><th></th></tr>
			</thead>
			<tbody class="panel-scroll">
			<?php
			if (count($vm_alerts) != 0) {
					foreach ($vm_alerts as $alert) {
							echo '
					<tr>
							<td><a href="/server/'.$alert->ctid.'">'.$alert->hostname.'</a></td>
							<td>'.elapsed_time(time()-$alert->alert_time).' ago</td>
							<td>'.$alert->alert_module.'</td>
							<td>'.$alert->alert_value.'</td>
							<td><a class="btn btn-danger btn-xs remove-btn" href="/alert/ackuser/'.$alert->alert_id.'"><i class="fa fa-times"></i></a></td>
					</tr>';
					}
			} else {
					echo '
					<tr><td colspan="5" class="text-center">Nothing to report here.</td></tr>';
			}
			?>
			</tbody>
		</table>
	</div>
</div>

<?php if ($this->ion_auth->is_admin()): ?>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">Node Alerts - <?php echo count($node_alerts); ?><a class="pull-right" href="/alert/ack/all">Clear All</a></div>
		
		<table id="node-alerts-body" class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Server</th><th>Time</th><th>Module</th><th>Value</th><th></th>
				</tr>
			</thead>
			<tbody class="panel-scroll">
				<?php
				if (count($node_alerts) != 0) {
						foreach ($node_alerts as $alert) {
								echo '
						<tr>
								<td><a href="/node/'.$alert->alert_server.'">'.$alert->node_name.'</a></td>
								<td>'.elapsed_time(time()-$alert->alert_time).' ago</td>
								<td>'.$alert->alert_module.'</td>
								<td>'.$alert->alert_value.'</td>
								<td><a class="btn btn-danger btn-xs remove-btn" href="/alert/ack/'.$alert->alert_id.'"><i class="fa fa-times"></i></a></td>
						</tr>';
						}
				} else {
						echo '
						<tr><td colspan="5" class="text-center">Nothing to report here.</td></tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php endif; ?>