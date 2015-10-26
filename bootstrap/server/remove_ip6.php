<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Remove IPv6 Block</h4>
                        </div>

                        <?php echo form_open('server/remove_ip6/'.$container->ctid.'/'.$ip, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <p>Are you sure you want to remove IP Block <?php echo int64_to_inet6(array($ip, 0)); ?>/64 from this server?</p>
                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('remove', 'Remove', 'class="btn btn-primary"'); ?>
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