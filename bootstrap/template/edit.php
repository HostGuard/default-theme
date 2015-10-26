<?php if ($this->input->is_ajax_request()): ?>
<?php $this->output->set_output(''); ?>
<div class="modal-dialog">
<div class="modal-content">
<?php echo form_open('template/edit/'.$template_type.'/'.$template->template_id, array('class' => 'form-horizontal')); ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit <?php echo $container->hostname; ?> KVM XML</h4>
	</div>
	<div class="modal-body">



<?php else: ?>
<div class="panel panel-default">
	<div class="panel-heading">Edit Template</div>
<?php echo form_open('template/edit/'.$template_type.'/'.$template->template_id, array('class' => 'form-horizontal')); ?>
	<div class="panel-body">
		
<?php endif; ?>

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                                <div class="form-group">
                                        <label for="name" class="control-label col-md-3">Template Name</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('name', $template->template_name, 'class="form-control"'); ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="description" class="control-label col-md-3">Description</label>
                                        <div class="col-md-8">
                                                <?php echo form_textarea('description', $template->template_description, 'class="form-control"'); ?>
                                        </div>
                                </div>
                                
                                
                                        <div class="form-group kvm">
                                                <label for="primary" class="control-label col-md-3">Primary Partition</label>
                                                <div class="col-md-8">
                                                        <?php echo form_input('primary', $template->template_primary_partition, 'class="form-control"'); ?>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group kvm">
                                                <label for="swap" class="control-label col-md-3">Swap Partition</label>
                                                <div class="col-md-8">
                                                        <?php echo form_input('swap', $template->template_swap_partition, 'class="form-control"'); ?>
                                                </div>
                                        </div>

                                        <div class="form-group kvm">
                                                <label for="disk-driver" class="control-label col-md-3">Disk Driver</label>
                                                <div class="col-md-8">
                                                        <?php echo form_dropdown('disk-driver', $kvm_disk_types, $template->template_disk_driver, 'class="selectpicker"'); ?>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group kvm">
                                                <label for="disk-driver" class="control-label col-md-3">NIC Driver</label>
                                                <div class="col-md-8">
                                                        <?php echo form_dropdown('nic-driver', $kvm_nic_types, $template->template_nic_driver, 'class="selectpicker"'); ?>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label for="disk-driver" class="control-label col-md-3">OS Type</label>
                                                <div class="col-md-8">
                                                        <?php echo form_dropdown('os', $kvm_os_types, $template->template_os, 'class="selectpicker"'); ?>
                                                </div>
                                        </div>
                                        
                                        
                                
                                <div class="form-group">
                                        <label for="group" class="control-label col-md-3">Category</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('group', $template_groups, $selected_group, 'class="selectpicker"'); ?>
                                        </div>
                                </div>
                                
                                                        <div class="form-group kvm">
								<label for="kvm_apic" class="col-md-3 control-label">APIC</label>
								<div class="col-md-8">
									<?php echo form_checkbox('kvm_apic', '1', $template->kvm_apic, 'class="switch form-control"'); ?>
								</div>
							</div>
						
							<div class="form-group kvm">
								<label for="kvm_acpi" class="col-md-3 control-label">ACPI</label>
								<div class="col-md-8">
									<?php echo form_checkbox('kvm_acpi', '1', $template->kvm_acpi, 'class="form-control switch"'); ?>
								</div>
							</div>
						
							<div class="form-group kvm">
								<label for="kvm_pae" class="col-md-3 control-label">PAE</label>
								<div class="col-md-8">
									<?php echo form_checkbox('kvm_pae', '1', $template->kvm_pae, 'class="form-control switch"'); ?>
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
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                        <input type="submit" name="submit" value="Save Changes" class="btn btn-primary" />
                                        <a href="/template/index" class="btn btn-default">Cancel</a>
                                </div>
                        </div>
	</div>
	</div>
<?php echo form_close(); ?>
</div>
<?php endif; ?>
