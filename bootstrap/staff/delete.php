<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete User</h4>
                        </div>

                        <?php echo form_open('staff/delete/'.$user_id, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <p>Are you sure you want to delete this user? Deleting this user will also delete all Virtual Private Servers belonging to this user.  All data related to this user and their VPSes will be PERMANANTLY DELETED, with no way to recover it. Enter <b>Please delete this user</b> exactly as it appears here into the box below and click Delete.</p>
                                <div class="form-group">
                                        <label for="address" class="control-label col-md-3">Confirmation:</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('confirmation', null, 'class="form-control"'); ?>
                                        </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('delete', 'Delete User', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>

                        <?php echo form_close(); ?>

                </div>
        </div>
        <?php die(); ?>

<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Delete User</div>
                        <div class="panel-body">
                                <?php echo form_open('staff/delete/'.$user_id, array('class' => 'form-horizontal')); ?>
                                <p>Are you sure you want to delete this user? Deleting this user will also delete all Virtual Private Servers belonging to this user.  All data related to this user and their VPSes will be PERMANANTLY DELETED, with no way to recover it. Enter <b>Please delete this user</b> exactly as it appears here into the box below and click Delete.</p>
                                <div class="form-group">
                                        <label for="address" class="control-label col-md-3">Confirmation:</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('confirmation', null, 'class="form-control"'); ?>
                                        </div>
                                </div>
                                
                                <?php echo form_submit('delete', 'Delete User', 'class="btn btn-primary"'); ?>
                                <a href="/staff/listall" class="btn btn-default">Cancel</a>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        
<?php endif; ?>
