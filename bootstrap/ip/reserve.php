<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Reserve IP</h4>
                        </div>

                        <?php echo form_open('ip/reserve/'.$address, array('class' => 'form-horizontal')); ?>
                        <?php echo form_hidden('return_url', $_GET['return_url']) ?>

                        <div class="modal-body">
                                <p>Are you sure you want to reserve IP address <?php echo long2ip($address);?>?</p>

                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('reserve', 'Reserve', 'class="btn btn-primary"'); ?>
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