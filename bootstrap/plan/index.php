<div class="col-xs-12">
	<div class="page-header page-nopad">
		<h2>Server Plans</h2>
	</div>
</div>

<?php foreach($vtypes as $vtype => $vtypeid): ?>

<?php if (count($plans[$vtype]) > 0): ?>
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo $vtype ?> Plans</div>
			<table class="table table-condensed table-striped">
				<thead>
					<tr><th>ID</th><th>Plan Name</th><th>RAM</th><th>Burst/Swap</th><th>Disk</th><th>Network</th><th>CPUs</th><th></th></tr>
				</thead>
				<tbody>
					<?php
					foreach ($plans[$vtype] as $plan) {
                                                echo '<tr>
						<td>'.$plan->plan_id.'</td><td><a href="/plan/edit/'.$plan->plan_id.'">'.$plan->plan_name.'</a></td><td>'.$plan->guaranteed_memory.' MB</td><td>'.$plan->burst_memory.' MB</td><td>'.$plan->disk.' GB</td><td>'.$plan->transfer.' GB</td><td>'.$plan->cpus.'</td><td><a class="btn btn-primary btn-xs" href="/plan/edit/'.$plan->plan_id.'"><i class="fa fa-pencil"></i> Edit</a> <a data-toggle="modal" data-target="#modal'.$plan->plan_id.'" class="btn btn-danger btn-xs" href="/plan/delete/'.$plan->plan_id.'"><i class="fa fa-trash-o"></i> Delete</a><div id="modal'.$plan->plan_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></td>
						</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
<?php endif; ?>
        
<?php endforeach; ?>
        

<?php $this->load->view('plan/create'); ?>