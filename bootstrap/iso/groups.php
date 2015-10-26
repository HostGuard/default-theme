<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">ISO Groups</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th></tr>
                                <?php
                                        foreach ($groups as $group) {
                                                echo '<tr><td>'.$group->group_name.'</td><td><a href="/iso/delete_group/'.$group->group_id.'">Delete</a></td></tr>';
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
                        <?php echo form_open('iso/groups', array('class' => 'form-horizontal')); ?>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Group Name</label>
                                <div class="col-md-8">
                                        <?php echo form_input('group_name', null, 'class="form-control"'); ?>
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