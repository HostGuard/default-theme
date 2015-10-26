<div class="col-xs-12">
	<div class="page-header page-nopad">
		<h2>Locations</h2>
	</div>
</div>

<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">Locations</div>

		<table class="table table-condensed table-striped">
			<thead>
				<tr><th>ID</th><th>Name</th><th class="hidden-xs">Nodes</th><th></th></tr>
			</thead>
			<tbody>
				<?php
					foreach ($locations as $location) {
						echo '
						<tr>
							<td>'.$location->location_id.'</td><td><a href="/node/index#location-'.$location->location_id.'">'.$location->location_name.'</a></td><td class="hidden-xs">'.$location->node_count.'</td>
							<td>
								<a data-toggle="modal" data-target="#modal'.$location->id.'" class="btn btn-primary btn-xs" href="/location/edit/'.$location->location_id.'"><i class="fa fa-pencil"></i> Edit</a> 
								<a data-toggle="modal" data-target="#delete-modal'.$location->id.'" class="btn btn-danger btn-xs" href="/location/delete/'.$location->location_id.'"><i class="fa fa-trash-o"></i> Delete</a>
								
								<div id="modal'.$location->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div><div id="delete-modal'.$location->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
							</td>
						</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="col-xs-12">
	<div class="panel panel-default">
			<div class="panel-heading">Add Location</div>
			<div class="panel-body">
					<?php 
							echo validation_errors('<div class="msg-error">', '</div>');
							echo form_open('location/add', array('class' => 'form-horizontal'));
					?>
									
					<div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
							<label for="name" class="col-md-3 control-label">Location Name:</label>
							<div class="col-md-8">
									<?php echo form_input('name', set_value('name'), 'class="form-control"') ?>
									<?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
							</div>
					</div>

					<div class="form-group">
							<label class="col-md-3 control-label"> </label>
							<div class="col-md-8">
									<input class="btn btn-default" type="submit" name="submit" value="Add" />
							</div>
					</div>
					
					<?php echo form_close(); ?>
			</div>
	</div>
</div>

