	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>API Keys</h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr><th>Name</th><th>ID</th><th>Valid IP</th><th></th></tr>
			</thead>
			<tbody>
				<?php
					foreach ($keys as $key) {
						echo '<tr><td>'.$key->name.'</td><td>'.$key->id.'</td><td>'.long2ip($key->valid_ip).'</td><td><a data-toggle="modal" data-target="#modal'.$key->id.'" class="btn btn-danger btn-sm" href="/apikeys/delete_key/'.$key->id.'"><i class="glyphicon glyphicon-remove"></i> Revoke Key</a><div id="modal'.$key->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></td></tr>';
					}
				?>
			</tbody>
		</table>
	</div>

	<div class="col-xs-12">
        <div class="page-header"><h3>Create API Key</h3></div>
                
		<?php echo form_open('apikeys/create_key', array('class' => 'form-horizontal')); ?>

			<div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
				<label for="name" class="col-md-3 control-label">Name:</label>
				<div class="col-md-7">
					<?php echo form_input('name', set_value('name'), 'class="form-control"'); ?>
					<?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
				</div>
			</div>

			<div class="form-group<?php echo (my_form_error('ip') != FALSE ? ' has-error' : ''); ?>">
				<label for="ip" class="col-md-3 control-label">Valid IP:</label>
				<div class="col-md-7">
					<?php echo form_input('ip', set_value('ip'), 'class="form-control"'); ?>
					<?php echo my_form_error('ip', '<span class="help-block">', '</span>'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="col-md-7">
					<input class="btn btn-primary" name="submit" type="submit" value="Create Key" />
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
