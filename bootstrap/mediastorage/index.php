<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Media Storage Nodes</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th>Location</th><th>IP Address</th><th></th></tr>
                                <?php
                                        foreach ($nodes as $node) {
                                                echo '
                                                        <tr>
                                                                <td>'.$node->node_name.'</td>
                                                                <td>'.$node->location_name.'</td>
                                                                <td>'.long2ip($node->vpn_ip_address).'</td>
                                                                <td><a href="/mediastorage/delete/'.$node->id.'" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></td></tr>';
                                        }
                                ?>
                        </table>
                </div>
        </div>
</div>

<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Add Media Node</div>
                <div class="panel-body">
                        <?php echo form_open('mediastorage/add', array('class' => 'form-horizontal')); ?>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Node:</label>
                                <div class="col-md-8">
                                        <select name="node" class="selectpicker">
                                                <?php

                                                        foreach ($locations as $location) {
                                                                echo '<optgroup label="'.$location->location_name.'">';
                                                                foreach ($location->nodes AS $node) {
                                                                        echo '<option value="'.$node->id.'" '.set_select('location', $node->id).'>'.$node->node_name.' ('.long2ip($node->vpn_ip_address).')</option>';
                                                                }
                                                                echo '</optgroup>';
                                                        }
                                                ?>
                                        </select>
                                </div>
                        </div>
                
                        <div class="form-group">
                                <label class="col-md-3 control-label">Sync via:</label>
                                <div class="col-md-8">
                                        <select name="sync" class="selectpicker">
                                                <option value="public">Public IP Address</option>
                                                <option value="lan">LAN IP address</option>
                                                <option value="vpn">VPN IP address</option>
                                        </select>
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <?php echo form_submit('submit', 'Add', 'class="btn btn-primary"'); ?>
                                </div>
                        </div>
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>