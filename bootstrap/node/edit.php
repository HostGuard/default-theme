<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $node->node_name; ?> Settings</div>
                <div class="panel-body">
                        <?php echo form_open('node/edit/'.$node->id, array('class' => 'form-horizontal')); ?>
                        <?php $this->load->view('error', array('type' => 'info', 'message' => 'Changing values here does not change on them on the node itself')); ?>

                        <div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-3 control-label">Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('name', $node->node_name, 'class="form-control"'); ?>
                                        <p class="help-block">The display name used in most places</p>
                                        <?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('hostname') != FALSE ? ' has-error' : ''); ?>">
                                <label for="hostname" class="col-md-3 control-label">Hostname:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('hostname', $node->node_hostname, 'class="form-control"'); ?>
                                        <p class="help-block">Must match the hostname defined on the server.</p>
                                        <?php echo my_form_error('hostname', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('ipaddress') != FALSE ? ' has-error' : ''); ?>">
                                <label for="ipaddress" class="col-md-3 control-label">Primary IP Address:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ipaddress', long2ip($node->ip_address), 'class="form-control"'); ?>
                                        <?php echo my_form_error('ipaddress', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('ipgateway') != FALSE ? ' has-error' : ''); ?>">
                        <label for="ipgateway" class="col-md-3 control-label">Gateway Address:</label>
                        <div class="col-md-8">
                            <?php echo form_input('ipgateway', long2ip($node->ip_gateway), 'class="form-control"'); ?>
                            <?php echo my_form_error('ipgateway', '<span class="help-block">', '</span>'); ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo (my_form_error('ipnetmask') != FALSE ? ' has-error' : ''); ?>">
                        <label for="ipnetmask" class="col-md-3 control-label">Netmask Address:</label>
                        <div class="col-md-8">
                            <?php echo form_input('ipnetmask', long2ip($node->ip_netmask), 'class="form-control"'); ?>
                            <?php echo my_form_error('ipnetmask', '<span class="help-block">', '</span>'); ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo (my_form_error('ipbroadcast') != FALSE ? ' has-error' : ''); ?>">
                        <label for="ipbroadcast" class="col-md-3 control-label">Broadcast Address:</label>
                        <div class="col-md-8">
                            <?php echo form_input('ipbroadcast', long2ip($node->ip_broadcast), 'class="form-control"'); ?>
                            <?php echo my_form_error('ipbroadcast', '<span class="help-block">', '</span>'); ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo (my_form_error('ipdns') != FALSE ? ' has-error' : ''); ?>">
                        <label for="ipdns" class="col-md-3 control-label">DNS Address:</label>
                        <div class="col-md-8">
                            <?php echo form_input('ipdns', long2ip($node->ip_dns), 'class="form-control"'); ?>
                            <?php echo my_form_error('ipdns', '<span class="help-block">', '</span>'); ?>
                        </div>
                    </div>

                        
                        <div class="form-group<?php echo (my_form_error('lan_ipaddress') != FALSE ? ' has-error' : ''); ?>">
                                <label for="lan_ipaddress" class="col-md-3 control-label">Secondary IP:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('lan_ipaddress', long2ip($node->lan_ip_address), 'class="form-control"'); ?>
                                        <?php echo my_form_error('lan_ipaddress', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('port') != FALSE ? ' has-error' : ''); ?>">
                                <label for="port" class="col-md-3 control-label">SSH Port:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('port', $node->ssh_port, 'class="form-control"'); ?>
                                        <?php echo my_form_error('port', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <?php if ($node->virtualization != 1): ?>
                        <div class="form-group<?php echo (my_form_error('volumegroup') != FALSE ? ' has-error' : ''); ?>">
                                <label for="volumegroup" class="col-md-3 control-label">Volume Group:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('volumegroup', $node->volume_group, 'class="form-control"'); ?>
                                        <p class="help-block">Changing this will affect all VMs on this node.  The Volume Group should only be changed if you've renamed the volume group on this node.  To add additional space for VM storage, increase the size of your existing volume group - do not change to a new one.</p>
                                        <?php echo my_form_error('volumegroup', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="form-group<?php echo (my_form_error('location') != FALSE ? ' has-error' : ''); ?>">
                                <label for="location" class="col-md-3 control-label">Location:</label>
                                <div class="col-md-8">
                                        <select name="location" class="selectpicker">
                                        <?php
                                                foreach ($locations as $location) {
                                                        echo '<option value="'.$location->location_id.'" '.($location->location_id == $node->location ? 'selected="selected"' : '').'>'.$location->location_name.'</option>';
                                                }
                                        ?>
                                        </select>
                                        <?php echo my_form_error('location', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('max-vm') != FALSE ? ' has-error' : ''); ?>">
                                <label for="max-vm" class="col-md-3 control-label">Max. VMs:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('max-vm', $node->max_vm, 'class="form-control"'); ?>
                                        <p class="help-block">This value is ignored if you have enabled Stock-Based Node Management in <a href="/settings/general">General Settings</a> section.</p>
                                        <?php echo my_form_error('max-vm', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('max-memory') != FALSE ? ' has-error' : ''); ?>">
                                <label for="max-memory" class="col-md-3 control-label">Max. Memory (MB):</label>
                                <div class="col-md-8">
                                        <?php echo form_input('max-memory', $node->max_memory_allocated, 'class="form-control"'); ?>
                                        <p class="help-block">This value is ignored if you have enabled Stock-Based Node Management in <a href="/settings/general">General Settings</a> section.</p>
                                        <?php echo my_form_error('max-memory', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('max-disk') != FALSE ? ' has-error' : ''); ?>">
                                <label for="max-disk" class="col-md-3 control-label">Max. Disk (GB):</label>
                                <div class="col-md-8">
                                        <?php echo form_input('max-disk', $node->max_disk_allocated, 'class="form-control"'); ?>
                                        <p class="help-block">This value is ignored if you have enabled Stock-Based Node Management in <a href="/settings/general">General Settings</a> section.</p>
                                        <?php echo my_form_error('max-disk', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-default" type="submit" name="submit" value="Update Settings" />
                                </div>
                        </div>
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>

<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Monitoring Thresholds</div>
                <div class="panel-body">
                        <?php echo form_open('node/edit/'.$node->id) ?>
                                
                        <div class="form-group">
                                <label for="" class="col-md-3 control-label"></label>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <p class="form-control-static">Warning</p>
                                </div>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <p class="form-control-static">Critical</p>
                                </div>
                                <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                                <label for="" class="col-md-3 control-label">Memory Usage</label>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <div class="input-group"><?php echo form_input('ram-warning', $node->ram_warning, 'class="form-control" style="min-width: 75px"'); ?><span class="input-group-addon">MB</span></div>
                                </div>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <div class="input-group"><?php echo form_input('ram-critical', $node->ram_critical, 'class="form-control" style="min-width: 75px"'); ?><span class="input-group-addon">MB</span></div>
                                </div>
                                <div class="clearfix"></div>

                        </div>
                        
                        <div class="form-group">
                                <label for="" class="col-md-3 control-label">Load Average</label>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <?php echo form_input('load-warning', $node->load_warning, 'class="form-control"'); ?>
                                </div>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <?php echo form_input('load-critical', $node->load_critical, 'class="form-control"'); ?>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                        
                        <div class="form-group">
                                <label for="" class="col-md-3 control-label">Disk Usage</label>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <div class="input-group"><?php echo form_input('disk-warning', $node->disk_warning, 'class="form-control" style="min-width: 75px"'); ?><span class="input-group-addon">%</span></div>
                                </div>
                                <div class="col-md-3" style="min-width: 150px; max-width: 150px;">
                                        <div class="input-group"><?php echo form_input('disk-critical', $node->disk_critical, 'class="form-control" style="min-width: 75px"'); ?><span class="input-group-addon">%</span></div>
                                </div>
                                <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Save" />
                                </div>
                        </div>
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>
