<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete rDNS Record</h4>
                        </div>

                        <?php $a_int = inet6_to_int64($address); ?>

                        <?php echo form_open('ip/rdns6delete/'.$a_int[0].'/'.$a_int[1], array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <p>Are you sure you want to delete the rDNS entry for IPv6 address <?php echo $address ?> ?</p>
                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('delete', 'Delete', 'class="btn btn-primary"'); ?>
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
