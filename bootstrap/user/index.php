	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<!-- <a class="pull-right btn btn-sm btn-primary" href="/profile/edit/<?php $user->id ?>">Edit Profile</a>-->
			<h2>Your Severs</h2>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr>
					<th>Status</th><th>Hostname</th><th class="hidden-xs">IP Address</th><th class="hidden-xs">Type</th><th class="hidden-xs">Memory</th><th class="hidden-xs">Node</th><th></th>
				</tr>
			</thead>
			<tbody>
		
	<?php
	foreach ($containers as $container) {     
		echo '
			<tr>
				<td class="text-center">'.($container->status == "running" ? '<i class="fa fa-check-circle fa-2x fa-green"></i>' : '<i class="fa fa-times-circle fa-2x fa-red"></i>').'</td>
				<td><a href="/server/'.$container->ctid.'">'.$container->hostname.'</a></td>
				<td class="hidden-xs">'.long2ip($container->ip_address).'</td>
				<td class="hidden-xs">'.$container->name.'</td>
				<td class="hidden-xs">'.$container->memory_guaranteed.' MB</td>
				<td class="hidden-xs">'.$container->node_name.'</td>
				<td><a class="btn btn-primary btn-sm" href="/server/'.$container->ctid.'"><i class="fa fa-cog"></i> Manage</a></td>
			</tr>';
	}
	?>		
			</tbody>
		</table>
	</div>
