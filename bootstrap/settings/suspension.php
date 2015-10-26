	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Automation</h2>
		</div>
	</div>
</div>

<div class="row">
	<?php echo form_open('settings/suspension', array('class' => '')); ?>
		<div class="col-sm-6">
			<div class="page-header"><h4>OpenVZ</h4></div>
			
				<div class="form-group<?php echo (my_form_error('ovz-max-load') != FALSE ? ' has-error' : ''); ?>">
					<label for="ovz-max-load">Max. Load Per Core:</label>					
					<?php echo form_input('ovz-max-load', $settings['OVZ-MAX-LOAD'], 'class="form-control"'); ?>
					<?php echo my_form_error('ovz-max-load', '<span class="help-block">', '</span>'); ?>
					<p class="help-block">Each container's 15 minute load will be divided by the number of CPU cores. If it exceeds this number, the container will be suspended.
					<br><br><b>Recommended value:</b> 2.00 - Enter 0 to disable load average suspensions for OpenVZ containers.</p>
				</div>
			
			<div class="page-header"><h4>KVM</h4></div>
			
				<div class="form-group<?php echo (my_form_error('kvm-cpu-abuse-threshold') != FALSE ? ' has-error' : ''); ?>">
					<label for="kvm-cpu-abuse-threshold">CPU Abuse Threshold:</label>
					<?php echo form_input('kvm-cpu-abuse-threshold', $settings['KVM-CPU-HIGH-USE-THRESHOLD'], 'class="form-control"'); ?>
					<?php echo my_form_error('kvm-cpu-abuse-threshold', '<span class="help-block">', '</span>'); ?>
					<p class="help-block">The percentage of each VPS's total allocated CPU resources that qualifies as high CPU usage. For example, a VPS with access to 2 CPU cores and using 100% of one core, and 0% of the second would report 50%.
					<br><br><b>Recommended value:</b> 80</p>
				</div>
				
				<div class="form-group<?php echo (my_form_error('kvm-cpu-high-use-duration') != FALSE ? ' has-error' : ''); ?>">
					<label for="kvm-cpu-high-use-duration">CPU High Use Duration:</label>
					<?php echo form_input('kvm-cpu-high-use-duration', $settings['KVM-CPU-HIGH-USE-DURATION'], 'class="form-control"'); ?>
					<?php echo my_form_error('kvm-cpu-high-use-duration', '<span class="help-block">', '</span>'); ?>
					<p class="help-block">How long, in minutes, a VPS can use more than <b>CPU HIGH USE THRESHOLD</b> of their CPU resources before being automatically suspended.
					<br><br><b>Recommended value:</b> 15 - Enter 0 to disable CPU usage suspensions for KVM VMs.</p>					
				</div>
		</div>
		<div class="col-sm-6">
			<div class="page-header"><h4>Billing Panel Integration</h4></div>
				
				<p>To automatically notify your billing panel about service suspensions for excessive resource usage, fill out the fields below.  Please ensure that you add your HostGuard Master's IP address as an allowed IP address for API access to your billing panel.  To disable billing panel integration for the suspension module, leave the fields below blank.  If your billing panel's API requires only a single API key, enter that key in the Password field and leave the User field blank.</p>
				
				<div class="form-group<?php echo (my_form_error('billing-module') != FALSE ? ' has-error' : ''); ?>">
					<label for="billing-module">Name:</label>					
					<?php echo form_dropdown('billing-module', $module_options, $settings['BILLING_MODULE'], 'class="form-control"'); ?>
					<?php echo my_form_error('billing-module', '<span class="help-block">', '</span>'); ?>
				</div>
				
				<div class="form-group<?php echo (my_form_error('whmcs-api-url') != FALSE ? ' has-error' : ''); ?>">
					<label for="whmcs-api-url">Billing API URL:</label>
					<?php echo form_input('whmcs-api-url', $settings['WHMCS_API_URL'], 'class="form-control"'); ?>
					<?php echo my_form_error('whmcs-api-url', '<span class="help-block">', '</span>'); ?>
				</div>
				
				<div class="form-group<?php echo (my_form_error('whmcs-user') != FALSE ? ' has-error' : ''); ?>">
					<label for="whmcs-user">User:</label>
					<?php echo form_input('whmcs-user', $settings['WHMCS_USER'], 'class="form-control"'); ?>
					<?php echo my_form_error('whmcs-user', '<span class="help-block">', '</span>'); ?>
				</div>
				
				<div class="form-group<?php echo (my_form_error('whmcs-api-url') != FALSE ? ' has-error' : ''); ?>">
					<label for="whmcs-password">Password:</label>
					<?php echo form_password('whmcs-password', $settings['WHMCS_PASSWORD'], 'class="form-control"'); ?>
					<?php echo my_form_error('whmcs-password', '<span class="help-block">', '</span>'); ?>
				</div>
				
				<?php echo form_submit('submit', 'Save Settings', 'class="btn btn-primary"'); ?>
        </div>
	<?php echo form_close(); ?>

			<script type="text/javascript">
					$('#billing-module').change(function() {
							if ($('#billing-module option:selected').text() == "Blesta") {
									$('#blesta-settings').slideDown(800);
							} else {
									$('#blesta-settings').slideUp(800);
							}
					});
			</script>