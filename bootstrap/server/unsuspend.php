<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        
                        <?php echo form_open('server/unsuspend/'.$container->ctid, array('class' => 'form-horizontal')); ?>

                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Unsuspend Server</h4>
                        </div>
                        
                        <div class="modal-body">
                                <p>Please enter a reason for unsuspension.  Please note that this will be visible to the customer!</p>
                                <div class="form-group<?php echo (my_form_error('reason') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="reason" class="col-md-3 control-label">Reason:</label>
                                        <div class="col-md-7">
                                                <?php echo form_input('reason', set_value('reason'), 'class="form-control"'); ?>
                                                <?php echo my_form_error('reason', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="modal-footer">
                                <?php echo form_submit('unsuspend', 'Unsuspend', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <?php echo form_close(); ?>
                        </div>
                        
                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>
        <?php echo validation_errors(); ?>
        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Unsuspend Server <?php echo $container->hostname; ?></div>
                        <div class="panel-body">
                                <p>Please enter a reason for unsuspension.  Please note that this will be visible to the customer!</p>
                                
                                <?php echo form_open('server/unsuspend/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                
                                <div class="form-group<?php echo (my_form_error('reason') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="reason" class="col-md-3 control-label">Reason:</label>
                                        <div class="col-md-7">
                                                <?php echo form_input('reason', set_value('reason'), 'class="form-control"'); ?>
                                                <?php echo my_form_error('reason', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <?php echo form_submit('unsuspend', 'Unsuspend', 'class="btn btn-primary"'); ?>
                                <?php echo form_submit('cancel', 'Cancel', 'class="btn btn-default"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>