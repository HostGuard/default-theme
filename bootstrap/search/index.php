	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Search Results <small><?php echo $q; ?></small></h2>
		</div>

		<?php if (count($users) == 0): ?>
		<?php else: ?>	
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr><th>Name</th><th>Email</th><th></th></tr>
			</thead>
			<tbody>
				<?php
					if (count($users) == 0) {
						echo '<tr><td colspan="3">No matching users found</td></tr>';
					} else {
						foreach ($users as $user) {
							echo '<tr><td>'.$user->first_name.' '.$user->last_name.'</td><td>'.$user->email.'</td>
							<td>
								<a class="btn btn-sm btn-success" href="/user/index/'.$user->id.'">Servers</a>
								<br class="visible-xs-block" />
								<a class="btn btn-sm btn-default" href="/profile/edit/'.$user->id.'">Edit</a>
								<br class="visible-xs-block" />
								<a class="btn btn-sm btn-danger" href="/user/delete/'.$user->id.'">Delete</a></td></tr>';
						}
					}
				?>
			</tbody>
		</table>
        <?php endif; ?>
		
		<?php if (count($servers) == 0): ?>
		<?php else: ?>
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr>
						<th></th>
						<th>Hostname</th>
						<th>IP Address</th>
						<th class="hidden-xs">RAM</th>
						<th class="hidden-xs">Disk</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($servers as $container): ?>
						<tr>
								<td><?php echo $container->status == "running" ? '<i class="fa fa-check-circle fa-2x fa-green"></i>' : '<i class="fa fa-times-circle fa-2x fa-red"></i>'; ?></td>
								<td><a href="/server/<?php echo $container->ctid; ?>"><?php echo $container->hostname; ?></a></td>
								<td><?php echo long2ip($container->ip_address); ?></td>
								<td class="hidden-xs"><?php echo $container->memory_guaranteed; ?> MB</td>
								<td class="hidden-xs"><?php echo $container->disk_size; ?> GB</td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		 <?php endif; ?>
	</div>