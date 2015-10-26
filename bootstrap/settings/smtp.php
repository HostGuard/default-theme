	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>SMTP Settings</h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<?php echo form_open('settings/smtp', array('class' => 'form-horizontal')); ?>
			
		<div class="form-group<?php echo (my_form_error('email') != FALSE ? ' has-error' : ''); ?>">
				<label for="email" class="col-md-3 control-label">Sender:</label>
				<div class="col-md-7">
						<?php echo form_input('email', $settings['EMAIL'], 'class="form-control"'); ?>
						<?php echo my_form_error('email', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>

		<div class="form-group<?php echo (my_form_error('protocol') != FALSE ? ' has-error' : ''); ?>">
				<label for="protocol" class="col-md-3 control-label">Protocol:</label>
				<div class="col-md-7">
						<select name="protocol" id="protocol" class="form-control">
						<?php
								if ($settings['SMTP_PROTOCOL'] == 'smtp') {
										echo '<option value="sendmail">Sendmail</option><option value="smtp" selected="selected">SMTP</option>';
								} else {
										echo '<option value="sendmail">Sendmail</option><option value="smtp">SMTP</option>';
								}
						?>
						</select>
						<?php echo my_form_error('protocol', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
		
		<?php echo $settings['SMTP_PROTOCOL'] != "smtp" ? '<div id="smtp-settings" style="display: none">' : '<div id="smtp-settings">'; ?>

				<div class="form-group<?php echo (my_form_error('server') != FALSE ? ' has-error' : ''); ?>">
						<label for="server" class="col-md-3 control-label">SMTP Server:</label>
						<div class="col-md-7">
								<?php echo form_input('server', $settings['SMTP_SERVER'], 'class="form-control"'); ?>
								<?php echo my_form_error('server', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
				
				<div class="form-group<?php echo (my_form_error('port') != FALSE ? ' has-error' : ''); ?>">
						<label for="port" class="col-md-3 control-label">Port:</label>
						<div class="col-md-7">
								<?php echo form_input('port', $settings['SMTP_PORT'], 'class="form-control"'); ?>
								<?php echo my_form_error('port', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>

				<div class="form-group<?php echo (my_form_error('username') != FALSE ? ' has-error' : ''); ?>">
						<label for="username" class="col-md-3 control-label">Username:</label>
						<div class="col-md-7">
								<?php echo form_input('username', $settings['SMTP_USERNAME'], 'class="form-control"'); ?>
								<?php echo my_form_error('username', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
				
				<div class="form-group<?php echo (my_form_error('password') != FALSE ? ' has-error' : ''); ?>">
						<label for="password" class="col-md-3 control-label">Password:</label>
						<div class="col-md-7">
								<?php echo form_password('password', $settings['SMTP_PASSWORD'], 'class="form-control"'); ?>
								<?php echo my_form_error('password', '<span class="help-block">', '</span>'); ?>
						</div>
				</div>
		</div>
		
		<div class="form-group">
				<label for="" class="col-md-3 control-label"> </label>
				<div class="col-md-7">
						<?php echo form_submit('submit', 'Save Settings', 'class="btn btn-primary"'); ?>
				</div>
		</div>
		
		<?php echo form_close(); ?>
		
		<script type="text/javascript">
				$('#protocol').change(function() {
						if ($('#protocol option:selected').text() == "SMTP") {
								$('#smtp-settings').slideDown(800);
						} else {
								$('#smtp-settings').slideUp(800);
						}
				});
		</script>
	</div>

	<div class="col-sm-5">
		<dl class="settings-expanded">
			<dt>Protocol</dt>
			<dd>The protocol determines how email will be sent from the server.</dd>
			
			<dt>Sendmail</dt>
			<dd>Emails are sent from the master server using the servers configuration.  Setting up spf and reverse dns records is strongly recommended.</dd>
			
			<dt>SMTP</dt>
			<dd>Send emails through a remote server or service such as Mandrill.  This option may provide better email delivery depending on the server configuration.</dd>
		</dl>
	</div>