	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>IP Management <small><?php echo $container->hostname; ?></small></h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="/server/<?php echo $container->ctid; ?>"  class="btn btn-xs btn-primary pull-right">Back</a>
				IPv4 Addresses
			</div>
			<table class="table table-striped table-condensed">
				<thead>
					<tr><th>Address</th><th>Gateway</th><th>Netmask</th><th>rDNS</th><th>&nbsp;</th></tr>
				</thead>
				<tbody>
					<?php
						foreach ($addresses as $address) {
							echo '
								<tr>
										<td>'.long2ip($address->ip_address).'</td>
										<td>'.long2ip($address->block_gateway).'</td>
										<td>'.long2ip($address->block_netmask).'</td>
										<td>'.($address->rdns == "" ? '<a data-toggle="modal" data-target="#modal'.$address->ip_address.'" class="btn btn-primary btn-xs" href="/ip/rdns/'.$address->ip_address.'"><i class="fa fa-pencil"></i> Set rDNS</a>' : $address->rdns .' 
										
										<a data-toggle="modal" data-target="#modal'.$address->ip_address.'" class="btn btn-default btn-xs" href="/ip/rdns/'.$address->ip_address.'"><i class="fa fa-pencil"></i></a>').'
										
										<div id="modal'.$address->ip_address.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></td>
										
										<td> '.($address->primary == 1 ? '<button class="btn btn-success btn-xs" disabled="disabled"><i class="fa fa-check"></i> Primary IP</button>' : '<a class="btn btn-warning btn-xs" href="/server/ipaddresses/'.$address->ctid.'/'.$address->ip_address.'"><i class="fa fa-check"></i> Set as Primary IP</a>');
										
								if ($this->ion_auth->is_admin() == true) {
									echo '
										<a data-toggle="modal" data-target="#rm-'.$address->ip_address.'" class="btn btn-danger btn-xs" href="/server/remove_ip/'.$address->ctid.'/'.$address->ip_address.'"><i class="fa fa-trash-o"></i> Remove</a><div id="rm-'.$address->ip_address.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>';
								}
						
							echo '
										</td>
								</tr>';
						}	
					?>
				</tbody>
			</table>
		</div>
        
		<?php if ($this->ion_auth->is_admin()): ?>
		<div class="panel panel-default">
			<div class="panel-heading">Add IPv4 Address</div>
			<div class="panel-body">
				<?php echo form_open('/server/add_ip/'.$container->ctid, array('class' => 'form-horizontal')); ?>
				<div class="form-group<?php echo (my_form_error('ip') != FALSE ? ' has-error' : ''); ?>">
					<label for="ip" class="col-md-3 control-label">Address</label>
					<div class="col-md-6">
							<?php echo form_dropdown('ip', $ip_addresses, set_value('ip', 'automatic'), 'class="form-control"'); ?>
							<?php echo my_form_error('ip', '<span class="help-block">', '</span>'); ?>
					</div>
					<div class="col-md-3">
							<?php echo form_submit('submit', 'Add IP', 'class="btn btn-default"'); ?>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="javascript:history.go(-1)"  class="btn btn-xs btn-primary pull-right">Back</a>
					IPv6 Blocks
				</div>
                                
                                <?php if ($container->virtualization_type == 1): ?>
                                <div class="panel-body no-pad">
				<?php
						$this->load->view('error', array('type' => 'info', 'message' => 'To add a specific IPv6 address to your OpenVZ VPS, simply add a reverse DNS entry for the address, and it will be added to your VPS. Removing the rDNS record for a particular IPv6 address will remove the IP from the VPS. Please note that adding too many IPv6 addresses will slow down your bootup & restart times, and could impact performance.'));
				?>
                                </div>
                                <?php endif; ?>

				<table class="table table-striped table-condensed">
					<thead>
						<tr><th>Network</th><th>rDNS Records</th></tr>
					</thead>
					<tbody>
						<?php                
						foreach ($addresses6 as $address) {
								echo '<tr><td>'.int64_to_inet6(array($address->ip_address, 0)).'/64 <br /><a data-toggle="modal" data-target="#v6-add-'.$address->ip_address.'" class="btn btn-primary btn-xs" href="/ip/rdns6/'.$address->ip_address.'"><i class="fa fa-plus"></i> Add Record</a><div id="v6-add-'.$address->ip_address.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>';
								if ($this->ion_auth->is_admin()) {
										echo ' <a data-toggle="modal" data-target="#v6-rm-block-'.$address->ip_address.'" class="btn btn-danger btn-xs" href="/server/remove_ip6/'.$server_id.'/'.$address->ip_address.'"><i class="fa fa-trash-o"></i> Remove Block</a><div id="v6-rm-block-'.$address->ip_address.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>';
								}
								echo '</td><td><table class="table table-bordered table-striped table-condensed">';
								foreach ($address->rdns as $address6) {
										$a_int = inet6_to_int64(ptr_to_inet6($address6->name));
										echo '<tr><td style="padding-left: 0px">'.ptr_to_inet6($address6->name).'</td><td>'.$address6->content.'</td><td><a data-toggle="modal" data-target="#v6-edit-'.$a_int[0].'-'.$a_int[1].'" class="btn btn-primary btn-xs" href="/ip/rdns6/'.$a_int[0].'/'.$a_int[1].'"><i class="fa fa-check"></i> Edit rDNS</a><div id="v6-edit-'.$a_int[0].'-'.$a_int[1].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div> <a data-toggle="modal" data-target="#v6-rm-rdns-'.$a_int[0].'-'.$a_int[1].'" class="btn btn-danger btn-xs" href="/ip/rdns6delete/'.$a_int[0].'/'.$a_int[1].'"><i class="fa fa-trash-o"></i> Delete</a><div id="v6-rm-rdns-'.$a_int[0].'-'.$a_int[1].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div></td></tr>';
								}
								echo '</table></td></tr>';
						}
						?>
					</tbody>
				</table>

			</div>
			
			<?php if ($this->ion_auth->is_admin()): ?>
					<div class="panel panel-default">
							<div class="panel-heading">Add IPv6 Block</div>
							<div class="panel-body">
									<?php echo form_open('/server/add_ip6/'.$container->ctid, array('class' => 'form-horizontal')); ?>
									<div class="form-group<?php echo (my_form_error('ip') != FALSE ? ' has-error' : ''); ?>">
											<label for="ip" class="col-md-3 control-label">Block</label>
											<div class="col-md-6">
													<?php 
															$ip_array = array();
															$ip_array['automatic'] = 'AUTOMATIC';
															echo form_dropdown('ip', $ip_array, set_value('ip', 'automatic'), 'class="form-control"');
													?>
													<?php echo my_form_error('ip', '<span class="help-block">', '</span>'); ?>
											</div>
											<div class="col-md-3">
													<?php echo form_submit('submit', 'Add IP Block', 'class="btn btn-default"'); ?>
											</div>
									</div>
									<?php echo form_close(); ?>
							</div>
					</div>
			<?php endif; ?>
			
	</div>
        