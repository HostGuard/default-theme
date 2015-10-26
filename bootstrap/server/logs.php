	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<a class="btn btn-primary pull-right" href="/server/<?php echo $container->ctid; ?>">Back</a>
			<h2>Server Logs <small><?php echo $container->hostname; ?></small></h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<table class="table table-striped table-condensed table-bordered">
			<thead>
				<tr><th>Time</th><th>Type</th><th>Message</th></tr>
			</thead>
			<tbody>
				<?php
					foreach ($logs as $log) {
						echo '<tr><td>'.date('M d, Y g:ia', gmt_to_local($log->log_time, $this->ion_auth->user()->row()->timezone)).'</td><td>'.$log->log_level.'</td><td>'.$log->log_message.'</td></tr>';
					}
				?>
			</tbody>
		</table>
	</div>

	<?php echo '<p class="text-center">'.$this->pagination->create_links().'</p>'; ?>