<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Staff Users</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                        <tr><th>Name</th><th>Email</th><th></th></tr>

                        <?php
                                foreach ($users as $user) {
                                        echo '<tr><td>'.$user->first_name.' '.$user->last_name.'</td><td>'.$user->email.'</td><td><a class="btn btn-primary btn-xs" href="/staff/edit/'.$user->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>' .
                                        ' <a class="btn btn-danger btn-xs" href="/staff/delete/'.$user->id.'" data-toggle="modal" data-target="#delete-'.$user->id.'" ><i class="glyphicon glyphicon-trash"></i> Delete</a> <div id="delete-'.$user->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>' .
                                    '</td></tr>';
                                }
                        ?>
                        </table>
                        <?php
                                echo '<p style="margin: 0 auto; text-align: center">'.$this->pagination->create_links().'</p>';
                        ?>
                </div>
        </div>
</div>

<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Add User</div>
                <div class="panel-body">
                        <?php
                                echo validation_errors('<div class="msg-error">', '</div>');
                                echo form_open('staff/create', array('class' => 'form-horizontal'));
                        ?>
                        
                        <div class="form-group<?php echo (my_form_error('username') != FALSE ? ' has-error' : ''); ?>">
                                <label for="username" class="col-md-3 control-label">Email:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('username', set_value('username'), 'class="form-control"') ?>
                                        <?php echo my_form_error('username', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                
                        <div class="form-group<?php echo (my_form_error('password') != FALSE ? ' has-error' : ''); ?>">
                                <label for="password" class="col-md-3 control-label">Password:</label>
                                <div class="col-md-8">
                                        <?php echo form_password('password', set_value('password'), 'class="form-control"') ?>
                                        <?php echo my_form_error('password', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('firstname') != FALSE ? ' has-error' : ''); ?>">
                                <label for="firstname" class="col-md-3 control-label">First Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('firstname', set_value('firstname'), 'class="form-control"') ?>
                                        <?php echo my_form_error('firstname', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('lastname') != FALSE ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-3 control-label">Last Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('lastname', set_value('lastname'), 'class="form-control"') ?>
                                        <?php echo my_form_error('lastname', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="theme" class="col-md-3 control-label">Group:</label>
                            <div class="col-md-8">
                                <?php echo form_dropdown('cgroup_id', $this->ion_auth->cgroups(), '1', 'class="selectpicker"'); ?>
                                <?php echo my_form_error('cgroup_id', '<span class="help-block">', '</span>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <label for="permissions" class="col-md-3 control-label">Permissions:</label>
                                <div class="col-md-9">
                                        <div class="col-md-6">
                                                <?php
                                                        $count = count($this->ion_auth->groups()->result());
                                                        $i=0;
                                                        
                                                        foreach ($this->ion_auth->groups()->result() as $group) {
                                                                echo '<div class="checkbox"><label>'.form_checkbox('groups[]', $group->id, FALSE).' '.$group->description.'</label></div><br />';
                                                                
                                                                $i++;
                                                                if ($i == ceil($count/2)) {
                                                                        echo '</div><div class="col-md-6">';
                                                                }
                                                        }
                                                ?>
                                        </div>
                                </div>
                        </div>
                        
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Create" />
                                </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>