	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<div class="pull-right"><?php echo $container->status == "running" ? '<i class="fa fa-check-circle fa-2x fa-green"></i>' : '<i class="fa fa-times-circle fa-2x fa-red"></i>' ?></div>
			
			<h2>Manage VPS <small><?php echo $container->hostname; ?></small></h2>
		</div>
                
		<?php
                
                if ($container->restart_required == 1) {$this->load->view('error', array('type' => 'error', 'message' => 'There have been recent changes made to your VPS. To apply these settings your VPS must be restarted. Use the Reboot option below to restart your VPS and apply changes.'));}
                if ($container->suspended == 1) {$this->load->view('error', array('type' => 'error', 'message' => 'Your VPS is currently suspended.  Please contact support for more information.'));}
                
                foreach ($alerts as $alert) {$this->load->view('useralert', $alert);}
                
                ?>
                
                
	</div>
</div>

<!-- KVM -->

<div class="row">
	<div class="col-sm-6">
        <div class="panel panel-default">
			<div class="panel-heading">Status</div>
			<div class="panel-body">
				<?php
					if ($container->load_average > $container->load_critical) {$load1style = 'label label-danger';
					} elseif ($container->load_average > $container->load_warning) {$load1style = 'label label-warning';
					} else {$load1style = 'label label-success';}
					
					if ($container->load_average_5 > $container->load_critical) {$load5style = 'label label-danger';
					} elseif ($container->load_average5 > $container->load_warning) {$load5style = 'label label-warning';
					} else {$load5style = 'label label-success';}
					
					if ($container->load_average_15 > $container->load_critical) {$load15style = 'label label-danger';
					} elseif ($container->load_average_15 > $container->load_warning) {$load15style = 'label label-warning';
					} else {$load15style = 'label label-success';}
				?>

				<table class="table table-unstyled table-fixed">
					<tr><th>Status</th><td><span class="status-<?php echo $container->status; ?>"><?php echo ucfirst($container->status); ?></span></td></tr>

					<tr>
							<th>Load</th>
							<td><span class="<?php echo $load1style; ?>"><?php echo $container->load_average; ?></span> <span class="<?php echo $load5style; ?>"><?php echo $container->load_average_5; ?></span> <span class="<?php echo $load15style; ?>"><?php echo $container->load_average_15; ?></span></td>
					</tr>

					<tr>
							<th>Memory</th>
							<td>
									<div class="progress">
											<span><?php echo $container->memory_used; ?> MB / <?php echo $container->memory_guaranteed; ?> MB</span>
											<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $container->memory_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $container->memory_guaranteed; ?>" style="width: <?php echo max((($container->memory_used / $container->memory_guaranteed) * 100), 1); ?>%"></div>
									</div>
							</td>
					</tr>

					<tr>
							<th>Disk</th>
							<td>
									<div class="progress">
											<span><?php echo byte_format($container->disk_used * 1024 * 1024).' / '.$container->disk_size; ?> GB</span>
											<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ($container->disk_used * 1024 * 1024); ?>" aria-valuemin="0" aria-valuemax="<?php echo $container->disk_size; ?>" style="width:<?php echo max((($container->disk_used/1024 / $container->disk_size) * 100), 1); ?>%"></div>
									</div>
							</td>
					</tr>
					
					<tr>
							<th>Bandwidth</th>
							<td>
									<div class="progress">
											<span><?php echo byte_format($container->bandwidth_total).' / '.$container->bandwidth_allowed ;?> GB</span>
											<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $container->bandwidth_total; ?>" aria-valuemin="0" aria-valuemax="<?php echo ($container->bandwidth_allowed*1024*1024*1024); ?>" style="width: <?php echo min(100, max((($container->bandwidth_total / ($container->bandwidth_allowed*1024*1024*1024)) * 100), 1)); ?>%"></div>
									</div>
							</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">Server Details</div>
			<div class="panel-body">
					<table class="table table-condensed table-unstyled table-fixed">
					<?php
					echo '<tr><th>IP Address</th><td>'.long2ip($container->ip_address).'</td></tr>
							<tr><th>Node</th><td> <a href="/node/'.$node->id.'">'.$node->node_name.'</a></td></tr>
							<tr><th>Location</th><td>'.$node->location_name.'</td></tr>';

					if ($this->ion_auth->is_admin() === TRUE) {
							echo '<tr><th>Owner</th><td><a href="/profile/edit/'.$owner->id.'"> '.$owner->first_name.' '.$owner->last_name.'</a> (<a href="mailto:'.$owner->email.'">'.$owner->email.'</a>)</td></tr>';
							echo '<tr><th>ctid</th><td>'.$container->ctid.'</td></tr>';
							if ($container->vserverid != $container->ctid) echo '<tr><th>vserverid</th><td>'.$container->vserverid.'</td></tr>';
                                                        if ($container->legacyid != 0) echo '<tr><th>legacyid</th><td>'.$container->legacyid.'</td></tr>';
					}
					echo '</table>';
					?>
			</div>
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Power Options</div>
			<div class="panel-body">
				<ul id="power-options" class="list-inline">
						<li class="button"><a href="#" data-toggle="modal" data-target="#reboot"><span><i class="fa fa-refresh fa-2x"></i><br />Reboot</span></a></li>
						<li class="button"><a href="#" data-toggle="modal" data-target="#shutdown"><span><i class="fa fa-power-off fa-2x"></i><br />Shut Down</span></a></li>
						<li class="button"><a href="#" data-toggle="modal" data-target="#boot"><span><i class="fa fa-play-circle fa-2x"></i><br />Boot</span></a></li>
						<li class="button"><a href="#" data-toggle="modal" data-target="#poweroff"><span><i class="fa fa-plug fa-2x"></i><br />Power Off</span></a></li>
				</ul>
					
				<div class="modal fade" id="reboot" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="rebootLabel">Reboot</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to reboot this server?</p>
							</div>
							<div class="modal-footer">
								<?php echo form_open('server/reboot/'.$container->ctid); ?>
								<input class="btn btn-danger" name="reboot" value="Reboot" type="submit" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
					
				<div class="modal fade" id="shutdown" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="shutdownLabel">Shutdown</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to shut down this server?</p>
							</div>
							<div class="modal-footer">
								<?php echo form_open('server/shutdown/'.$container->ctid); ?>
								<input class="btn btn-danger" name="shutdown" value="Shutdown" type="submit" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
					
				<div class="modal fade" id="boot" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="bootLabel">Boot</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to boot this server?</p>
							</div>
							<div class="modal-footer">
								<?php echo form_open('server/boot/'.$container->ctid); ?>
								<input class="btn btn-danger" name="boot" value="Boot" type="submit" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
					
				<div class="modal fade" id="poweroff" tabindex="-1" role="dialog" aria-labelledby="poweroffLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="bootLabel">Power Off</h4>
							</div>
							<div class="modal-body">
								<div class="alert alert-danger"><b>Warning!</b> This is the equivalent of unplugging the power cord on a physical server.  Improper shutdowns can cause data loss!</div>
								<p>Are you sure you want to power off this server?</p>
							</div>
							<div class="modal-footer">
								<?php echo form_open('server/poweroff/'.$container->ctid); ?>
								<input class="btn btn-danger" name="poweroff" value="Power Off" type="submit" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">System Options</div>
			<div class="panel-body">
				<ul id="system-options" class="list-inline">
					<?php echo '
						<li class="button"><a href="/server/reinstall/'.$container->ctid.'"><span><i class="fa fa-download fa-2x"></i><br />Reinstall</span></a></li>
						
						<li class="button"><a href="/server/ipaddresses/'.$container->ctid.'"><span><i class="fa fa-globe fa-2x"></i><br />IP Addresses</span></a></li>
						
						<li class="button"><a href="/server/monitoring/'.$container->ctid.'" data-toggle="modal" data-target="#monitoring-modal"><span><i class="fa fa-heartbeat fa-2x"></i><br />Monitoring</a><div id="monitoring-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></li>
						
						<li class="button"><a href="/server/logs/'.$container->ctid.'"><span><i class="fa fa-file-text-o fa-2x"></i><br />Logs</span></a></li>';
						?>
				</ul>
				
			</div>
		</div>
	</div>
	
</div>

<?php if ($this->ion_auth->is_admin()): ?>

<div class="row">
	<div class="col-xs-12">
		
		<div class="panel panel-default">
			<div class="panel-heading">Admin Options</div>
			<div class="panel-body">
				
						<ul id="admin-options" class="list-inline"> 
						
						<?php if ($container->suspended == 1): ?>
							<li class="button"><a href="/server/unsuspend/<?php echo $container->ctid; ?>" data-toggle="modal" data-target="#unsuspend-modal"><span><i class="fa fa-play fa-2x"></i><br />Unsuspend</a></li>
						<?php else: ?>
							<li class="button"><a href="/server/suspend/<?php echo $container->ctid; ?>" data-toggle="modal" data-target="#suspend-modal"><span><i class="fa fa-pause fa-2x"></i><br />Suspend</a></li>
						<?php endif; ?>
						
							<li class="button"><a data-toggle="modal" data-target="#edit-modal" href="/server/edit/<?php echo $container->ctid; ?>"><span><i class="fa fa-wrench fa-2x"></i><br />Edit</span></a></li>
					
							<li class="button"><a href="/server/change_owner/<?php echo $container->ctid; ?>" data-toggle="modal" data-target="#owner-modal"><span><i class="fa fa-user fa-2x"></i><br />Change Owner</a></li>
							
							<li class="button"><a href="#" data-toggle="modal" data-target="#info-modal"><span><i class="fa fa-paper-plane-o fa-2x"></i><br />Resend VM Info</a></li>
							
					
							<li class="button"><a data-toggle="modal" data-target="#xml-modal" href="/libkvm/editxml/<?php echo $container->ctid; ?>"><span><i class="fa fa-pencil fa-2x"></i><br />Edit XML</span></a></li>

							<li class="button"><a href="/server/migrate/<?php echo $container->ctid; ?>" data-toggle="modal" data-target="#migrate-modal"><span><i class="fa fa-road fa-2x"></i><br />Migrate</a></li>
                                                        
                                                        <li class="button"><a href="#" data-toggle="modal" data-target="#resetbw-modal"><span><i class="fa fa-refresh fa-2x"></i><br />Reset Bandwidth</a></li>
                                                        
                                                        <li class="button"><a href="#" data-toggle="modal" data-target="#mac-modal"><span><i class="fa fa-map-marker fa-2x"></i><br />Set MAC Address</a></li>
							
							<li class="button"><a href="/server/destroy/<?php echo $container->ctid; ?>" data-toggle="modal" data-target="#destroy-modal"><span><i class="fa fa-trash fa-2x"></i><br />Destroy</a></li>
						</ul>
				
				<!-- ADMIN MODALS -->
				<div id="unsuspend-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
				<div id="suspend-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
				<div id="destroy-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
				<div id="owner-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
				<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
				<div id="xml-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
				<div id="migrate-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
				
				<div id="info-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
						<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Resend VM Info</h4></div>
							<div class="modal-body"><p>Are you sure you want to resend the VM info email to the VM owner?</p></div>
							<div class="modal-footer">
								<a href="/server/resend_info/<?php echo $container->ctid; ?>" class="btn btn-primary">Resend Info</a> 
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div></div></div>
				</div>
                                
				<div id="resetbw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
					<div class="modal-dialog">
                                                <div class="modal-content">
                                                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Reset Bandwidth</h4>
                                                        </div>
                                                        <div class="modal-body"><p>You are about to reset the bandwidth for this VM.  Are you sure you want to proceed?</p></div>
                                                        <div class="modal-footer">
								<a href="/server/resetbw/<?php echo $container->ctid; ?>" class="btn btn-primary">Reset Bandwidth</a> 
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                </div>
                                        </div>
				</div>
                                
                                
                                        
                                        
                                <?php if ($this->ion_auth->is_admin()): ?>
				<div id="vdisk-del-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
					<div class="modal-dialog">
                                                <div class="modal-content">
                                                <?php echo form_open('/libkvm/edit/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                                        <input type="hidden" name="vdisks" value="" id="vdisk-del-vdisks" />
                                                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Delete Virtual Disk</h4>
                                                        </div>
                                                        <div class="modal-body"><p>Are you certain you want to delete the virtual disk <span></span>?</p></div>
                                                        <div class="modal-footer">
                                                                <button class="btn btn-danger" name='vdisks_del' id='vdisks_del' value="delete">Delete Selected Disk</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                <?php echo form_close(); ?>        
                                                </div>
                                        </div>
				</div>
                                <?php endif; ?>
                                
				<div id="mac-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
					<div class="modal-dialog">
                                                <div class="modal-content">
                                                        <?php echo form_open('server/set_mac/'.$container->ctid); ?>
                                                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Manually Set MAC</h4>
                                                        </div>

                                                        <div class="modal-footer">
                                                                
<p class="alert alert-warning"><strong>Note:</strong> To successfully change the MAC address, you should power off the VM first.  After the MAC address has been updated, you may boot the VM to see the changes.</p>
                                                                
                                                                <div class="form-group">
                                                                        <div class="col-md-12">
<?php                                                                                
$data = array(
              'name'        => 'mac',
              'value'       => $container->mac,
              'maxlength'   => '17',
              'size'        => '17',
              'class'       => 'form-control',
            );

echo form_input($data);
?>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <div class="form-group">
                                                                <div class="col-md-12">
        								<input class="btn btn-danger" name="save" value="Save" type="submit" />
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                                </div>
                                                        </div>
                                                        <?php echo form_close(); ?>
                                                </div>
                                        </div>
				</div>

                                
				<!-- ADMIN MODALS -->
			
			</div>
		</div>
        
	</div>
</div>

<?php endif; ?>

<div class="row">
	<div class="col-xs-12">

		<?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
	
		<div role="tabpanel">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist" id="vmtabs">
                                <li class="active"><a href="#tsettings" data-toggle="tab">Settings</a></li>
                                <!--
				<?php if ($this->ion_auth->is_admin()): ?>
				<li><a href="#tbandwidth"  data-toggle="tab">Bandwidth</a></li>
                                <li><a href="#tcpuset"  data-toggle="tab">CPU Tuning</a></li>
        			<?php endif; ?>
                                -->                        
        			<li><a href="#trootpass"  data-toggle="tab">Root Password</a></li>
        			<li><a href="#tdisks"  data-toggle="tab">Disks</a></li>
        			<li><a href="#tconsole" data-toggle="tab">Console</a></li>
        			<li><a href="#tsnapshots" data-toggle="tab">Snapshots</a></li>
        			<li><a href="#tnotes" data-toggle="tab">Notes</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="tsettings">
					<?php echo form_open('/libkvm/edit/'.$container->ctid, array('class' => 'form-horizontal')); ?>
					
                                        
						<div class="col-md-6">
							<div class="form-group">
								<label for="apic" class="col-md-2 control-label">APIC</label>
								<div class="col-md-10">
									<?php echo form_checkbox('kvm_apic', '1', $container->kvm_apic, 'class="switch form-control"'); ?>
								</div>
							</div>
						
							<div class="form-group">
								<label for="acpi" class="col-md-2 control-label">ACPI</label>
								<div class="col-md-10">
									<?php echo form_checkbox('kvm_acpi', '1', $container->kvm_acpi, 'class="form-control switch"'); ?>
								</div>
							</div>
						
							<div class="form-group">
								<label for="pae" class="col-md-2 control-label">PAE</label>
								<div class="col-md-10">
									<?php echo form_checkbox('kvm_pae', '1', $container->kvm_pae, 'class="form-control switch"'); ?>
								</div>
							</div>
						
							<script type="text/javascript">$(function() {$('.switch').bootstrapSwitch();});</script>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="bootorder" class="col-md-2 control-label">Boot Order</label>
								<div class="col-md-10">
									<?php echo form_dropdown('kvm_bootorder', $boot_options, $container->kvm_bootorder, 'class="form-control selectpicker"'); ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="disk_type" class="col-md-2 control-label">Disk Type</label>
								<div class="col-md-10">
									<?php echo form_dropdown('kvm_disk_type', $disk_options, $container->kvm_disk_type, 'class="form-control selectpicker"'); ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="nic_type" class="col-md-2 control-label">NIC Type</label>
								<div class="col-md-10">
									<?php echo form_dropdown('kvm_nic_type', $nic_options, $container->kvm_nic_type, 'class="form-control selectpicker"'); ?>
								</div>
							</div>
							
						</div>
						
                                                <div>						
						<input class="btn btn-primary btn-center" type="submit" name="save" value="Save" />
                                                </div>
						
					<?php echo form_close(); ?>
					
				</div>
                                
                                <!-- Not implemented yet
				<?php if ($this->ion_auth->is_admin()): ?>
				
				<div role="tabpanel" class="tab-pane" id="tbandwidth">
					<form class="form-horizontal">
					
						<div class="form-group">
							<label for="netspeed" class="col-md-3 control-label">Port Speed Limit</label>
							<div class="col-md-9">
								<div class="input-group">
									<input type="text" class="form-control" id="netspeed" value="" />
									<span class="input-group-addon">MB/s</span>
								</div>									
							</div>
						</div>
						
						<div class="form-group">
							<label for="bwlimit" class="col-md-3 control-label">Bandwidth Limit</label>
							<div class="col-md-9">
								<div class="input-group">
									<input type="text" id="bwlimit" name="bwlimit" class="form-control" />
									<span class="input-group-addon">GB</span>
								</div>
							</div>
						</div>
							
						<div class="form-group">
							<label for="oversuspend" class="col-md-3 control-label">Auto Suspend</label>
							<div class="col-md-9">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="oversuspend" value="oversuspend" checked="checked" class="switch" />
										<p class="help-block">Automatically suspend the VM it has reached the bandwidth limit set above.</p>
									</label>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="resetresume" class="col-md-3 control-label">Auto Resume</label>
							<div class="col-md-9">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="resetresume" value="resetresume" checked="checked" class="switch" />
										<p class="help-block">Automatically resume the VM when the bandwidth limit is reset or increased.</p>
									</label>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="resetdate" class="col-md-3 control-label">Reset Date</label>
							<div class="col-md-9">
									<input type="text" id="resetdate" name="resetdate" class="form-control" />
									<p class="help-block">What day of the week is bandwidth limit reset.</p>
							</div>
						</div>
						
						<div class="text-center">
							<input type="submit" class="btn btn-primary" value="Save" />
						</div>
					</form>
					
				</div>
				<div role="tabpanel" class="tab-pane" id="tcpuset">
				
					<form class="form-horizontal">
					
						<div class="form-group">
							<label for="cputuning" class="col-md-3 control-label">CPU Tuning</label>
							<div class="col-md-9">
									<textarea class="form-control" id="cputuning" rows="18">
<cputune>
	<vcpupin vcpu="0" cpuset="1-4,^2"/>
	<vcpupin vcpu="1" cpuset="0,1"/>
	<vcpupin vcpu="2" cpuset="2,3"/>
	<vcpupin vcpu="3" cpuset="0,4"/>
	<emulatorpin cpuset="1-3"/>
	<iothreadpin iothread="1" cpuset="5,6"/>
	<iothreadpin iothread="2" cpuset="7,8"/>
	<shares>2048</shares>
	<period>1000000</period>
	<quota>-1</quota>
	<emulator_period>1000000</emulator_period>
	<emulator_quota>-1</emulator_quota>
	<vcpusched vcpus='0-4,^3' scheduler='fifo' priority='1'/>
	<iothreadsched iothreads='2' scheduler='batch'/>
</cputune></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="cpusavereboot" class="col-md-3 control-label">Apply and Reboot</label>
							<div class="col-md-9">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="cpusavereboot" class="switch" value="cpusavereboot" />
									</label>
								</div>
							</div>
						</div>
						
						<div class="text-center">
							<input type="submit" class="btn btn-primary" value="Save" />
						</div>
					</form>
					
				</div>
				<?php endif; ?>
                                -->
                                
                                
				<div role="tabpanel" class="tab-pane" id="trootpass">
				
					<div class="alert alert-warning"><strong>Warning:</strong> This function attempts to reset the root password on Linux VPS servers using the standard partition layout with filesystem on sda1.  Your server will be shut down, the password change attempted, and the server booted again. This process could take up to 5 minutes to complete. <br><br>
					This function will not work on BSD or Windows based servers. Consult your operating system's documentation for instructions on resetting the administrator or root password.</div>
					
					<?php echo '<p class="text-center"><a class="btn btn-primary" data-toggle="modal" data-target="#rootpw-modal" href="/server/rootpassword/'.$container->ctid.'"><span><i class="fa fa-lock fa-2x"></i><br />Reset Root Password</span></a></p>'; ?>
					
					<div id="rootpw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
						
				</div>
				<div role="tabpanel" class="tab-pane" id="tdisks">
                                                                                
					<?php echo form_open('/libkvm/edit/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                        <!--
                                        <?php if ($this->ion_auth->is_admin()): ?>
                                                
                                        <?php if (count($vdisks) > 0): ?>
                                        <div class="form-group">
                                                <label for="vdisks" class="col-md-2 control-label">Manage Virtual Disks</label>
                                                <div class="col-md-10">
                                                        <?php echo form_dropdown('vdisks', $vdisks, '', 'class="form-control vdisks"') ?>
                                                </div>
                                        </div>
                                        <div style="margin:0 0 20px 0;">
                                        <button data-toggle="modal" data-target="#vdisk-del-modal" class="btn btn-danger btn-center" id="vdisk-delete">Delete Disk</button>
                                        
                                        <script>
                                                $(document).ready(function() {
                                                        var ma = $("#vdisk-del-modal");
                                                        ma.on('shown.bs.modal', function (e) {
                                                                var se = $("#tdisks select.vdisks");
                                                                $(".modal-body span", ma).html(se.val());
                                                                $("#vdisk-del-vdisks").val(se.val());
                                                        });
                                                });
                                        </script>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <div class="form-group">
                                                <label for="vdisks_size" class="col-md-2 control-label">Add Virtual Disk:</label>
                                                <div class="col-md-10">
                                                        <div class="input-group">
                                                                <?php echo form_input('vdisks_size', '10', 'class="form-control"') ?><span class="input-group-addon">GB</span>
                                                        </div>
						</div>
					</div>
                                        <div style="margin:0 0 20px 0;">
                                        <button class="btn btn-danger btn-center" name='vdisks_add' id='vdisks_add' value="add">Add New Disk</button>
                                        </div>                                        
                                        <?php endif; ?>
                                        -->
						
						<?php echo ($container->template_file > '' ?
						'<div class="form-group">
							<label for="iso" class="col-md-2 control-label">VPS Template</label>
							<div class="col-md-10"><p class="form-control-static">'.$container->template_file.'</p></div>
						</div>' : '') ?>

						<div class="form-group">
							<label for="iso" class="col-md-2 control-label">CD ROM</label>
							<div class="col-md-10">
									<?php echo form_dropdown('kvm_iso', $iso_options, $selected_iso, 'class="form-control selectpicker" data-live-search="true"'); ?>
							</div>
						</div>
						
						<input class="btn btn-primary btn-center" type="submit" name="save" value="Save Options" />
					<?php echo form_close(); ?>
				
				</div>
				
				<div role="tabpanel" class="tab-pane" id="tconsole">
					
					<div class="col-sm-6">
						<p><a class="btn btn-primary" id="kvm-console" href="/libkvm/console/<?php echo $container->ctid; ?>">Launch NoVNC Console</a></p>
						
						<p><a class="btn btn-success" id="jkvm-console" href="/libkvm/javaconsole/<?php echo $container->ctid; ?>">Launch Java Console</a></p>
						
						<p><a data-toggle="modal" data-target="#consolepw-modal" class="btn btn-warning" href="/libkvm/vncpassword/<?php echo $container->ctid; ?>">Reset Console Password</a></p>
					</div>
					
					<div class="col-sm-6">
						<br class="visible-xs-block" />
						<h4>Connection Details</h4>
						<p><strong>VNC Address</strong>: <?php echo long2ip($node->ip_address); ?></p>
						<p><strong>Port</strong>: <?php echo $container->kvm_vnc_port; ?></p>
                                                <?php if ($this->ion_auth->is_admin() === TRUE) echo '<p><strong>Password</strong>: '.$container->kvm_password.'</p>'; ?>
					 </div>
						<div id="consolepw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
						
						<script type="text/javascript">$("#kvm-console").click(function(e) { e.preventDefault();
							window.open($(this).attr('href'), 'popUpWindow', 'height=635,width=720,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no') });
						</script>
						
						<script type="text/javascript">$("#jkvm-console").click(function(e) { e.preventDefault();
							window.open($(this).attr('href'), 'popUpWindow', 'height=350,width=350,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no') });
						</script>
							
						<div class="clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane" id="tsnapshots">
				
					<p>You have used <?php echo count($snapshots); ?> of <?php echo (intval($this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']) != 0 ? $this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS'] : 0) ?> snapshot<?php echo (intval($this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']) == 1 ? '' : 's') ?> allowed.</p>
								
					<table class="table table-bordered table-striped table-condensed">
						<thead>
							<tr><th>Snapshot Name</th><th>Snapshot Date</th><th></th></tr>
						</thead>
						<tbody>
							<?php foreach($snapshots as $snapshot) {
								echo '
									<tr>
										<td>'.html_entity_decode($snapshot->snapshot_description).($snapshot->snapshot_stashed == 1 ? ' (Stashed)': '').'</td>
										<td>'.date('M d, Y g:ia', gmt_to_local($snapshot->snapshot_time, $this->ion_auth->user()->row()->timezone)).'</td>
										<td>
											<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#restore-snap-'.$snapshot->snapshot_id.'" href="/server/snapshots/'.$ctid.'/restore/'.$snapshot->snapshot_id.'">Restore</a>
											<div id="restore-snap-'.$snapshot->snapshot_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
											<a class="btn btn-sm btn-danger" href="/server/snapshots/'.$container->ctid.'/delete/'.$snapshot->snapshot_id.'" data-toggle="modal" data-target="#delete-snap-'.$snapshot->snapshot_id.'" >Delete</a>
											<div id="delete-snap-'.$snapshot->snapshot_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
											'.(isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none' ? ' <a class="btn btn-sm btn-warning" href="/server/snapshots/'.$ctid.'/stash/'.$snapshot->snapshot_id.'" data-toggle="modal" data-target="#stash-snap-'.$snapshot->snapshot_id.'" >Stash</a><div id="stash-snap-'.$snapshot->snapshot_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>' : '').'
										</td>
									</tr>';
								}
							?>
						</tbody>
					</table>
										
					<?php
						if (isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none') {
							$this->load->view('error', array('type' => 'info', 'message' => 'Clicking "Stash" next to a snapshot will store it on our off-site backup server.  Stashed snapshots are only intended for recovery in worst-case scenario situations.  Therefore, they can only be restored by our staff.  You may stash one snapshot for each VM - when you stash a new snapshot, it will automatically overwrite your previous stashed snapshot. Your most recently stashed snapshot will be marked "Stashed" below. <br /><br /><b>Note:</b> You may stash one snapshot for each VM every '.$this->ion_auth->hgsettings['STASH_MIN_DAYS'].' days.'.($container->stash_time > (time() - ($this->ion_auth->hgsettings['STASH_MIN_DAYS']*86400)) ? ' You may stash a new snapshot for this VM at '.date('M d, Y g:ia', gmt_to_local($container->stash_time + ($this->ion_auth->hgsettings['STASH_MIN_DAYS'] * 86400), $this->ion_auth->user()->row()->timezone)).'.' : '')));
						}
					?>
										
					<?php if (count($snapshots) < $this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']): ?>
							<a href="#" data-toggle="modal" data-target="#snapshot-modal" class="btn btn-success">Create Snapshot</a>
							<div id="snapshot-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<?php echo form_open('server/snapshots/'.$container->ctid.'/create', 'class="form-horizontal"'); ?>
										
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Create Snapshot</h4>
										</div>
										
										<div class="modal-body">
											<div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
													<label for="name" class="col-md-3 control-label">Name:</label>
													<div class="col-md-7">
															<?php echo form_input('snapshot-name', set_value('snapshot-name'), 'class="form-control"'); ?>
													</div>
											</div>
										</div>
										
										<div class="modal-footer">
											<input type="submit" class="btn btn-primary" name="submit" value="Create Snapshot" />
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										</div>
										
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>
					<?php endif; ?>
					
				</div>
				<div role="tabpanel" class="tab-pane" id="tnotes">
					<?php echo form_open('/libkvm/edit/'.$container->ctid, array('class' => '')); ?>
                                                <div class="form-group">
                                                	<?php echo form_textarea('group_name', html_entity_decode($container->group_name), 'class="form-control"'); ?>
                                                </div>
						
						<div>
                                                	<input class="btn btn-primary btn-center" type="submit" name="save" value="Save Notes" />
                                                </div>
					<?php echo form_close(); ?>
					
				</div>
			</div>

		</div>
		
		
	</div>
</div>


<script type="text/javascript">
    $('#vmtabs a').click(function (e) {e.preventDefault();$(this).tab('show');});
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {var id = $(e.target).attr("href").substr(1);window.location.hash = id;});
    var hash = window.location.hash; $('#vmtabs a[href="' + hash + '"]').tab('show');
</script>
