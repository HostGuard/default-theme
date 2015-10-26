<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Revoke Key <?php echo $key->name; ?></h4>
                        </div>

                        <div class="modal-body">
                                <p>Are you sure you want to revoke this key? All applications using this key will stop working.</p>
                        </div>
                        <div class="modal-footer">
                                <?php echo form_open('apikeys/delete_key/'.$key->id); ?>
                                <?php echo form_submit('delete', 'Revoke Key', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Revoke Key <?php echo $key->name; ?></div>
                        <div class="panel-body">
                                <p>Are you sure you want to revoke this key? All applications using this key will stop working.</p>

                                <?php echo form_open('apikeys/delete_key/'.$key->id); ?>
                                <?php echo form_submit('Delete', 'Revoke Key', 'class="btn btn-primary"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>
