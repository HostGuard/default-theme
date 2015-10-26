<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>
                <div class="panel-body">
                        <?php
                                echo validation_errors('<div class="msg-error">', '</div>');
                                echo form_open('user/edit/'.$user->id, array('class' => 'form-horizontal'));
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
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Edit User" />
                                </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>