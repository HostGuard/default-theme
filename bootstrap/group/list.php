	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Groups</h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr><th>Name</th><th>Description</th><th>Theme</th><th></th></tr>
			</thead>
			<tbody>

			<?php
				foreach ($groups as $group) {
					echo '<tr><td>'.$group->name.'</td><td>'.$group->description.'</td><td>'.$group->theme.'</td><td class=" text-center"><a class="btn btn-primary btn-xs" href="/group/edit/'.$group->id.'"><i class="fa fa-edit"></i> Edit</a>' .

					'&nbsp;<a data-toggle="modal" data-target="#delete-modal'.$group->id.'" class="btn btn-danger btn-xs" href="/group/delete/'.$group->id.'"><i class="fa fa-trash-o"></i> Delete</a><div id="modal'.$group->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div><div id="delete-modal'.$group->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>' .
					'</td></tr>';
				}
			?>
			</tbody>
		</table>
		
		<?php
				echo '<p style="margin: 0 auto; text-align: center">'.$this->pagination->create_links().'</p>';
		?>
                
		<div class="page-header"><h4>Add Group</h4></div>
                
		<?php
				echo validation_errors('<div class="msg-error">', '</div>');
				echo form_open('group/create', array('class' => 'form-horizontal'));
		?>
		
		<div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
				<label for="name" class="col-md-3 control-label">Name:</label>
				<div class="col-md-8">
						<?php echo form_input('name', set_value('name'), 'class="form-control"') ?>
						<?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
		
		<div class="form-group<?php echo (my_form_error('description') != FALSE ? ' has-error' : ''); ?>">
				<label for="description" class="col-md-3 control-label">Description:</label>
				<div class="col-md-8">
						<?php echo form_input('description', set_value('description'), 'class="form-control"') ?>
						<?php echo my_form_error('description', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
		
		<div class="form-group">
				<label for="permissions" class="col-md-3 control-label">Theme:</label>
				<div class="col-md-8">
							<?php echo form_dropdown('theme', $this->ion_auth->themes(), 'bootstrap', 'class="form-control"'); ?>
							<?php echo my_form_error('theme', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
		
		
		<div class="form-group">
				<label class="col-md-3 control-label"> </label>
				<div class="col-md-8  text-right">
						<input class="btn btn-primary" type="submit" name="submit" value="Create" />
				</div>
		</div>
		
		<?php echo form_close(); ?>
        
	</div>