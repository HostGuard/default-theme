	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Users</h2>
		</div>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12">     
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr><th>Name</th><th>Email</th><th></th></tr>
			</thead>
			<tbody>

			<?php
				foreach ($users as $user) {
					echo '
					<tr><td><a href="/user/index/'.$user->id.'">'.$user->first_name.' '.$user->last_name.'</a></td>
					<td><a href="mailto:'.$user->email.'">'.$user->email.'</a></td>
					<td>
						<a class="btn btn-info btn-xs" href="/user/index/'.$user->id.'"><i class="fa fa-bars"></i> Servers</a>
						<a class="btn btn-primary btn-xs" href="/profile/edit/'.$user->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
						<a class="btn btn-danger btn-xs" href="/user/delete/'.$user->id.'" data-toggle="modal" data-target="#delete-'.$user->id.'" ><i class="fa fa-trash-o"></i> Delete</a>
						
						<div id="delete-'.$user->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
					</td></tr>';
				}
			?>
			</tbody>
		</table>
		<?php
			echo '<p style="margin: 0 auto; text-align: center">'.$this->pagination->create_links().'</p>';
		?>      
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
        <div class="panel panel-default">
                <div class="panel-heading">Add User</div>
                <div class="panel-body">
                        <?php
                                echo validation_errors('<div class="msg-error">', '</div>');
                                echo form_open('user/create', array('class' => 'form-horizontal'));
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
                                <?php echo form_dropdown('cgroup_id', $this->ion_auth->cgroups(), $user->cgroup_id, 'class="form-control"'); ?>
                                <?php echo my_form_error('cgroup_id', '<span class="help-block">', '</span>'); ?>
                            </div>
                        </div>

                        
                        <div class="form-group">
                                <label for="" class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add User" />
                                </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>