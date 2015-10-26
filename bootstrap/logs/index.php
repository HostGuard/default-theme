	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>General Logs</h2>
		</div>
		
	</div>
</div>

<div class="row">

	<div class="col-xs-12">
			
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr><th>Time</th><th>IP</th><th>User</th><th>CT</th><th>Node</th><th>Type</th><th>Level</th><th>Message</th></tr>
			</thead>
			<tbody>
				<?php
					foreach ($logs as $log) {
						echo '<tr'.($log->log_level == "error" ? ' class="msg-error"' : '').'><td>'.date('M d, Y g:ia', gmt_to_local($log->log_time, $this->ion_auth->user()->row()->timezone)).'</td><td>'.long2ip($log->log_ip).'</td><td>'.$log->first_name.' '.$log->last_name.'</td><td>'.$log->hostname.'</td><td>'.$log->node_name.'</td><td>'.$log->log_type.'</td><td>'.$log->log_level.'</td><td style="max-width: 500px">'.$log->log_message.'</td></tr>';
					}
				?>
			</tbody>
		</table>
		
		<?php echo $this->pagination->create_links(); ?>

	</div>