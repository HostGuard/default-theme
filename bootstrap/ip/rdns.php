<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Set rDNS for <?php echo long2ip($address) ?></h4>
                        </div>
                        
                        <?php echo form_open('ip/rdns/'.$address, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="rdns" class="col-md-3 control-label">rDNS</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('rdns', $rdns, 'class="form-control"'); ?>
                                        </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Set rDNS for <?php echo long2ip($address) ?></div>
                        <div class="panel-body">
                                <?php echo form_open('ip/rdns/'.$address, array('class' => 'form-horizontal')); ?>

                                <div class="form-group">
                                        <label for="rdns" class="col-md-3 control-label">rDNS</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('rdns', $rdns, 'class="form-control"'); ?>
                                        </div>
                                </div>
                
                                <?php echo form_submit('save', 'Save', 'class="btn btn-primary"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>