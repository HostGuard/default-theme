<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">

                        <?php echo form_open('server/monitoring/'.$container->ctid, array('class' => 'form-horizontal')); ?>

                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Monitoring Settings</h4>
                        </div>
                        
                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Ping Monitoring:</label>
                                        <div class="col-md-7">
                                                <?php echo form_checkbox('icmp-enabled', '1', $container->icmp_monitoring_enabled, 'class="form-control switch"'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Advanced Monitoring:</label>
                                        <div class="col-md-7">
                                                <?php echo form_checkbox('advanced-enabled', '1', $container->monitoring_enabled, 'class="form-control switch"'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="" class="col-md-3 control-label"></label>
                                        <label for="" class="col-md-3">Warning</label>
                                        <label for="" class="col-md-3">Critical</label>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('load-warning') != FALSE || my_form_error('load-critical') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-3 control-label">Load Avg.</label>
                                        <div class="col-md-3">
                                                <?php echo form_input('load-warning', set_value('load-warning', $container->load_warning), 'class="form-control"'); ?>
                                                <?php echo my_form_error('load-warning', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                                <?php echo form_input('load-critical', set_value('load-critical', $container->load_critical), 'class="form-control"'); ?>
                                                <?php echo my_form_error('load-critical', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('ram-warning') != FALSE || my_form_error('ram-critical') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-3 control-label">Memory Usage</label>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('ram-warning', set_value('ram-warning', $container->ram_warning), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">MB</span>
                                                </div>
                                                <?php echo my_form_error('load-warning', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('ram-critical', set_value('ram-critical', $container->ram_critical), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">MB</span>
                                                </div>
                                                <?php echo my_form_error('ram-critical', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('load-warning') != FALSE || my_form_error('load-critical') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-3 control-label">Disk Usage</label>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('disk-warning', set_value('disk-warning', $container->disk_warning), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">%</span>
                                                </div>
                                                <?php echo my_form_error('disk-warning', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('disk-critical', set_value('disk-critical', $container->disk_critical), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">%</span>
                                                </div>
                                                <?php echo my_form_error('disk-critical', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                        </div>
                        
                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                        
                        <?php echo form_close(); ?>

                </div>
        </div>
        <script type="text/javascript">
                $(function() {
                        $('#monitoring-modal .switch').bootstrapSwitch();
                });
        </script>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Monitoring Settings for <?php echo $container->hostname; ?></div>
                        <div class="panel-body">
                                <?php echo form_open('server/monitoring/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                
                                <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Ping Monitoring:</label>
                                        <div class="col-md-7">
                                                <?php echo form_checkbox('icmp-enabled', '1', $container->icmp_monitoring_enabled, 'class="form-control switch"'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Advanced Monitoring:</label>
                                        <div class="col-md-7">
                                                <?php echo form_checkbox('advanced-enabled', '1', $container->monitoring_enabled, 'class="form-control switch"'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="" class="col-md-3 control-label"></label>
                                        <label for="" class="col-md-3">Warning</label>
                                        <label for="" class="col-md-3">Critical</label>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('load-warning') != FALSE || my_form_error('load-critical') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-3 control-label">Load Avg.</label>
                                        <div class="col-md-3">
                                                <?php echo form_input('load-warning', set_value('load-warning'), 'class="form-control"'); ?>
                                                <?php echo my_form_error('load-warning', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                                <?php echo form_input('load-critical', set_value('load-critical'), 'class="form-control"'); ?>
                                                <?php echo my_form_error('load-critical', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('ram-warning') != FALSE || my_form_error('ram-critical') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-3 control-label">Memory Usage</label>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('ram-warning', set_value('ram-warning'), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">MB</span>
                                                </div>
                                                <?php echo my_form_error('ram-warning', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('ram-critical', set_value('ram-critical'), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">MB</span>
                                                </div>
                                                <?php echo my_form_error('ram-critical', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('load-warning') != FALSE || my_form_error('load-critical') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-3 control-label">Disk Usage</label>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('disk-warning', set_value('disk-warning'), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">%</span>
                                                </div>
                                                <?php echo my_form_error('disk-warning', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="input-group">
                                                        <?php echo form_input('disk-critical', set_value('disk-critical'), 'class="form-control"'); ?>
                                                        <span class="input-group-addon">%</span>
                                                </div>
                                                <?php echo my_form_error('disk-critical', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>
                                <?php echo form_submit('cancel', 'Cancel', 'class="btn btn-default"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        <script type="text/javascript">
                $(function() {
                        $('.switch').bootstrapSwitch();
                });
        </script>
<?php endif; ?>