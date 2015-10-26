<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Edit IPv6 Block</div>
                <div class="panel-body">
                
                        <?php $this->load->view('error', array('type' => 'info', 'message' => 'Each IPv6 block will be split into /64 networks, one of which will be assigned to each VPS created (if IPv6 is enabled for that particular plan). For more information about IPv6 subnetting, please see <a href="https://www.hostguard.net/docs/IPv6_Subnetting">https://www.hostguard.net/docs/IPv6_Subnetting</a>')); ?>

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        
                        <?php echo form_open('ip/edit_block6/'.$block_id, array('class' => "form-horizontal")); ?>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Block Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('name', $block->block_name, 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Network:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('start', int64_to_inet6(array($block->block_gateway, 0)), 'class="form-control"'); ?>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-md-3 control-label">Netmask:</label>
                                <div class="col-md-8">
                                        <select id="netmask" name="netmask" class="selectpicker">
                                                <option value="56"<?php ($block->block_netmask == 56 ? ' selected="selected"': '') ?>>/56</option>
                                                <option value="48"<?php ($block->block_netmask == 48 ? ' selected="selected"': '') ?>>/48</option>
                                                <option value="32"<?php ($block->block_netmask == 32 ? ' selected="selected"': '') ?>>/32</option>
                                        </select>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Gateway:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('gateway', int64_to_inet6(array($block->block_gateway, 0)), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nameserver 1:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ns1', int64_to_inet6(array($block->block_ns1_1, $block->block_ns1_2)), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nameserver 2:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ns2', int64_to_inet6(array($block->block_ns2_1, $block->block_ns2_2)), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nodes</label>
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
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input type="submit" name="submit" value="Edit Block" class="btn btn-primary" />
                                        <a href="/ip/index" class="btn btn-default">Cancel</a>
                                </div>
                        </div>
                        
                </div>
        </div>
</div>