<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Delete Plan <?php echo $plan->plan_name; ?></h4>
                        </div>
                        <div class="modal-body">
                                <p>Are you sure you want to delete <b><?php echo $plan->plan_name; ?></b>?</p>
                        </div>
                        <div class="modal-footer">
                                <?php echo form_open('plan/delete/'.$plan->plan_id); ?>
                                <?php echo form_submit('delete', 'Delete', 'class="btn btn-primary"'); ?>

                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        <?php die(); ?>

<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Delete Plan</div>
                        <div class="panel-body">
                                <p>Are you sure you want to delete <b><?php echo $plan->plan_name; ?></b>?</p>
                                <?php echo form_open('plan/delete/'.$plan->plan_id); ?>
                                <?php echo form_submit('delete', 'Delete', 'class="btn btn-primary"'); ?>
                                <?php echo form_submit('cancel', 'Cancel', 'class="btn btn-default"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>
