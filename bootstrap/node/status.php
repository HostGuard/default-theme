	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Node Overview <small><?php echo $node->name; ?></small></h2>
		</div>
		
		<?php
			if (count($alerts) > 0) {
					$this->load->view('error', array('type' => 'error-empty', 'message' => '' . count($alerts).' new alerts! <a class="pull-right btn btn-danger btn-xs" href="/alert/index">view all alerts</a>'));
			}
			
			if ($node->load1 > $node->load_critical) {$load1style = 'label label-danger';
			} elseif ($node->load1 > $node->load_warning) {$load1style = 'label label-warning';
			} else {$load1style = 'label label-success';}
			if ($node->load5 > $node->load_critical) {$load5style = 'label label-danger';
			} elseif ($node->load1 > $node->load_warning) {$load5style = 'label label-warning';
			} else {$load5style = 'label label-success';}
			if ($node->load15 > $node->load_critical) {$load15style = 'label label-danger';
			} elseif ($node->load15 > $node->load_warning) {$load15style = 'label label-warning';
			} else {$load15style = 'label label-success';}
			
			$os = array('el5' => 'CentOS 5', 'el6' => 'CentOS 6', 'deb7' => 'Debian 7');
		?>
		
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">Statistics</div>
			<div class="panel-body">
				<table class="table table-condensed container-info">
					<tr>
						<th>Load Average</th>
						<td>
							<span class="<?php echo $load1style; ?>"><?php echo $node->load1; ?></span>
							<span class="<?php echo $load5style; ?>"><?php echo $node->load5; ?></span>
							<span class="<?php echo $load15style; ?>"><?php echo $node->load15; ?></span>
						</td>
					</tr>
					<tr>
						<th>Memory</th>
                        <td>
							<div class="progress" style="max-width: 250px">
								<span><?php echo byte_format($node->memory_used * 1024).' / '.byte_format($node->memory_total * 1024); ?></span>
								
								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $node->memory_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $node->memory_total; ?>" style="width: 
										<?php echo max(($node->memory_used / $node->memory_total * 100), 0); ?>%">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>Disk</th>
						<td>
							<div class="progress" style="max-width: 250px">
									<span><?php echo byte_format($node->disk_used * 1024).' / '.byte_format($node->disk_total * 1024); ?></span>
									<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $node->disk_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $node->disk_total; ?>" style="width: 
											<?php echo max(($node->disk_used / $node->disk_total * 100), 1);?>%">
									</div>
							</div>
							</td>
					</tr>                                
					<tr>
						<th>Uptime</th>
						<td><?php echo elapsed_time($node->uptime); ?></td>
					</tr>
					<tr>
						<th>Network Activity (In/Out)</th>
						<td><?php echo byte_format($node->bytes_in/5); ?>/s - <?php echo byte_format($node->bytes_out/5); ?>/s</td>
					</tr>
				</table>
			</div>
        </div>
	
	</div>
	
	<div class="col-xs-12 col-sm-6">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $node->node_name; ?> <span class="pull-right"><a class="btn btn-primary btn-xs" href="/node/edit/<?php echo $node->id; ?>">Edit Node</a></span></div>
                <div class="panel-body">
                
                
                        <div class="col-md-6">
                                <table class="table table-condensed container-info">
                                        <tr><th style="max-width: 50%">Hostname</th><td><?php echo $node->node_hostname; ?></td></tr>
                                        <tr><th>OS</th><td><?php echo $os[$node->os]; ?></td></tr>
                                        <tr><th>Kernel</th><td></td></tr>
                                </table>
                        </div>
                        <div class="col-md-6">
                                <table class="table table-condensed container-info">
                                        <tr><th style="max-width: 50%">Primary IP</th><td><?php echo long2ip($node->ip_address); ?></td></tr>
                                        <tr><th>Secondary IP</th><td><?php echo long2ip($node->lan_ip_address); ?></td></tr>
                                </table>
                        </div>
                </div>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6">
              
        <?php if ($this->ion_auth->hgsettings['STOCK_POLICY'] == 'node'): ?>
			<div class="panel panel-default">
				<div class="panel-heading">Resources</div>
				<table class="table table-condensed table-striped">
					<thead>
						<tr><th>Virtual Machines</th><th>Memory Allocated</th><th>Disk Allocated</th></tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $node->container_count; ?> / <?php echo $node->max_vm; ?></td>
							<td><?php echo byte_format($node->memory_allocated * 1024 * 1024, ($node->memory_allocated < 1024 ? 0 : 2)); ?> / <?php echo byte_format($node->max_memory_allocated * 1024 * 1024, ($node->max_memory_allocated < 1024 ? 0 : 2)) ?></td>
							<td><?php echo byte_format($node->disk_allocated * 1024 * 1024 * 1024, 0); ?> / <?php echo byte_format($node->max_disk_allocated * 1024 * 1024 * 1024, 0); ?></td>
						</tr>
					</tbody>
				</table>                
			</div>
        <?php else: ?>
			<div class="panel panel-default">
				<div class="panel-heading">Stock</div>
				<div class="panel-body no-pad">
					<table class="table table-condensed table-striped">
						<thead>
							<tr>
									<th>Plan Name</th>
									<th class="hidden-xs">Memory</th>
									<th class="hidden-xs">Disk Space</th>
									<th class="hidden-xs">Bandwidth</th>
									<th class="hidden-xs">CPUs</th>
									<th>Allocated</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($stock as $plan) {
									echo '
									<tr>
											<td>'.$plan->plan_name.'</td>
											<td class="hidden-xs">'.$plan->guaranteed_memory.' MB / '.$plan->burst_memory.' MB</td>
											<td class="hidden-xs">'.$plan->disk.' GB</td>
											<td class="hidden-xs">'.$plan->transfer.' GB</td>
											<td class="hidden-xs">'.$plan->cpus.'</td>
											<td>'.$plan->allocated.' / '.($plan->available == NULL ? $plan->allocated : ($plan->allocated + $plan->available)).'</td>
									</tr>';
								}
							?>
							<tr>
								<td colspan="6">
									<em><strong>Hint:</strong> Use a negative quantity to reduce stock</em>
									<?php echo form_open('node/edit/'.$node->id, array('class' => 'form-inline', 'role' => 'form')); ?>
											<div class="form-group<?php echo (my_form_error('plan') != FALSE ? ' has-error' : ''); ?>">
													<label for="plan">Plan:</label>
													<select name="plan" class="selectpicker" style="width: 250px">
													<?php
															foreach($plans as $plan) {
																	echo '<option value="'.$plan->plan_id.'">'.$plan->plan_name.' ('.$plan->guaranteed_memory.'MB RAM / '.$plan->burst_memory.' BURST / '.$plan->disk.' GB / '.$plan->cpus.' CPU)</option>';
															}
													?>
													</select>
													<?php echo my_form_error('plan', '<span class="help-block">', '</span>'); ?>
											</div>

											<div class="form-group<?php echo (my_form_error('quantity') != FALSE ? ' has-error' : ''); ?>" style="margin: 15px;">
													<label for="quantity">Qty:</label>
													<?php echo form_input('quantity', '', 'class="form-control" style="width: 50px;"'); ?>
													<?php echo my_form_error('quantity', '<span class="help-block">', '</span>'); ?>
											</div>
											
											<input type="submit" name="submit" class="btn btn-default" value="Add Stock" />
									<?php echo form_close(); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
        <?php endif; ?>
	</div>
	<div class="col-xs-12 col-sm-6">
        <div class="panel panel-default">
			<div class="panel-heading">Latest Logs <span class="pull-right"><a class="btn btn-info btn-xs" href="/node/logs/<?php echo $node->id; ?>">View All</a></span></div>
			<div class="panel-scroll">
			<table id="logs-header" class="table table-condensed table-striped">
				<thead>
						<tr><th>Time</th><th>CT</th><th>Type</th><th>Message</th></tr>
				</thead>
				<tbody>
					<?php
						foreach ($logs as $log) {
							echo '<tr><td>'.elapsed_time(time()-$log->log_time, true).' ago</td><td><a href="/server/'.$log->log_container.'">'.$log->log_container.'</a></td><td>'.$log->log_level.'</td><td>'.$log->log_message.'</td></tr>';
						}
					?>
				</tbody>
			</table>
			</div> 
        </div>
</div><!-- End first column -->

<!-- Start second column -->
<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Processes</div>
                <div class="panel-body no-pad">
                        <table id="processes" class="table table-condensed tablesorter">
                                <thead>
                                        <tr><th>PID</th><th>User</th><th>Name</th><th>VIRT</th><th>RES</th></tr>
                                </thead>
                                <tbody>
                        <?php
                                foreach ($processes as $process) {
                                        echo '<tr><td>'.$process->process_pid.'</td><td>'.$process->process_user.'</td><td>'.trim($process->process_name).'</td><td data-value="'.$process->process_virt.'">'.kb_format($process->process_virt, 0, true).'</td><td data-value="'.$process->process_res.'">'.kb_format($process->process_res, 0, true).'</td></tr>';
                                }
                        ?>
                                </tbody>
                        </table>
                </div>
        </div>
        <div class="panel panel-default">
                <div class="panel-heading">Virtual Machines - <?php echo $node->container_count; ?></div>
                <div class="panel-body no-pad">
                
                        <table id="virtual-machines-header" class="table table-condensed table-fixed-header">
                                <tr><th>Status</th><th>Hostname</th><th>User</th></tr>
                        </table>
                        <div style="height: 300px; overflow-y: auto">
                                <table id="virtual-machines-body" class="table table-condensed table-fixed-header-body">
                                        <?php
                                                foreach ($containers as $container) {
                                                        echo '
                                                        <tr>
                                                                <td>'.($container->status == "running" ? '<img src="/themes/bootstrap/img/computer-on.png" />' : '<img src="/themes/bootstrap/img/computer.png" />').'</td>
                                                                <td><a href="/server/'.$container->ctid.'">'.$container->hostname.'</a></td>
                                                                <td>'.$container->first_name.' '.$container->last_name.'</td>
                                                        </tr>';
                                                }
                                        ?>
                                </table>
                        </div>
                        
<?php
                        if (sizeof($containers) > 0 && $containers[0]->virtualization_type == 2)
                        {
echo (
'<div class="col-md-12">
<div class="form-group">
      <a data-toggle="modal" data-target="#kvm_backup_all_xml" class="btn btn-primary" href="/libkvm/backup_all_xml/'.$containers[0]->ctid.'">Backup All KVM XML</a>
      <a data-toggle="modal" data-target="#kvm_restore_all_xml" class="btn btn-warning" href="/libkvm/restore_all_xml/'.$containers[0]->ctid.'">Restore All KVM XML</a>

</div>
</div>');
                        }
                        ?>
                					
				<div class="modal fade" id="kvm_backup_all_xml" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Backup all KVM XML</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to backup all KVM XML for this Node?  This will store the XML dumps in the database.</p>
							</div>
							<div class="modal-footer">
								<a class="btn btn-primary" href="/libkvm/backup_all_xml/<?php echo $containers[0]->ctid ?>">Confirm</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
                                
                					
				<div class="modal fade" id="kvm_restore_all_xml" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Restore all KVM XML</h4>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to restore all KVM XML for this Node?  This will redefine all KVM XML from the XML in the database.  This will fail if a VPS is running, and will automatically start the VPS once restored.</p>
							</div>
							<div class="modal-footer">
								<a class="btn btn-warning" href="/libkvm/restore_all_xml/<?php echo $containers[0]->ctid ?>">Confirm</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
                        
                </div>
        </div>
        <script type="text/javascript">
                $("#processes").tablesorter({
                        widthFixed: false,
                        theme: 'bootstrap',
                        showProcessing: false,
                        headerTemplate : '{content} {icon}',
                        textExtraction: function(node){
                                var cell_value = $(node).text();
                                var sort_value = $(node).data('value');
                                return (sort_value != undefined) ? sort_value : cell_value;
                        },
                        widgets: [ 'uitheme', 'scroller', 'resizable' ],
                        widgetOptions : {
                                scroller_height : 300,
                                scroller_jumpToHeader: true,
                                scroller_barWidth : 17,
                                scroller_idPrefix : 's_',
                                resizable: false,
                                resizable_widths: ['60px', '75px', null, '60px', '60px']
                        }
                });
        </script>    
</div>

