	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Backup Settings</h2>
		</div>
		<p>The settings below control backups for Snapshot Storage and the HostGuard database.  The database backup is performed 12AM UTC, unless the time has been changed in <code>/etc/cron.d/database-backup</code>.</p>
		<p>You can copy the master's public key (<code>/home/hostguard/.ssh/id_rsa.pub</code>) to the remote server to enable password-less login for database backups.  Snapshot storage requires you create key pair for use on the node and storage server.</p>
	</div>
</div>

<div class="row">

	<?php echo form_open('settings/backup', array('class' => 'form-horizontal')); ?>
	<div class="col-md-6">
		
		<div class="page-header"><h4>HostGuard Database</h4></div>
		                        
			<div class="form-group<?php echo (my_form_error('server') != FALSE ? ' has-error' : ''); ?>">
					<label for="server" class="col-md-3 control-label">Server:</label>
					<div class="col-md-7">
							<?php echo form_input('server', $settings['BACKUP_SERVER'], 'class="form-control"'); ?>
							<?php echo my_form_error('server', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('protocol') != FALSE ? ' has-error' : ''); ?>">
					<label for="protocol" class="col-md-3 control-label">Server:</label>
					<div class="col-md-7">
							<?php echo form_dropdown('protocol', $backup_protocols, $settings['BACKUP_PROTOCOL'], 'class="form-control"'); ?>
							<?php echo my_form_error('protocol', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('port') != FALSE ? ' has-error' : ''); ?>">
					<label for="port" class="col-md-3 control-label">Server:</label>
					<div class="col-md-7">
							<?php echo form_input('port', $settings['BACKUP_PORT'], 'class="form-control"'); ?>
							<?php echo my_form_error('port', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('username') != FALSE ? ' has-error' : ''); ?>">
					<label for="username" class="col-md-3 control-label">Username:</label>
					<div class="col-md-7">
							<?php echo form_input('username', $settings['BACKUP_USERNAME'], 'class="form-control"'); ?>
							<?php echo my_form_error('username', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('password') != FALSE ? ' has-error' : ''); ?>">
					<label for="password" class="col-md-3 control-label">Password:</label>
					<div class="col-md-7">
							<?php echo form_input('password', $settings['BACKUP_PASSWORD'], 'class="form-control"'); ?>
							<?php echo my_form_error('password', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('directory') != FALSE ? ' has-error' : ''); ?>">
					<label for="directory" class="col-md-3 control-label">Directory:</label>
					<div class="col-md-7">
							<?php echo form_input('directory', $settings['BACKUP_DIRECTORY'], 'class="form-control"'); ?>
							<?php echo my_form_error('directory', '<span class="help-block">', '</span>'); ?>
							<p class="help-block">This should be the full, absolute path to the directory you want to store your backups in.  The directory must already exist on the server.</p>
					</div>
			</div>
			
	</div>
	
	<div class="col-md-6">
			<div class="page-header">
					<h4>User Backups / Snapshots</h4>
			</div>
			<p>Leave the Password field blank for key-based logins.  On the node the private key should be located in <code>/root/.ssh/snapshot.id_rsa</code>.</p>
			
			<div class="form-group<?php echo (my_form_error('snapshots') != FALSE ? ' has-error' : ''); ?>">
					<label for="snapshots" class="col-md-3 control-label">Max. Snapshots Per VM:</label>
					<div class="col-md-7">
							<?php echo form_input('snapshots', $settings['VM_MAX_SNAPSHOTS'], 'class="form-control"'); ?>
							<?php echo my_form_error('snapshots', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>

			<div class="form-group<?php echo (my_form_error('stash-days') != FALSE ? ' has-error' : ''); ?>">
					<label for="stash-days" class="col-md-3 control-label">Min. Days Between Stashes:</label>
					<div class="col-md-7">
							<?php echo form_input('stash-days', $settings['STASH_MIN_DAYS'], 'class="form-control"'); ?>
							<?php echo my_form_error('stash-days', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('snapshot-server') != FALSE ? ' has-error' : ''); ?>">
					<label for="snapshot-server" class="col-md-3 control-label">Snapshot Server:</label>
					<div class="col-md-7">
							<?php echo form_input('snapshot-server', $settings['SNAPSHOT_SERVER'], 'class="form-control"'); ?>
							<?php echo my_form_error('snapshot-server', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('snapshot-protocol') != FALSE ? ' has-error' : ''); ?>">
					<label for="snapshot-protocol" class="col-md-3 control-label">Protocol:</label>
					<div class="col-md-7">
							<?php echo form_dropdown('snapshot-protocol', $snapshot_protocols, $settings['SNAPSHOT_PROTOCOL'], 'class="form-control"'); ?>
							<?php echo my_form_error('snapshot-protocol', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>

			<div class="form-group<?php echo (my_form_error('snapshot-port') != FALSE ? ' has-error' : ''); ?>">
					<label for="snapshot-port" class="col-md-3 control-label">Port:</label>
					<div class="col-md-7">
							<?php echo form_input('snapshot-port', $settings['SNAPSHOT_PORT'], 'class="form-control"'); ?>
							<?php echo my_form_error('snapshot-port', '<span class="help-block">', '</span>'); ?>
							<p class="help-block"><b>Defaults:</b> SFTP: 22, FTP: 21, FTPS: 21</p>
					</div>
			</div>

			<div class="form-group<?php echo (my_form_error('snapshot-username') != FALSE ? ' has-error' : ''); ?>">
					<label for="snapshot-username" class="col-md-3 control-label">Username:</label>
					<div class="col-md-7">
							<?php echo form_input('snapshot-username', $settings['SNAPSHOT_USERNAME'], 'class="form-control"'); ?>
							<?php echo my_form_error('snapshot-username', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('snapshot-password') != FALSE ? ' has-error' : ''); ?>">
					<label for="snapshot-password" class="col-md-3 control-label">Password:</label>
					<div class="col-md-7">
							<?php echo form_input('snapshot-password', $settings['SNAPSHOT_PASSWORD'], 'class="form-control"'); ?>
							<?php echo my_form_error('snapshot-password', '<span class="help-block">', '</span>'); ?>
					</div>
			</div>
			
			<div class="form-group<?php echo (my_form_error('snapshot-directory') != FALSE ? ' has-error' : ''); ?>">
					<label for="snapshot-directory" class="col-md-3 control-label">Directory:</label>
					<div class="col-md-7">
							<?php echo form_input('snapshot-directory', $settings['SNAPSHOT_DIRECTORY'], 'class="form-control"'); ?>
							<?php echo my_form_error('snapshot-directory', '<span class="help-block">', '</span>'); ?>
							<p class="help-block">This should be the full, absolute path to the directory you want to store stashed snapshots in.  The directory must already exist on the server.</p>
					</div>
			</div>
			
			<div class="form-group">
					<label for="" class="col-md-3 control-label"> </label>
					<div class="col-md-7">
							<?php echo form_submit('submit', 'Save Settings', 'class="btn btn-primary"'); ?>
					</div>
			</div>
			
			
	</div>
	<?php echo form_close(); ?>