<div class="col-xs-12">
        <div class="panel panel-default">
                <div class="panel-heading">Add Plan</div>
                <div class="panel-body">

                        <?php echo form_open('plan/add', array('class' => 'form-horizontal')); ?>
					<div class="col-md-6">
                        <div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">Plan Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('name', set_value('name'), 'class="form-control"') ?>
                                        <?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
        
                        <div class="form-group<?php echo (my_form_error('hypervisor') != FALSE ? ' has-error' : ''); ?>">
                                <label for="hypervisor" class="col-md-4 control-label">Hypervisor:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('hypervisor', $hypervisors, set_value('hypervisor','kvm'), 'id="hypervisor" class="form-control"'); ?>
                                        <?php echo my_form_error('hypervisor', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('cpus') != FALSE ? ' has-error' : ''); ?>">
                                <label for="cpus" class="col-md-4 control-label">CPUs:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('cpus', set_value('cpus'), 'class="form-control"') ?>
                                        <?php echo my_form_error('cpus', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
        
                        <div class="form-group<?php echo (my_form_error('guaranteed') != FALSE ? ' has-error' : ''); ?>">
                                <label for="guaranteed" class="col-md-4 control-label">Guaranteed RAM:</label>
                                <div class="col-md-8">
                                        <div class="input-group">
                                                <?php echo form_input('guaranteed', set_value('guaranteed'), 'class="form-control"') ?><span class="input-group-addon">MB</span>
                                        </div>
                                        <?php echo my_form_error('guaranteed', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div id="burst-input" class="form-group<?php echo (my_form_error('burst') != FALSE ? ' has-error' : ''); ?>"<?php if ($this->input->post('hypervisor') == 2 || $this->input->post('hypervisor') === false) { echo ' style="display: none"'; }  ?>>
                                <label for="burst" class="col-md-4 control-label">Burst RAM/SWAP:</label>
                                <div class="col-md-8">
                                        <div class="input-group">
                                                <?php echo form_input('burst', set_value('burst'), 'class="form-control"') ?><span class="input-group-addon">MB</span>
                                        </div>
                                        <?php echo my_form_error('burst', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('disk') != FALSE ? ' has-error' : ''); ?>">
                                <label for="disk" class="col-md-4 control-label">Disk Space:</label>
                                <div class="col-md-8">
                                        <div class="input-group">
                                                <?php echo form_input('disk', set_value('disk'), 'class="form-control"') ?><span class="input-group-addon">GB</span>
                                        </div>
                                        <?php echo my_form_error('disk', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('transfer') != FALSE ? ' has-error' : ''); ?>">
                                <label for="transfer" class="col-md-4 control-label">Network Transfer:</label>
                                <div class="col-md-8">
                                        <div class="input-group">
                                                <?php echo form_input('transfer', set_value('transfer'), 'class="form-control"') ?><span class="input-group-addon">GB</span>
                                        </div>
                                        <?php echo my_form_error('transfer', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('ipv4') != FALSE ? ' has-error' : ''); ?>">
                                <label for="ipv4" class="col-md-4 control-label">IPv4 Addresses:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ipv4', set_value('ipv4'), 'class="form-control"') ?>
                                        <?php echo my_form_error('ipv4', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('ipv6') != FALSE ? ' has-error' : ''); ?>">
                                <label for="ipv6" class="col-md-4 control-label">IPv6 Blocks:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ipv6', set_value('ipv6'), 'class="form-control"') ?>
                                        <?php echo my_form_error('ipv6', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
					

                        <script type="text/javascript">
                                $('#hypervisor').change(function() {
                                        if ($('#hypervisor option:selected').text() == "KVM") {
                                                $('#burst-input').slideUp(800);
                                        } else {
                                                $('#burst-input').slideDown(800);
                                        }
                                });
                        </script>
					</div>
					<div class="col-md-6">

                        <div class="form-group<?php echo (my_form_error('post-create') != FALSE ? ' has-error' : ''); ?>">
                                <label for="post-create" class="col-md-4 control-label">Post-Create Script:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('post-create', $postcreate_scripts, set_value('post-create'), 'class="form-control"') ?>
                                        <?php echo my_form_error('post-create', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('pre-boot') != FALSE ? ' has-error' : ''); ?>">
                                <label for="pre-boot" class="col-md-4 control-label">Pre-Boot Script:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('pre-boot', $preboot_scripts, set_value('pre-boot'), 'class="form-control"') ?>
                                        <?php echo my_form_error('pre-boot', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('post-boot') != FALSE ? ' has-error' : ''); ?>">
                                <label for="post-boot" class="col-md-4 control-label">Post-Boot Script:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('post-boot', $postboot_scripts, set_value('post-boot'), 'class="form-control"') ?>
                                        <?php echo my_form_error('post-boot', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('pre-shutdown') != FALSE ? ' has-error' : ''); ?>">
                                <label for="pre-shutdown" class="col-md-4 control-label">Pre-Shutdown Script:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('pre-shutdown', $preshutdown_scripts, set_value('pre-shutdown'), 'class="form-control"') ?>
                                        <?php echo my_form_error('pre-shutdown', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('post-shutdown') != FALSE ? ' has-error' : ''); ?>">
                                <label for="post-shutdown" class="col-md-4 control-label">Post-Shutdown Script:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('post-shutdown', $postshutdown_scripts, set_value('post-shutdown'), 'class="form-control"') ?>
                                        <?php echo my_form_error('post-shutdown', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('pre-destroy') != FALSE ? ' has-error' : ''); ?>">
                                <label for="pre-destroy" class="col-md-4 control-label">Pre-Destroy Script:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('pre-destroy', $predestroy_scripts, set_value('pre-destroy'), 'class="form-control"') ?>
                                        <?php echo my_form_error('pre-destroy', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('post-destroy') != FALSE ? ' has-error' : ''); ?>">
                                <label for="post-destroy" class="col-md-4 control-label">Post-Destroy Script:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('post-destroy', $postdestroy_scripts, set_value('post-destroy'), 'class="form-control"') ?>
                                        <?php echo my_form_error('post-destroy', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
					</div>
                        
                        <div class="form-group">
                                <label for="" class="col-md-3 control-label"></label>
                                <div class="col-md-3">
                                        <p class="form-control-static">Warning</p>
                                </div>
                                <div class="col-md-3">
                                        <p class="form-control-static">Critical</p>
                                </div>
                                <div class="clearfix"></div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('ram-warning') != FALSE || my_form_error('ram-critical') != FALSE ? ' has-error' : ''); ?>">
                                <label for="" class="col-md-3 control-label">Memory Usage</label>
                                <div class="col-md-3">
                                        <div class="input-group"><?php echo form_input('ram-warning', $plan->ram_warning, 'class="form-control"'); ?><span class="input-group-addon">MB</span></div>
                                        <?php echo my_form_error('ram-warning', '<span class="help-block">', '</span>'); ?>
                                </div>
                                <div class="col-md-3">
                                        <div class="input-group"><?php echo form_input('ram-critical', $plan->ram_critical, 'class="form-control" '); ?><span class="input-group-addon">MB</span></div>
                                        <?php echo my_form_error('ram-critical', '<span class="help-block">', '</span>'); ?>
                                </div>
                                <div class="clearfix"></div>

                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('load-warning') != FALSE || my_form_error('load-critical') != FALSE ? ' has-error' : ''); ?>">
                                <label for="" class="col-md-3 control-label">Load Average</label>
                                <div class="col-md-3">
                                        <?php echo form_input('load-warning', $plan->load_warning, 'class="form-control"'); ?>
                                        <?php echo my_form_error('load-warning', '<span class="help-block">', '</span>'); ?>
                                </div>
                                <div class="col-md-3">
                                        <?php echo form_input('load-critical', $plan->load_critical, 'class="form-control"'); ?>
                                        <?php echo my_form_error('load-critical', '<span class="help-block">', '</span>'); ?>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('disk-warning') != FALSE || my_form_error('disk-critical') != FALSE ? ' has-error' : ''); ?>">
                                <label for="" class="col-md-3 control-label">Disk Usage</label>
                                <div class="col-md-3">
                                        <div class="input-group"><?php echo form_input('disk-warning', $plan->disk_warning, 'class="form-control"'); ?><span class="input-group-addon">%</span></div>
                                        <?php echo my_form_error('disk-warning', '<span class="help-block">', '</span>'); ?>
                                </div>
                                <div class="col-md-3">
                                        <div class="input-group"><?php echo form_input('disk-critical', $plan->disk_critical, 'class="form-control"'); ?><span class="input-group-addon">%</span></div>
                                        <?php echo my_form_error('disk-critical', '<span class="help-block">', '</span>'); ?>
                                </div>
                                <div class="clearfix"></div>
                        </div>
						
						<input class="btn btn-primary center-block" type="submit" name="submit" value="Add Plan" />
						
                </div>
        </div>
</div>