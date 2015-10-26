<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        
                        <?php echo form_open('server/destroy/'.$container->ctid, array('class' => 'form-horizontal')); ?>

                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Destroy Server <?php echo $container->hostname; ?></h4>
                        </div>
                        
                        <div class="modal-body">
                                <p>Are you sure you want to destroy this VPS? All data related to this VPS will be PERMANENTLY DELETED. 
                                <?php if ($this->ion_auth->hgsettings['DATA_SCRUB'] == 'always') {
                                        echo 'For security purposes, all data on the VPS hard disk will be overwritten to prevent recovery. ';
                                }
                                ?></p>
                                
                                <p>Enter <b>Please destroy this VPS</b> exactly as it appears here into the Confirmation box below and click Destroy.</p>

                                <?php
                                        if ($this->ion_auth->hgsettings['DATA_SCRUB'] == "per-vm" || $this->ion_auth->hgsettings['DATA_SCRUB'] == "per-vm-no") {
                                                echo '
                                                        <p>If you wish to securely erase the underlying logical volume before deleting the virtual machine, check the "Secure Erase" checkbox below. The entire logical volume will be overwritten with all 0\'s, making recovery completely impossible.</p>';
                                        }
                                ?>
                                
                                <div class="form-group<?php echo (my_form_error('confirmation') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="confirmation" class="col-md-2 control-label">Confirmation:</label>
                                        <div class="col-md-10">
                                                <?php echo form_input('confirmation', set_value('confirmation'), 'class="form-control"'); ?>
                                                <?php echo my_form_error('confirmation', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <?php
                                        if ($this->ion_auth->hgsettings['DATA_SCRUB'] == "per-vm" || $this->ion_auth->hgsettings['DATA_SCRUB'] == "per-vm-no") {
                                                echo '
												 <div class="form-group">
													<div class="col-md-offset-2 col-md-10">
                                                        <div class="checkbox">
                                                                <label>
                                                                        <input type="checkbox" name="scrub" value="1" '.($this->ion_auth->hgsettings['DATA_SCRUB'] == 'per-vm' ? 'checked="checked"' : '').'> Secure Erase
                                                                </label>
                                                        </div>
													</div>
												</div>';
                                        }
                                ?>
                        </div>
                        
                        <div class="modal-footer">
                                <?php echo form_submit('destroy', 'Destroy', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                        
                        <?php echo form_close(); ?>

                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Destroy Server <?php echo $container->hostname; ?></div>
                        <div class="panel-body">
                                <p>Are you sure you want to destroy this VPS? All data related to this VPS will be PERMANENTLY DELETED. 
                                <?php if ($this->ion_auth->hgsettings['DATA_SCRUB'] == 'always') {
                                        echo 'For security purposes, all data on the VPS hard disk will be overwritten to prevent recovery. ';
                                }
                                ?></p>

                                <p>Enter <b>Please destroy this VPS</b> exactly as it appears here into the Confirmation box below and click Destroy.</p>
                                
                                <?php echo form_open('server/destroy/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                                                
                                <?php
                                        if ($this->ion_auth->hgsettings['DATA_SCRUB'] == "per-vm" || $this->ion_auth->hgsettings['DATA_SCRUB'] == "per-vm-no") {
                                                echo '
                                                        <p>If you wish to securely erase the underlying logical volume before deleting the virtual machine, check the "Secure Erase" checkbox below. The entire logical volume will be overwritten with all 0\'s, making recovery completely impossible.</p>
                                                        <div class="checkbox">
                                                                <label>
                                                                        <input type="checkbox" name="scrub" value="1" '.($this->ion_auth->hgsettings['DATA_SCRUB'] == 'per-vm' ? 'checked="checked"' : '').'> Secure Erase
                                                                </label>
                                                        </div>';
                                        }
                                ?>

                                <div class="form-group<?php echo (my_form_error('confirmation') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="confirmation" class="col-md-3 control-label">Confirmation:</label>
                                        <div class="col-md-7">
                                                <?php echo form_input('confirmation', set_value('confirmation'), 'class="form-control"'); ?>
                                                <?php echo my_form_error('confirmation', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <?php echo form_submit('destroy', 'Destroy', 'class="btn btn-primary"'); ?>
                                <?php echo form_submit('cancel', 'Cancel', 'class="btn btn-default"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>