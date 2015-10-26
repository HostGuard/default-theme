<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading">Edit Plan</div>
                <div class="panel-body">

                        <?php echo form_open('plan/edit/'.$plan->plan_id, array('class' => 'form-horizontal')); ?>
						
						<div class="col-md-6">

							<div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
									<label for="name" class="col-md-4 control-label">Plan Name:</label>
									<div class="col-md-8">
											<?php echo form_input('name', $plan->plan_name, 'class="form-control"') ?>
											<?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>
			
							<div class="form-group<?php echo (my_form_error('hypervisor') != FALSE ? ' has-error' : ''); ?>">
									<label for="hypervisor" class="col-md-4 control-label">Hypervisor:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('hypervisor', $hypervisors, $plan->virtualization_type, 'id="hypervisor" class="form-control"'); ?>
											<?php echo my_form_error('hypervisor', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('cpus') != FALSE ? ' has-error' : ''); ?>">
									<label for="cpus" class="col-md-4 control-label">CPUs:</label>
									<div class="col-md-8">
											<?php echo form_input('cpus', $plan->cpus, 'class="form-control"') ?>
											<?php echo my_form_error('cpus', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>
			
							<div class="form-group<?php echo (my_form_error('guaranteed') != FALSE ? ' has-error' : ''); ?>">
									<label for="guaranteed" class="col-md-4 control-label">Guaranteed RAM:</label>
									<div class="col-md-8">
											<div class="input-group">
													<?php echo form_input('guaranteed', $plan->guaranteed_memory, 'class="form-control"') ?><span class="input-group-addon">MB</span>
													<?php echo my_form_error('guaranteed', '<span class="help-block">', '</span>'); ?>
											</div>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('burst') != FALSE ? ' has-error' : ''); ?>">
									<label for="burst" class="col-md-4 control-label">Burst RAM/SWAP:</label>
									<div class="col-md-8">
											<div class="input-group">
													<?php echo form_input('burst', $plan->burst_memory, 'class="form-control"') ?><span class="input-group-addon">MB</span>
													<?php echo my_form_error('burst', '<span class="help-block">', '</span>'); ?>
											</div>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('disk') != FALSE ? ' has-error' : ''); ?>">
									<label for="disk" class="col-md-4 control-label">Disk Space:</label>
									<div class="col-md-8">
											<div class="input-group">
													<?php echo form_input('disk', $plan->disk, 'class="form-control"') ?><span class="input-group-addon">GB</span>
													<?php echo my_form_error('disk', '<span class="help-block">', '</span>'); ?>
											</div>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('transfer') != FALSE ? ' has-error' : ''); ?>">
									<label for="transfer" class="col-md-4 control-label">Network Transfer:</label>
									<div class="col-md-8">
											<div class="input-group">
													<?php echo form_input('transfer', $plan->transfer, 'class="form-control"') ?><span class="input-group-addon">GB</span>
													<?php echo my_form_error('transfer', '<span class="help-block">', '</span>'); ?>
											</div>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('ipv4') != FALSE ? ' has-error' : ''); ?>">
									<label for="ipv4" class="col-md-4 control-label">IPv4 Addresses:</label>
									<div class="col-md-8">
											<?php echo form_input('ipv4', $plan->ipv4, 'class="form-control"') ?>
											<?php echo my_form_error('ipv4', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('ipv6') != FALSE ? ' has-error' : ''); ?>">
									<label for="ipv6" class="col-md-4 control-label">IPv6 Blocks:</label>
									<div class="col-md-8">
											<?php echo form_input('ipv6', $plan->ipv6, 'class="form-control"') ?>
											<?php echo my_form_error('ipv6', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>
						</div>
						<div class="col-md-6">

							<div class="form-group<?php echo (my_form_error('post-create') != FALSE ? ' has-error' : ''); ?>">
									<label for="post-create" class="col-md-4 control-label">Post-Create Script:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('post-create', $postcreate_scripts, $plan->postcreate, 'class="form-control"') ?>
											<?php echo my_form_error('post-create', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>

							
							<div class="form-group<?php echo (my_form_error('pre-boot') != FALSE ? ' has-error' : ''); ?>">
									<label for="pre-boot" class="col-md-4 control-label">Pre-Boot Script:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('pre-boot', $preboot_scripts, $plan->pre_boot, 'class="form-control"') ?>
											<?php echo my_form_error('pre-boot', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('post-boot') != FALSE ? ' has-error' : ''); ?>">
									<label for="post-boot" class="col-md-4 control-label">Post-Boot Script:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('post-boot', $postboot_scripts, $plan->post_boot, 'class="form-control"') ?>
											<?php echo my_form_error('post-boot', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>
							
							<div class="form-group<?php echo (my_form_error('pre-shutdown') != FALSE ? ' has-error' : ''); ?>">
									<label for="pre-shutdown" class="col-md-4 control-label">Pre-Shutdown Script:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('pre-shutdown', $preshutdown_scripts, $plan->pre_shutdown, 'class="form-control"') ?>
											<?php echo my_form_error('pre-shutdown', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('post-shutdown') != FALSE ? ' has-error' : ''); ?>">
									<label for="post-shutdown" class="col-md-4 control-label">Post-Shutdown Script:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('post-shutdown', $postshutdown_scripts, $plan->post_shutdown, 'class="form-control"') ?>
											<?php echo my_form_error('post-shutdown', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>
							
							<div class="form-group<?php echo (my_form_error('pre-destroy') != FALSE ? ' has-error' : ''); ?>">
									<label for="pre-destroy" class="col-md-4 control-label">Pre-Destroy Script:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('pre-destroy', $predestroy_scripts, $plan->pre_destroy, 'class="form-control"') ?>
											<?php echo my_form_error('pre-destroy', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('post-destroy') != FALSE ? ' has-error' : ''); ?>">
									<label for="post-destroy" class="col-md-4 control-label">Post-Destroy Script:</label>
									<div class="col-md-8">
											<?php echo form_dropdown('post-destroy', $postdestroy_scripts, $plan->post_destroy, 'class="form-control"') ?>
											<?php echo my_form_error('post-destroy', '<span class="help-block">', '</span>'); ?>
									</div>
							</div>
						</div>
                        
						<div class="col-md-6">
							<div class="form-group">
									<label for="" class="col-md-4 control-label"></label>
									<div class="col-md-4">
											<p class="form-control-static">Warning</p>
									</div>
									<div class="col-md-4">
											<p class="form-control-static">Critical</p>
									</div>
							</div>

							<div class="form-group<?php echo (my_form_error('ram-warning') != FALSE || my_form_error('ram-critical') != FALSE ? ' has-error' : ''); ?>">
									<label for="" class="col-md-4 control-label">Memory Usage</label>
									<div class="col-md-4">
											<div class="input-group"><?php echo form_input('ram-warning', $plan->ram_warning, 'class="form-control"'); ?><span class="input-group-addon">MB</span></div>
											<?php echo my_form_error('ram-warning', '<span class="help-block">', '</span>'); ?>
									</div>
									<div class="col-md-4">
											<div class="input-group"><?php echo form_input('ram-critical', $plan->ram_critical, 'class="form-control"'); ?><span class="input-group-addon">MB</span></div>
											<?php echo my_form_error('ram-critical', '<span class="help-block">', '</span>'); ?>
									</div>
									
							</div>
							
							<div class="form-group<?php echo (my_form_error('load-warning') != FALSE || my_form_error('load-critical') != FALSE ? ' has-error' : ''); ?>">
									<label for="" class="col-md-4 control-label">Load Average</label>
									<div class="col-md-4">
											<?php echo form_input('load-warning', $plan->load_warning, 'class="form-control"'); ?>
											<?php echo my_form_error('load-warning', '<span class="help-block">', '</span>'); ?>
									</div>
									<div class="col-md-4">
											<?php echo form_input('load-critical', $plan->load_critical, 'class="form-control"'); ?>
											<?php echo my_form_error('load-critical', '<span class="help-block">', '</span>'); ?>
									</div>
									
							</div>
							
							<div class="form-group<?php echo (my_form_error('disk-warning') != FALSE || my_form_error('disk-critical') != FALSE ? ' has-error' : ''); ?>">
									<label for="" class="col-md-4 control-label">Disk Usage</label>
									<div class="col-md-4">
											<div class="input-group"><?php echo form_input('disk-warning', $plan->disk_warning, 'class="form-control"'); ?><span class="input-group-addon">%</span></div>
											<?php echo my_form_error('disk-warning', '<span class="help-block">', '</span>'); ?>
									</div>
									<div class="col-md-4">
											<div class="input-group"><?php echo form_input('disk-critical', $plan->disk_critical, 'class="form-control"'); ?><span class="input-group-addon">%</span></div>
											<?php echo my_form_error('disk-critical', '<span class="help-block">', '</span>'); ?>
									</div>
									
							</div>
						</div>
						
						<input class="btn btn-primary center-block" type="submit" name="submit" value="Save Plan Changes" />
                </div>
        </div>
</div>
