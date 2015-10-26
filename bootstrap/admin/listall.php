	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>All Severs</h2>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
                                
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th></th><th>Hostname</th><th class="hidden-xs">IP Address</th><th class="hidden-xs">Type</th><th class="hidden-xs">Memory</th><th>Node</th><th class="hidden-xs">User</th><th class="hidden-xs">Manage</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($containers as $container) 
					{
						echo '<tr>
								<td>'.($container->status == "running" ? '<i class="fa fa-check-circle fa-2x fa-green"></i>' : '<i class="fa fa-times-circle fa-2x fa-red"></i>').'</td>
								<td><a href="/server/'.$container->ctid.'">'.$container->hostname.'</a></td>
								<td class="hidden-xs">'.long2ip($container->ip_address).'</td>
								<td class="hidden-xs">'.$container->name.'</td>
								<td class="hidden-xs">'.$container->memory_guaranteed.' MB</td>
								<td>'.$container->node_name.'</td>
								<td class="hidden-xs"><a href="/user/index/'.$container->user.'">'.$container->first_name.' '.$container->last_name.' ('.$container->email.')</a></td>
								<td class="hidden-xs"><a class="btn btn-primary btn-sm" href="/server/'.$container->ctid.'">Manage</td></tr>';
					}
				?>
			</tbody>
		</table>
                        
		<?php echo '<p style="margin: 0 auto; text-align: center">'.$this->pagination->create_links().'</p>'; ?>        
	</div>
