<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                        <?php echo form_open('profile/edit/'.$user->id, array('class' => 'form-horizontal')); ?>
                        <div class="form-group<?php echo (my_form_error('email') != FALSE ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-3 control-label">Username/Email:</label>
                                <div class="col-md-8">
                                        <?php
                                                if ($this->ion_auth->is_admin() === false) {
                                                        $ro = 'class="form-control" readonly="readonly"';
                                                } else {
                                                        $ro = 'class="form-control"';
                                                }
                                               
                                               echo form_input('email', $user->username, $ro)
                                        ?>
                                        <?php echo my_form_error('email', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
        
                        <div class="form-group<?php echo (my_form_error('firstname') != FALSE ? ' has-error' : ''); ?>">
                                <label for="firstname" class="col-md-3 control-label">First Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('firstname', html_entity_decode($user->first_name), 'class="form-control"') ?>
                                        <?php echo my_form_error('firstname', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('lastname') != FALSE ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-3 control-label">Last Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('lastname', html_entity_decode($user->last_name), 'class="form-control"') ?>
                                        <?php echo my_form_error('lastname', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('company') != FALSE ? ' has-error' : ''); ?>">
                                <label for="company" class="col-md-3 control-label">Company:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('company', html_entity_decode($user->company), 'class="form-control"') ?>
                                        <?php echo my_form_error('company', '<span class="help-block">', '</span>'); ?>
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
                                        <?php echo form_password('password', null, 'class="form-control"') ?>
                                        <p class="help-block">Leave blank to keep current password</p>
                                        <?php echo my_form_error('password', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('password2') != FALSE ? ' has-error' : ''); ?>">
                                <label for="password2" class="col-md-3 control-label">Password (again):</label>
                                <div class="col-md-8">
                                        <?php echo form_password('password2', null, 'class="form-control"') ?>
                                        <?php echo my_form_error('password2', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="theme" class="col-md-3 control-label">Group:</label>
                            <div class="col-md-8">
                                <?php echo form_dropdown('cgroup_id', $this->ion_auth->cgroups(), $user->cgroup_id, 'class="form-control"'); ?>
                                <?php echo my_form_error('cgroup_id', '<span class="help-block">', '</span>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <label for="submit" class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>
                                </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                        
                </div>
        </div>
</div>