<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Delete domain <?php echo $domain->name; ?></h4>
                        </div>
                        
                        <?php echo form_open('dns/delete_zone/'.$domain->id, array('class' => 'form-horizontal')); ?>
                        <div class="modal-body">
                                <p>Are you sure you want to delete this DNS zone?</p>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <?php echo form_submit('delete', 'Delete', 'class="btn btn-primary"'); ?>
                        </div>
                        <?php echo form_close(); ?>
                </div>
        </div>
        <?php die(); ?>
<?php else: ?>

<?php endif; ?>


