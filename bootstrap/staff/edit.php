<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Edit User</div>
        <div class="panel-body">
            <?php
            echo validation_errors('<div class="msg-error">', '</div>');
            echo form_open('staff/edit/'.$user->id, array('class' => 'form-horizontal'));
            ?>

            <div class="form-group<?php echo (my_form_error('username') != FALSE ? ' has-error' : ''); ?>">
                <label for="username" class="col-md-3 control-label">Email:</label>
                <div class="col-md-8">
                    <?php echo form_input('username', $user->email, 'class="form-control"') ?>
                    <?php echo my_form_error('username', '<span class="help-block">', '</span>'); ?>
                </div>
            </div>

            <div class="form-group<?php echo (my_form_error('firstname') != FALSE ? ' has-error' : ''); ?>">
                <label for="firstname" class="col-md-3 control-label">First Name:</label>
                <div class="col-md-8">
                    <?php echo form_input('firstname', $user->first_name, 'class="form-control"') ?>
                    <?php echo my_form_error('firstname', '<span class="help-block">', '</span>'); ?>
                </div>
            </div>

            <div class="form-group<?php echo (my_form_error('lastname') != FALSE ? ' has-error' : ''); ?>">
                <label for="lastname" class="col-md-3 control-label">Last Name:</label>
                <div class="col-md-8">
                    <?php echo form_input('lastname', $user->last_name, 'class="form-control"') ?>
                    <?php echo my_form_error('lastname', '<span class="help-block">', '</span>'); ?>
                </div>
            </div>

                        <div class="form-group<?php echo (my_form_error('timezone') != FALSE ? ' has-error' : ''); ?>">
                                <label for="timezone" class="col-md-3 control-label">Timezone:</label>
                                <div class="col-md-8">
                                        <?php echo timezone_menu($user->timezone, 'form-control'); ?>
                                        <?php echo my_form_error('timezone', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

            <div class="form-group<?php echo (my_form_error('password') != FALSE ? ' has-error' : ''); ?>">
                <label for="password" class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                    <?php echo form_password('password', '', 'class="form-control"'); ?>
                    <p class="help-block">Leave blank to leave password unchanged</p>
                    <?php echo my_form_error('password', '<span class="help-block">', '</span>'); ?>
                </div>
            </div>

            <div class="form-group<?php echo (my_form_error('password2') != FALSE ? ' has-error' : ''); ?>">
                <label for="password2" class="col-md-3 control-label">Password (again):</label>
                <div class="col-md-8">
                    <?php echo form_password('password2', '', 'class="form-control"'); ?>
                    <?php echo my_form_error('password2', '<span class="help-block">', '</span>'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="theme" class="col-md-3 control-label">Group:</label>
                <div class="col-md-8">
                    <?php echo form_dropdown('cgroup_id', $this->ion_auth->cgroups(), $user->cgroup_id, 'class="selectpicker"'); ?>
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
                            echo '<div class="checkbox"><label>'.form_checkbox('groups[]', $group->id, $this->ion_auth->in_group((int) $group->id, $user->id)).' '.$group->description.'</label></div><br />';

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
                    <input class="btn btn-primary" type="submit" name="submit" value="Save Changes" />
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>