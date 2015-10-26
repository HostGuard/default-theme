	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Edit Group <small><?php echo $group->name; ?></small></h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
       
		<?php
				echo validation_errors('<div class="msg-error">', '</div>');
				echo form_open('group/edit/'.$group->id, array('class' => 'form-horizontal'));
		?>

		<div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
				<label for="name" class="col-md-3 control-label">Name:</label>
				<div class="col-md-8">
						<?php echo form_input('name', $group->name, 'class="form-control"') ?>
						<?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
		
		<div class="form-group<?php echo (my_form_error('description') != FALSE ? ' has-error' : ''); ?>">
				<label for="description" class="col-md-3 control-label">Description:</label>
				<div class="col-md-8">
						<?php echo form_input('description', $group->description, 'class="form-control"') ?>
						<?php echo my_form_error('description', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>

	<div class="form-group">
		<label for="theme" class="col-md-3 control-label">Theme:</label>
		<div class="col-md-8">
			<?php echo form_dropdown('theme', $this->ion_auth->themes(), $group->theme, 'class="form-control"'); ?>
			<?php echo my_form_error('theme', '<span class="help-block">', '</span>'); ?>
		</div>
	</div>
		
		<div class="form-group">
				<label class="col-md-3 control-label"> </label>
				<div class="col-md-8 text-right">
						<a href="/group/list" class="btn btn-default">Cancel</a>
						<input class="btn btn-primary" type="submit" name="submit" value="Save Changes" />
				</div>
		</div>
		
		<?php echo form_close(); ?>
	</div>