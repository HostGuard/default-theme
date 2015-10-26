<?php if ($this->input->is_ajax_request()): ?>
<?php $this->output->set_output(''); ?>
<div class="modal-dialog">
<div class="modal-content">
<?php echo form_open('/libkvm/editxml/'.$container->ctid, array('class' => 'form-horizontal')); ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit <?php echo $container->hostname; ?> KVM XML</h4>
	</div>
	<div class="modal-body">



<?php else: ?>
<div class="panel panel-default">
	<div class="panel-heading">Edit <?php echo $container->hostname; ?> KVM XML</div>
<?php echo form_open('/libkvm/editxml/'.$container->ctid, array('class' => 'form-horizontal')); ?>
	<div class="panel-body">
		
<?php endif; ?>
		<p class="alert alert-info">Changes may not necessarily be applied unless the VPS is turned off.  Please turn off the VPS to make XML changes.</p>
		
		<?php echo ($xml_error ? '<p class="alert alert-error">Contents of the KVM XML could not be dumped.  Most likely this is due to a syntax error causing KVM to not accept recent changes.  Please make corrections below.</p>' : "") ?>
		
		<?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>

		<div class="col-md-12">
		
		<div class="form-group">
			<?php
			$data = array(
				'name'        => 'xml',
				'value'       => $xml,
				'cols'        => '70',
				'rows'       => '20',
				'class' => 'form-control'
			);

			echo form_textarea($data);
			?>
		</div>



<?php if ($this->input->is_ajax_request()): ?>
		</div>
	</div>
	<div class="modal-footer">
		<?php echo form_submit('submit', 'Save Changes', 'class="btn btn-primary"'); ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<?php echo form_close(); ?>
	</div>
<?php echo form_close(); ?>
</div>
</div>

<?php die(); ?>
<?php else: ?>
	<div class="form-group">
		<?php echo form_submit('submit', 'Save Changes', 'class="btn btn-primary"'); ?>
		<a href="/server/<?php echo $container->ctid ?>" class="btn btn-default">Cancel</a>
	</div>
	</div>
	</div>
<?php echo form_close(); ?>
</div>
<?php endif; ?>

