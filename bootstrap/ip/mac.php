<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Set MAC address for <?php echo long2ip($ip_address); ?></h4>
                        </div>

                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                        <?php echo form_open('ip/mac/'.$ip_address, array('class' => 'form-horizontal')); ?>
                    <?php echo form_hidden('return_url', $_GET['return_url']) ?>
                        
                        <div class="modal-body">
                                <div class="form-group">
                                        <label class="control-label col-md-3">MAC Address</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('mac', $address->mac, 'class="form-control"'); ?>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                        
                        <?php echo form_close(); ?>

                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">

                        </div>
                </div>
        </div>

<?php endif; ?>