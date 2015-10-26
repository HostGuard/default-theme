	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<a href="/server/<?php echo $container->ctid; ?>"  class="btn btn-sm btn-primary pull-right">Back</a>
			<h2>Reinstall <small><?php echo $container->hostname; ?></small></h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
                <?php if ($reinstall_ix): ?>
		<div class="alert alert-info">You are permitted to reinstall this VM <?php echo($reinstall_ix) ?> times this month.
                <?php endif; ?>
		
		<?php if ($reinstall_ix && $this->ion_auth->is_admin()): ?>
			<a title="Reset the number of times the customer can reinstall templates for this VM." href="/server/reinstall/<?php echo($container->ctid) ?>?reset=1" class="btn btn-sm btn-primary pull-right">Reset Limit</a>
		<?php endif; ?>
		</div>
		
                <?php if ($reinstall_ix && $reinstall_ix <= 0): ?>
		<div class="alert alert-danger">You have reached your reinstall limit of <?php echo($reinstall_max) ?> for this VM.  Please wait until next month, or contact support for further assistance.</div>
                
                <?php else: ?>
		
        		<div class="alert alert-danger"><i class="fa fa-bomb"></i> <strong>DANGER!</strong>
                        Reinstalling will irreversibly delete all data.  Ensure you have a current backup before proceeding.</div>
		
                        <?php echo form_open('server/reinstall/'.$container->ctid, array('class' => 'form-horizontal')); ?>
				
			<table class="table table-bordered table-striped table-condensed">
				<?php
					foreach ($templates as $template) {
						echo '
							<tr>
								<td><strong>'.$template->template_name.'</strong><br />'.$template->template_description.'</td>
								<td class="col-sm-1"><input type="radio" name="template" value="'.$template->template_id.'" /></td>
							</tr>';
					}
				?>
			</table>
					
				<div class="alert alert-danger"><input type="checkbox" name="confirm" id="confirm"> <label for="confirm">Tick this box to confirm re-installation. ALL DATA on your server will be deleted!</label></div>
					
				<div class="form-group">
					<label class="control-label col-md-3">Root Password</label>
					<div class="col-md-4">
						<?php echo form_input('password', null, 'class="form-control"'); ?>
					</div>
				</div>
				
				<div class="text-center">
					<?php echo form_submit('submit', 'Re-install', 'class="btn btn-lg btn-danger"'); ?>
					<a href="/server/<?php echo $container->ctid; ?>"  class="btn btn-lg btn-primary">Cancel</a>
				</div>
					
			<?php echo form_close(); ?>
		
                <?php endif; ?>
	</div>
</div>