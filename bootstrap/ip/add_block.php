<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Add IPv4 Block</div>
                <div class="panel-body">
                        <?php echo form_open('ip/add_block', array('class' => "form-horizontal")); ?>

                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">Block Name:</label>
                                <div class="col-md-8">
                                    <?php echo form_input('name', set_value('name'), 'class="form-control"'); ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('start') != FALSE ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">First Address:</label>
                                <div class="col-md-8">
                                    <?php echo form_input('start', set_value('start'), 'class="form-control"'); ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('end') != FALSE ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">Last Address:</label>
                                <div class="col-md-8">
                                    <?php echo form_input('end', set_value('end'), 'class="form-control"'); ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('gateway') != FALSE ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">Gateway:</label>
                                <div class="col-md-8">
                                    <?php echo form_input('gateway', set_value('gateway'), 'class="form-control"'); ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('ns1') != FALSE ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">Nameserver 1:</label>
                                <div class="col-md-8">
                                    <?php echo form_input('ns1', set_value('ns1'), 'class="form-control"'); ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('ns2') != FALSE ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">Nameserver 2:</label>
                                <div class="col-md-8">
                                    <?php echo form_input('ns2', set_value('ns2'), 'class="form-control"'); ?>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-md-3 control-label">Netmask:</label>
                                <div class="col-md-8">
                                        <?php
                                                $options = array(
                                                        '255.255.255.255' => '255.255.255.255 (/32)',
                                                        '255.255.255.254' => '255.255.255.254 (/31)',
                                                        '255.255.255.252' => '255.255.255.252 (/30)',
                                                        '255.255.255.248' => '255.255.255.248 (/29)',
                                                        '255.255.255.240' => '255.255.255.240 (/28)',
                                                        '255.255.255.224' => '255.255.255.224 (/27)',
                                                        '255.255.255.192' => '255.255.255.192 (/26)',
                                                        '255.255.255.128' => '255.255.255.128 (/25)',
                                                        '255.255.255.0' => '255.255.255.0 (/24)',
                                                        '255.255.254.0' => '255.255.254.0 (/23)',
                                                        '255.255.252.0' => '255.255.252.0 (/22)',
                                                        '255.255.248.0' => '255.255.248.0 (/21)',
                                                        '255.255.240.0' => '255.255.240.0 (/20)',
                                                        '255.255.224.0' => '255.255.224.0 (/19)',
                                                        '255.255.192.0' => '255.255.192.0 (/18)',
                                                        '255.255.128.0' => '255.255.128.0 (/17)',
                                                        '255.255.0.0' => '255.255.0.0 (/16)',
                                                        '255.254.0.0' => '255.254.0.0 (/15)',
                                                        '255.252.0.0' => '255.252.0.0 (/14)',
                                                        '255.248.0.0' => '255.248.0.0 (/13)',
                                                        '255.240.0.0' => '255.240.0.0 (/12)',
                                                        '255.224.0.0' => '255.224.0.0 (/11)',
                                                        '255.192.0.0' => '255.192.0.0 (/10)',
                                                        '255.128.0.0' => '255.128.0.0 (/9)',
                                                        '255.0.0.0' => '255.0.0.0 (/8)',
                                                );
                                                echo form_dropdown('netmask', $options, null, 'class="selectpicker"');
                                        ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('node[]') != FALSE ? ' has-error' : ''); ?>">
                                <label class="col-md-3 control-label">Nodes:</label>
                                <div class="col-md-8">
                                        <?php
                                                foreach ($nodes as $node) {
                                                        echo form_checkbox('node[]', $node->id).' '.$node->node_name.'<br />';
                                                }
                                        ?>
                                </div>
                        </div>

                    <div class="form-group<?php echo (my_form_error('rdns_zones') != FALSE ? ' has-error' : ''); ?>">
                        <div class="col-md-12">
                            <div class="alert alert-info">You'll need to <a href="/dns/index">create a domain for reverse DNS</a> if you don't see any listed here.</div>
                        </div>
                                <label class="col-md-3 control-label">Reverse DNS:</label>
                                <div class="col-md-8">
                                        <?php
                                                $zone_options["0"] = 'None';
                                                foreach($rdns_zones as $zone) {
                                                        $zone_options[$zone->id] = $zone->name;
                                                }
                                                echo form_dropdown('rdns_zone', $zone_options, set_value('rdns_zone'), 'class="selectpicker"');
                                        ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                        <input type="submit" name="submit" value="Add Block" class="btn btn-primary" />
                                        <a href="/ip/index" class="btn btn-default">Cancel</a>
                                </div>
                        </div>
                        
                </div>
        </div>
</div>