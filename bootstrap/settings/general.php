	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>General Settings</h2>
		</div>
	</div>
</div>

<div class="row">

	<div class="col-sm-7">
		<?php echo form_open('settings/general', array('class' => 'form-horizontal')); ?>
		
		<div class="form-group<?php echo (my_form_error('company') != FALSE ? ' has-error' : ''); ?>">
				<label for="company" class="col-md-3 control-label">Company:</label>
				<div class="col-md-7">
						<?php echo form_input('company', $settings['COMPANY'], 'class="form-control"'); ?>
						<?php echo my_form_error('company', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>

		<div class="form-group<?php echo (my_form_error('cp_url') != FALSE ? ' has-error' : ''); ?>">
				<label for="cp_url" class="col-md-3 control-label">Control Panel URL:</label>
				<div class="col-md-7">
						<?php echo form_input('cp_url', $settings['CONTROL_PANEL_URL'], 'class="form-control"'); ?>
						<?php echo my_form_error('cp_url', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
					
		<div class="form-group<?php echo (my_form_error('support_url') != FALSE ? ' has-error' : ''); ?>">
				<label for="support_url" class="col-md-3 control-label">Support Ticket URL:</label>
				<div class="col-md-7">
						<?php echo form_input('support_url', $settings['SUPPORT_TICKET_URL'], 'class="form-control"'); ?>
						<?php echo my_form_error('support_url', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
					
		<div class="form-group<?php echo (my_form_error('support_email') != FALSE ? ' has-error' : ''); ?>">
				<label for="support_email" class="col-md-3 control-label">Support E-mail:</label>
				<div class="col-md-7">
						<?php echo form_input('support_email', $settings['SUPPORT_EMAIL'], 'class="form-control"'); ?>
						<?php echo my_form_error('support_email', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
								
		<div class="form-group<?php echo (my_form_error('data_scrub') != FALSE ? ' has-error' : ''); ?>">
				<label for="data_scrub" class="col-md-3 control-label">Securely Delete VM Data:</label>
				<div class="col-md-7">
						<?php echo form_dropdown('data_scrub', $scrub_options, $settings['DATA_SCRUB'], 'class="form-control"'); ?>
						<?php echo my_form_error('data_scrub', '<span class="help-block">', '</span>'); ?>

					
				</div>
		</div>
					
		<div class="form-group<?php echo (my_form_error('stock_policy') != FALSE ? ' has-error' : ''); ?>">
				<label for="stock_policy" class="col-md-3 control-label">Node Selection Method:</label>
				<div class="col-md-7">
						<?php echo form_dropdown('stock_policy', $stock_options, $settings['STOCK_POLICY'], 'class="form-control"'); ?>
						<?php echo my_form_error('stock_policy', '<span class="help-block">', '</span>'); ?>
					
				</div>
		</div>


		<div class="form-group<?php echo (my_form_error('IPBLOCK_V6') != FALSE ? ' has-error' : ''); ?>">
			<label for="data_scrub" class="col-md-3 control-label">Require IPv6 Blocks</label>
			<div class="col-md-7">
				<?php
				$options = array("optional" => "Optional",
					"required" => "Required");
				?>
				<?php echo form_dropdown('IPBLOCK_V6', $options, $settings['IPBLOCK_V6'], 'class="form-control"'); ?>
				<?php echo my_form_error('IPBLOCK_V6', '<span class="help-block">', '</span>'); ?>
				
			</div>
		</div>
		
		
		<div class="form-group<?php echo (my_form_error('CREINSTALL_MAX') != FALSE ? ' has-error' : ''); ?>">
			<label for="reinstall_limit" class="col-md-3 control-label">Reinstall Limit</label>
			<div class="col-md-7">
				<?php echo form_input('CREINSTALL_MAX', $settings['CREINSTALL_MAX'], 'class="form-control"'); ?>
				<p class="help-block">The number of times a VM can be reinstalled in a month for customers. (0 means unlimited)</p>
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-md-3 control-label"> </label>
			<div class="col-md-7">
				<?php echo form_submit('submit', "Save Settings", 'class="btn btn-primary"'); ?>
			</div>
		</div>
					
		<?php echo form_close(); ?>

	</div>
	<div class="col-sm-5">
		<dl class="settings-expanded">
			<dt>Company</dt>
			<dd>Provide the company name you would like displayed throughout HostGuard.  The company name is used in email notices from the system.</dd>
		
			<dt>Control Panel URL</dt>
			<dd>Provide the address to access HostGuard.  This address is used in email notices from the system.</dd>
			
			<dt>Support Ticket URL</dt>
			<dd>Provide the address where support requests can be submitted.</dd>
			
			<dt>Support E-Mail</dt>
			<dd>Provide the e-mail address where support requests can be sent.</dd>
			
			<dt>Securely Delete VM Data:</dt>
			<dd>Do you want the data totally obliterated when destroying a VM?  This process is disk intensive. Default values will be applied to unspecified API requests. <strong>Recommended:</strong> Always or Per VM (Default: Yes)</dd>
			
			<dt>Node Selection Method</dt>
			<dd>How should new VMs be created?  Node Resources will fill one node at a time, where Stock Based will use the node with most available inventory of that plan.</dd>
			
			<dt>Require IPv6 Blocks</dt>
			<dd>Should the creation of new VMs fail if there are insufficient IPv6 blocks</dd>
		</dl>
	</div>