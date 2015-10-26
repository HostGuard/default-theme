<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>

        <div class="modal-dialog">
        <?php echo form_open('/template/add/'.$template_type, array('class' => 'form-horizontal')); ?>
        
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Add Template</h4>
                        </div>

                        <div class="modal-body">

<?php else: ?>

<div class="col-md-12 col-xl-12">
        <?php echo form_open('/template/add/'.$template_type, array('class' => 'form-horizontal')); ?>
        <div class="panel panel-default">
                <div class="panel-heading">Add Template</div>
                <div class="panel-body">
        
<?php endif; ?>
                        
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        
                        <div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-3 control-label">Template Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('name', set_value('name'), 'class="form-control"') ?>
                                        <?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('description') != FALSE ? ' has-error' : ''); ?>">
                                <label for="description" class="col-md-3 control-label">Description:</label>
                                <div class="col-md-8">
                                        <?php echo form_textarea('description', set_value('description'), 'class="form-control"') ?>
                                        <?php echo my_form_error('description', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('group') != FALSE ? ' has-error' : ''); ?>">
                                <label for="group" class="col-md-3 control-label">Group:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('group', $groups, 0, 'class="selectpicker"') ?>
                                        <?php echo my_form_error('group', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('url') != FALSE ? ' has-error' : ''); ?>">
                                <label for="url" class="col-md-3 control-label">URL:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('url', set_value('url'), 'class="form-control"') ?>
                                        <?php echo my_form_error('url', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        
                                <div class="kvm form-group<?php echo (my_form_error('primary') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="primary" class="col-md-3 control-label">Primary Partition:</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('primary', set_value('primary'), 'class="form-control"') ?>
                                                <?php echo my_form_error('primary', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="kvm form-group<?php echo (my_form_error('swap') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="swap" class="col-md-3 control-label">Swap Partition:</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('swap', set_value('swap'), 'class="form-control"') ?>
                                                <?php echo my_form_error('swap', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="kvm form-group<?php echo (my_form_error('disk-driver') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="disk-driver" class="col-md-3 control-label">Disk Driver:</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('disk-driver', $kvm_disk_types, set_value('disk-driver'), 'class="selectpicker"') ?>
                                                <?php echo my_form_error('disk-driver', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>                                
                                
                                <div class="kvm form-group<?php echo (my_form_error('nic-driver') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="nic-driver" class="col-md-3 control-label">NIC Driver:</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('nic-driver', $kvm_nic_types, set_value('nic-driver'), 'class="selectpicker"') ?>
                                                <?php echo my_form_error('nic-driver', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('os') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="os" class="col-md-3 control-label">OS Type:</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('os', $kvm_os_types, set_value('os'), 'class="selectpicker"') ?>
                                                <?php echo my_form_error('os', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                                        <div class="form-group kvm">
								<label for="kvm_apic" class="col-md-3 control-label">APIC</label>
								<div class="col-md-8">
									<?php echo form_checkbox('kvm_apic', '1', 'true', 'class="switch form-control"'); ?>
								</div>
							</div>
						
							<div class="form-group kvm">
								<label for="kvm_acpi" class="col-md-3 control-label">ACPI</label>
								<div class="col-md-8">
									<?php echo form_checkbox('kvm_acpi', '1', 'true', 'class="form-control switch"'); ?>
								</div>
							</div>
						
							<div class="form-group kvm">
								<label for="kvm_pae" class="col-md-3 control-label">PAE</label>
								<div class="col-md-8">
									<?php echo form_checkbox('kvm_pae', '1', '', 'class="form-control switch"'); ?>
								</div>
							</div>
                                
                                
                                <script>
                                        $('.switch').bootstrapSwitch();
                                </script>
                                
                                <?php if ($template_type != "kvm"): ?>
                                <script>
                                        $(".kvm").hide();
                                        
                                </script>
                                <?php endif; ?>
                                


<?php if ($this->input->is_ajax_request()): ?>

                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Add Template', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
         
                </div>
                <?php echo form_close(); ?>

        </div>
        <?php die(); ?>

<?php else: ?>

                        <div class="form-group">
                                <label for="submit" class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <?php echo form_submit('submit', 'Add Template', 'class="btn btn-primary"') ?>
                                </div>
                        </div>

                        
                </div>
        </div>
        <?php echo form_close(); ?>
</div>
        
<?php endif; ?>







