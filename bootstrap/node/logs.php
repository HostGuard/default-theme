	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Node Logs <small><?php echo $node->node_name; ?></small></h2>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
        
		<table id="logs" class="table table-condensed table-striped table-bordered">
			<thead>
				<tr><th>Time</th><th>Container</th><th>Type</th><th>Message</th></tr>
			</thead>
			<tbody>
				<?php
						foreach ($logs as $log) {
								echo '<tr><td>'.date('M d, Y g:ia', gmt_to_local($log->log_time, $this->ion_auth->user()->row()->timezone)).'</td><td>'.$log->log_container.'</td><td>'.$log->log_level.'</td><td>'.$log->log_message.'</td></tr>';
						}
				?>
			</tbody>
		</table>
		<?php
				echo '<p style="margin: 0 auto; text-align: center">'.$this->pagination->create_links().'</p>';
		?>
	</div>