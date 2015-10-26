<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading">Create OpenVZ Virtual Machine</div>
                <div class="panel-body">
                        <?php echo form_open('libopenvz/create', array('class' => 'form-horizontal')); ?>
                        
                        <div class="form-group<?php echo (my_form_error('user') != FALSE ? ' has-error' : ''); ?>">
                                <label for="user" class="col-md-3 control-label">User:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('user', $user_options, set_value('user'), 'class="selectpicker"'); ?>
                                        <?php echo my_form_error('user', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('hostname') != FALSE ? ' has-error' : ''); ?>">
                                <label for="hostname" class="col-md-3 control-label">Hostname:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('hostname', set_value('hostname'), 'class="form-control"'); ?>
                                        <?php echo my_form_error('hostname', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                
                        <div class="form-group<?php echo (my_form_error('password') != FALSE ? ' has-error' : ''); ?>">
                                <label for="password" class="col-md-3 control-label">Console Password:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('password', $password, 'class="form-control"'); ?>
                                        <?php echo my_form_error('password', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('location') != FALSE ? ' has-error' : ''); ?>">
                                <label for="location" class="col-md-3 control-label">Location:</label>
                                <div class="col-md-8">
                                        <?php
                                                foreach ($locations as $location) {
                                                        $location_options[$location->location_id] = $location->location_name;
                                                }
                                                echo form_dropdown('location', $location_options, set_value('location'), 'class="selectpicker" data-live-search="true"');
                                        ?>
                                        <?php echo my_form_error('location', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('node') != FALSE ? ' has-error' : ''); ?>">
                                <label for="node" class="col-md-3 control-label">Node:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('node', $node_options, set_value('node'), 'class="selectpicker" data-live-search="true"'); ?>
                                        <?php echo my_form_error('node', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('operating-system') != FALSE ? ' has-error' : ''); ?>">
                                <label for="operating-system" class="col-md-3 control-label">Operating System:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('operating-system', $template_options, set_value('operating-system'), 'class="selectpicker" data-live-search="true"'); ?>
                                        <?php echo my_form_error('operating-system', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('plan') != FALSE ? ' has-error' : ''); ?>">
                                <label for="plan" class="col-md-3 control-label">Plan:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('plan', $plans, set_value('plan'), 'id="plan" class="selectpicker"'); ?>
                                        <?php echo my_form_error('plan', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div id="ipselection"></div>
                        
                        <div class="form-group">
                                <label for="" class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <?php echo form_submit('submit', 'Add VPS', 'class="btn btn-primary"'); ?>
                                </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                        <?php
                                $ipform = '
                                        <div class="form-group">
                                                <label for="ip" class="col-md-3 control-label">IP Address:</label>
                                                <div class="col-md-8">';
                                                
                                $ipform .= form_dropdown('ip[]', $ip_addresses, set_value('ip', 'automatic'), 'class="selectpicker"');
                                                
                                $ipform .= '
                                                </div>
                                        </div>';
                                        
                                $ipform = str_replace(array("\r", "\n"), '', $ipform);
                                                
                                $script = "<script type=\"text/javascript\">var plans = new Array(); $js var ipform = '$ipform'; $('#plan').change(function(){ $('#ipselection').html(''); for (var i=0;i<plans[$('#plan').val()]; i++) { $('#ipselection').append(ipform) }});</script>";

                                echo $script;
                        ?>
                        
                </div>
        </div>
</div>