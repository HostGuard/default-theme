<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Add rDNS Record</h4>
                        </div>

                        <?php echo form_open('ip/rdns6/'.$a_int[0].'/'.$a_int[1], array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="address" class="control-label col-md-3">Address</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('address', $address, 'class="form-control"'); ?>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="address" class="control-label col-md-3">rDNS</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('rdns', $rdns, 'class="form-control"'); ?>
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

