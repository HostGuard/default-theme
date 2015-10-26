<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete Group <?php echo $group->name; ?></h4>
                        </div>
                        
                        <?php echo form_open('group/delete/'.$group->id, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <p>During the deletion of a group, users assigned to this group must be reassigned to another group.  Choose a group below.</p>
                                <div class="form-group">
                                        <label for="newgroup" class="col-md-3 control-label">New Group:</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('newgroup', $groups, null, 'class="form-control"'); ?>
                                        </div>
                                </div>
                        </div>
                        <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <?php echo form_submit('submit', 'Delete Group', 'class="btn btn-danger"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Delete Group <?php echo $group->name; ?></div>
                        <div class="panel-body">
                                
                                <?php echo form_open('group/delete/'.$group->id, array('class' => 'form-horizontal')); ?>
                                
                                <p>During the deletion of a group, users assigned to this group must be reassigned to another group.  Choose a group below.</p>
                                
                                <div class="form-group">
                                        <label for="newgroup" class="col-md-3 control-label">New Group:</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('newgroup', $groups, null, 'class="selectpicker"'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-md-3 control-label"> </label>
                                        <div class="col-md-8">
                                                <?php echo form_submit('submit', 'Delete Group', 'class="btn btn-primary"'); ?>
                                        </div>
                                </div>
                                
                                <?php echo form_close(); ?>

                        </div>
                </div>
        </div>

<?php endif; ?>
