<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Add IPv6 Block</div>
                <div class="panel-body">

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                        <?php $this->load->view('error', array('type' => 'info', 'message' => 'Each IPv6 block will be split into /64 networks, one of which will be assigned to each VPS created (if IPv6 is enabled for that particular plan). For more information about IPv6 subnetting, please see <a href="https://www.hostguard.net/docs/IPv6_Subnetting">https://www.hostguard.net/docs/IPv6_Subnetting</a>')); ?>

                        <?php echo form_open('ip/add_block6', array('class' => "form-horizontal")); ?>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Block Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('name', set_value('name'), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Network:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('start', set_value('start'), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Netmask:</label>
                                <div class="col-md-8">
                                        <select id="netmask" name="netmask" class="selectpicker">
                                                <option value="56">/56</option>
                                                <option value="48">/48</option>
                                                <option value="32">/32</option>
                                        </select>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Gateway:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('gateway', set_value('gateway'), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nameserver 1:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ns1', set_value('ns1'), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nameserver 2:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ns2', set_value('ns2'), 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Nodes</label>
                                <div class="col-md-8">
                                        <?php
                                                foreach ($nodes as $node) {
                                                        echo form_checkbox('node[]', $node->id).' '.$node->node_name.'<br />';
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
                                                
                                                echo form_dropdown('rdns_zone', $zone_options, set_value('rdns_zone'), 'class="selectpicker"');
                                        ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input type="submit" name="submit" value="Add Block" class="btn btn-primary" />
                                        <a href="/ip/index" class="btn btn-default">Cancel</a>
                                </div>
                        </div>
                        
                </div>
        </div>
</div>