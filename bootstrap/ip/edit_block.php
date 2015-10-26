<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Edit IPv4 Block</div>
                <div class="panel-body">

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                        <?php echo form_open('ip/edit_block/'.$block_id, array('class' => "form-horizontal")); ?>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Block Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('name', $block->block_name, 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">First Address:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('start', long2ip($block->block_start), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Last Address:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('end', long2ip($block->block_end), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Gateway:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('gateway', long2ip($block->block_gateway), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nameserver 1:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ns1', long2ip($block->block_ns1), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nameserver 2:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ns2', long2ip($block->block_ns2), 'class="form-control"'); ?>
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

                                                echo form_dropdown('netmask', $options, long2ip($block->block_netmask), 'class="selectpicker"');
                                        ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nodes:</label>
                                <div class="col-md-8">
                                <?php
                                        $n = explode(',', $block->block_nodes);
                                        foreach ($nodes as $node) {
                                                echo form_checkbox('node[]', $node->id, in_array($node->id, $n)).' '.$node->node_name.'<br />';
                                        }
                                ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">rDNS:</label>
                                <div class="col-md-8">
                                        <?php
                                                $zone_options["0"] = 'None';
                                                foreach($rdns_zones as $zone) {
                                                        $zone_options[$zone->id] = $zone->name;
                                                }
                                                
                                                echo form_dropdown('rdns_zone', $zone_options, $block->block_rdnszone, 'class="selectpicker"');
                                        ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                        <input type="submit" name="submit" value="Save Changes" class="btn btn-primary" />
                                        <a href="/ip/index" class="btn btn-default">Cancel</a>
                                </div>
                        </div>
                        
                </div>
        </div>
</div>