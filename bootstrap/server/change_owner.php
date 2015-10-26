<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">

                        <?php echo form_open('server/change_owner/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Change Owner</h4>
                        </div>

                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="user" class="col-md-3 control-label">User:</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('user', $options, $container->user, 'class="form-control selectpicker" data-live-search="true"'); ?>
                                        </div>
                                        <script type="text/javascript">
                                                $('.selectpicker').selectpicker({width:'100%'});
                                        </script>
                                </div>
                        </div>
                        
                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Change User', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>

                        <?php echo form_close(); ?>

                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Change Owner for <?php $container->hostname; ?></div>
                        <div class="panel-body">
                                <?php echo form_open('server/change_owner/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                
                                <div class="form-group">
                                        <label for="user" class="col-md-3 control-label">User:</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('user', $options, $container->user, 'class="selectpicker" data-live-search="true"'); ?>
                                        </div>
                                </div>
                                
                                <?php echo form_submit('submit', 'Change User', 'class="btn btn-primary"'); ?>
                                <?php echo form_submit('cancel', 'Cancel', 'class="btn btn-default"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>