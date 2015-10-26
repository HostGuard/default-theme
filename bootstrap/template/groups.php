<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">KVM Template Groups</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th></tr>
                                <?php
                                        foreach ($kvm_groups as $group) {
                                                echo '<tr><td>'.$group->group_name.'</td><td><a href="/template/delete_group/kvm/'.$group->group_id.'">Delete</a></td></tr>';
                                        }
                                ?>
                        </table>
                </div>
        </div>
        
        <div class="panel panel-default">
                <div class="panel-heading">OpenVZ Template Groups</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th></tr>
                                <?php
                                        foreach ($openvz_groups as $group) {
                                                echo '<tr><td>'.$group->group_name.'</td><td><a href="/template/delete_group/openvz/'.$group->group_id.'">Delete</a></td></tr>';
                                        }
                                ?>
                        </table>
                </div>
        </div>
        
        <div class="panel panel-default">
                <div class="panel-heading">Xen Template Groups</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th></tr>
                                <?php
                                        foreach ($xen_groups as $group) {
                                                echo '<tr><td>'.$group->group_name.'</td><td><a href="/template/delete_group/xen/'.$group->group_id.'">Delete</a></td></tr>';
                                        }
                                ?>
                        </table>
                </div>
        </div>
        
</div>

<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Add Group</div>
                <div class="panel-body">
                        <?php echo validation_errors('<div class="msg-error">', '</div>'); ?>
                        <?php echo form_open('template/groups', array('class' => 'form-horizontal')); ?>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Group Name</label>
                                <div class="col-md-8">
                                        <?php echo form_input('group_name', null, 'class="form-control"'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label">Virtualization Type:</label>
                                <div class="col-md-8">
                                        <?php
                                        foreach ($virtualization_types as $type) {
                                                $options_array[strtolower($type->name)] = $type->name;
                                        }
                        
                                        echo form_dropdown('type', $options_array, null, 'class="selectpicker"');
                                        ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Group" />
                                </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>