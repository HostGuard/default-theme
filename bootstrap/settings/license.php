	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>License Settings</h2>
		</div>
	</div>
</div>

<div class="row">

<?php
        if ($this->licensing->data['status'] !== "Active") {
                switch($this->licensing->data['status']) {
                        case "Expired":
                                $message = 'Your HostGuard license <b>'.$settings['LICENSE_KEY'].'</b> is currently expired.  Please visit <a href="https://portal.hostguard.net">https://portal.hostguard.net</a> to renew your license.';
                        break;
                        case "Invalid":
                                $message = 'Your HostGuard license <b>'.$settings['LICENSE_KEY'].'</b> is invalid.  Possible reasons for this include:<br /><br />
                                                <span style="margin-left: 40px">&raquo; Your license key has been entered incorrectly</span><br />
                                                <span style="margin-left: 40px">&raquo; The domain being used to access your install has changed</span><br />
                                                <span style="margin-left: 40px">&raquo; The IP address your install is located on has changed</span><br />
                                                <span style="margin-left: 40px">&raquo; The directory you are using has changed</span><br />
                                        <br />
                                        If required, you can reissue your license at <a href="https://portal.hostguard.net/clientarea.php">https://portal.hostguard.net/clientarea.php</a>, which will update the allowed IP address, hostname and directory.  If the license key has been entered incorrectly, you can update the key below.';
                        break;
                        case "Suspended":
                                $message = 'Your HostGuard license <b>'.$settings['LICENSE_KEY'].'</b> is currently suspended. Please contact <a href="http://portal.hostguard.net/clientarea.php">HostGuard Support</a> for assistance.';
                        break;
                }
                                                
                $this->load->view('error', array('type' => 'error', 'message' => $message));
        }
        
        if ($this->licensing->node_count > $this->licensing->data['customfields']['allowedslaves'] && $this->licensing->data['status'] == "Active") {
                        $this->load->view('error', array('type' => 'error-empty', 'message' => 'You have reached the maximum number of nodes allowed with your HostGuard license.  Please visit <a href="https://portal.hostguard.net/clientarea.php">https://portal.hostguard.net/clientarea.php</a> to purchase licensing for additional nodes.'));
        }
?>

	<div class="col-md-6">
		<table class="table table-condensed table-bordered table-striped">
				<tr><th>License Key</th><td><?php echo $settings['LICENSE_KEY']; ?></td></tr>
				<tr><th>License Status</th><td><?php echo $this->licensing->data['status']; ?></td></tr>
				<tr><th>Registered To</th><td><?php echo $this->licensing->data['registeredname']; ?></td></tr>
				<tr><th>Email</th><td><?php echo $this->licensing->data['email']; ?></td></tr>
				<tr><th>Valid Domain</th><td><?php echo $this->licensing->data['validdomain']; ?></td></tr>
				<tr><th>Valid IP</th><td><?php echo $this->licensing->data['validip']; ?></td></tr>
				<tr><th>Valid Directory</th><td><?php echo $this->licensing->data['validdirectory']; ?></td></tr>
				<tr><th>Slaves Allowed</th><td><?php echo $this->licensing->data['customfields']['allowedslaves']; ?></td></tr>
		</table>
	</div>

	<div class="col-md-6">
		
		<h4>Update License</h4>
		<?php echo form_open('settings/license', array('class' => 'form-horizontal')); ?>
		
		<div class="form-group<?php echo (my_form_error('key') != FALSE ? ' has-error' : ''); ?>">
				<label for="key" class="col-md-3 control-label">License Key:</label>
				<div class="col-md-7">
						<?php echo form_input('key', $settings['LICENSE_KEY'], 'class="form-control"'); ?>
						<?php echo my_form_error('key', '<span class="help-block">', '</span>'); ?>
				</div>
		</div>
		
		<div class="form-group">
				<label for="" class="col-md-3 control-label"> </label>
				<div class="col-md-7">
						<?php echo form_submit('submit', 'Update Key', 'class="btn btn-primary"'); ?>
				</div>
		</div>
		
		<?php echo form_close(); ?>

		<hr>
		<h4>Add Slaves</h4>
		<p>Additional slaves can be added at any time through our Client Area.</p>
		<p class="text-center"><a href="https://portal.hostguard.net/clientarea.php" class="btn btn-success btn-md">Add Slaves</a></p>

	</div>