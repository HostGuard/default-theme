<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete IPv6 Block <?php echo $block->block_name; ?></h4>
                        </div>
                        <div class="modal-body">
                                <?php $this->load->view('error', array('type' => 'error', 'message' => 'Deleting this block will remove any IP addresses from this block that have been assigned to VMs!')); ?>
                                <p>Are you sure you want to delete this block?</p>
                        </div>
                        <div class="modal-footer">
                                <?php echo form_open('ip/delete_block6/'.$block->block_id); ?>
                                <?php echo form_submit('submit', 'Delete Block', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Delete IPv6 Block <?php echo $block->block_name; ?></div>
                        <div class="panel-body">
                                <?php $this->load->view('error', array('type' => 'error', 'message' => 'Deleting this block will remove any IP addresses from this block that have been assigned to VMs!')); ?>
                                <p>Are you sure you want to delete this block?</p>
                                <?php echo form_open('ip/delete_block6/'.$block->block_id); ?>
                                <?php echo form_submit('submit', 'Delete Block', 'class="btn btn-primary"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>