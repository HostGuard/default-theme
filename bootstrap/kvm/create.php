	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Create Virtual Machine <!--<small>KVM</small>--></h2>
		</div>
		<p>Enter the information below to create a new VM server.  Selecting a specific node will populate the node details on the right, allowing you evaluate the available resources before creating the server.</p>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="page-header"><h3>VM Details</h3></div>
			<?php echo form_open('', array('class' => 'form-horizontal')); ?>
				
				<div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
						<label for="user" class="col-md-3 control-label">User:</label>
						<div class="col-md-8">
								<?php
										foreach ($users as $user) {
												$options[$user->id] = $user->first_name.' '.$user->last_name.' ('.$user->email.')';
										}
										echo form_dropdown('user', $options, set_value('user'), 'class="form-control" data-live-search="true"');
								?>
								<?php echo my_form_error('user', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
				
				<div class="form-group<?php echo (my_form_error('hostname') != FALSE ? ' has-error' : ''); ?>">
						<label for="hostname" class="col-md-3 control-label">Hostname:</label>
						<div class="col-md-8">
								<?php echo form_input('hostname', set_value('hostname'), 'class="form-control"'); ?>
								<?php echo my_form_error('hostname', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
		
				<div class="form-group<?php echo (my_form_error('password') != FALSE ? ' has-error' : ''); ?>">
						<label for="password" class="col-md-3 control-label">Console Password:</label>
						<div class="col-md-8">
								<?php echo form_input('password', set_value('password'), 'class="form-control password"'); ?>
								<?php echo my_form_error('password', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
				
				<script type="text/javascript">$(function() { $(".password").keyup(function () {var pw = $(".password").val();var pwlength=(pw.length);if(pwlength>5)pwlength=5;var numnumeric=pw.replace(/[0-9]/g,"");var numeric=(pw.length-numnumeric.length);if(numeric>3)numeric=3;var symbols=pw.replace(/\W/g,"");var numsymbols=(pw.length-symbols.length);if(numsymbols>3)numsymbols=3;var numupper=pw.replace(/[A-Z]/g,"");var upper=(pw.length-numupper.length);if(upper>3)upper=3;var pwstrength=((pwlength*10)-20)+(numeric*10)+(numsymbols*15)+(upper*10);if(pwstrength<1){pwstrength=1}if(pwstrength>100){pwstrength=100} $(".passwordProgress .progress-bar").removeClass("progress-bar-success"); $(".passwordProgress .progress-bar").removeClass("progress-bar-warning"); $(".passwordProgress .progress-bar").removeClass("progress-bar-danger");
				
				if (pwstrength>75) {$(".passwordProgress .progress-bar").addClass("progress-bar-success");} else if (pwstrength>30){$(".passwordProgress .progress-bar").addClass("progress-bar-warning");} else{$(".passwordProgress .progress-bar").addClass("progress-bar-danger");} $(".passwordProgress .progress-bar").css("width", pwstrength + "%"); $(".passwordProgress .progress-bar .sr-only").html("" + pwstrength + "% Complete"); }); });</script>
				
				<div class="form-group">
					<label  class="col-md-3 control-label" for="passstrength">Password Strength</label>
					
					<div class="col-md-8">
						<div class="progress passwordProgress">
							<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%;">
								<span class="sr-only">0% Complete</span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group<?php echo (my_form_error('location') != FALSE ? ' has-error' : ''); ?>">
						<label for="location" class="col-md-3 control-label">Location:</label>
						<div class="col-md-8">
								<?php
										foreach ($locations as $location) {
												$location_options[$location->location_id] = $location->location_name;
										}
										echo form_dropdown('location', $location_options, set_value('location'), 'class="form-control"');
								?>
								<?php echo my_form_error('location', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
				
				<div class="form-group<?php echo (my_form_error('node') != FALSE ? ' has-error' : ''); ?>">
						<label for="node" class="col-md-3 control-label">Node:</label>
						<div class="col-md-8">
								<?php echo form_dropdown('node', $nodes, set_value('node'), 'class="form-control" data-live-search="true"'); ?>
								<?php echo my_form_error('node', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
				
				<div class="form-group<?php echo (my_form_error('plan') != FALSE ? ' has-error' : ''); ?>">
						<label for="plan" class="col-md-3 control-label">Plan:</label>
						<div class="col-md-8">
								<?php echo form_dropdown('plan', $plans, set_value('plan'), 'id="plan" class="form-control"'); ?>
								<?php echo my_form_error('plan', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
				
				<div id="ipselection"></div>
				
				<div class="form-group">
						<label for="" class="col-md-3 control-label"> </label>
						<div class="col-md-8">
								<?php echo form_submit('submit', 'Add VPS', 'class="btn btn-primary"'); ?>
						</div>
				</div>
				
			<?php echo form_close(); ?>
			<?php $ipform = '
							<div class="form-group">
									<label for="ip" class="col-md-3 control-label">IP Address:</label>
									<div class="col-md-8">';
					$ipform .= form_dropdown('ip[]', $ip_addresses, set_value('ip', 'automatic'), 'class="form-control"');
					$ipform .= '
									</div>
							</div>';
					$ipform = str_replace(array("\r", "\n"), '', $ipform);
					$script = "<script type=\"text/javascript\">var plans = new Array(); $js var ipform = '$ipform'; $('#plan').change(function(){ $('#ipselection').html(''); for (var i=0;i<plans[$('#plan').val()]; i++) { $('#ipselection').append(ipform) }});</script>";
					echo $script;
			?>
	</div>
        <!--
	<div class="col-md-6">
		<div class="page-header"><h3>Node Details</h3></div>
		
		<div class="alert alert-info">Select a node on the left to see it's available resources.</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">(Node Name) Resources</div>
			<table class="table table-condensed table-striped">
				<thead>
					<tr><th>Virtual Machines</th><th>Memory Allocated</th><th>Disk Allocated</th></tr>
				</thead>
				<tbody>
					<tr>
						<td>3 / 30</td>
						<td>2.75 GB / 28.00 GB</td>
						<td>80 GB / 1 TB</td>
					</tr>
				</tbody>
			</table>                
		</div>
		
		
		<div class="panel panel-default">
			<div class="panel-heading">(Node Name) Statistics</div>
			
			<table class="table table-condensed container-info">
				<tbody>
					<tr>
						<th>Load Average</th>
						<td>
							<span class="label label-success">0.25</span>
							<span class="label label-success">0.20</span>
							<span class="label label-success">0.27</span>
						</td>
					</tr>
					<tr>
						<th>Memory</th>
						<td>
							<div class="progress" style="max-width: 250px">
								<span>2.9 GB / 31.3 GB</span>
								
								<div class="progress-bar" role="progressbar" aria-valuenow="3087004" aria-valuemin="0" aria-valuemax="32862628" style="width: 
										9.3936613955524%">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>Disk</th>
						<td>
							<div class="progress" style="max-width: 250px">
									<span>3.5 GB / 492.0 GB</span>
									<div class="progress-bar" role="progressbar" aria-valuenow="3651124" aria-valuemin="0" aria-valuemax="515930552" style="width: 
											1%">
									</div>
							</div>
							</td>
					</tr>                                
					<tr>
						<th>Uptime</th>
						<td>23 days 01:11</td>
					</tr>
					<tr>
						<th>Network Activity (In/Out)</th>
						<td>0 Bytes/s - 0 Bytes/s</td>
					</tr>
				</tbody>
			</table>
			
        </div>
        -->
		
		
		
		
	</div>
