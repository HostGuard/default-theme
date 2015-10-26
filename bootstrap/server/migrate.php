<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <?php echo form_open('server/migrate/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                       
                       <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Migrate Server</h4>
                        </div>
                     
                        <div class="modal-body">
                                <div class="form-group">
                                        <label class="col-md-3 control-label">New Node:</label>
                                        <div class="col-md-8">
                                                <select name="new-node" class="selectpicker">
                                                        <?php echo $node_dropdown; ?>
                                                </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-3 control-label" for="delete">Delete old VPS</label>
                                        <div class="col-md-8">
                                                <select name="delete" class="selectpicker">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                </select>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="mode" class="col-md-3 control-label">Mode:</label>
                                        <div class="col-md-8">
                                                <select name="mode" class="selectpicker">
                                                        <option value="2">Migrate with data copy</option>
                                                        <option value="1">Migrate without data copy</option>
                                                        <option value="3">Live Migration</option>
                                                </select>
                                                
                                                <p class="help-block"><strong>Migrate without data copy:</strong> this will only update the node in HostGuard and will not actually move the VM.</p>
                                        </div>
                                </div>
                                
                                <script type="text/javascript">
                                        $('.selectpicker').selectpicker({width:'100%'});
                                </script>
                        </div>
                      
                        <div class="modal-footer">
                                <?php echo form_submit('migrate', 'Migrate', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                        
                        <?php echo form_close(); ?>

                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Migrate Server <?php echo $container->hostname; ?></div>
                        <div class="panel-body">
                                <?php echo form_open('server/migrate/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                
                                <div class="form-group">
                                        <label class="col-md-3 control-label">New Node:</label>
                                        <div class="col-md-8">
                                                <select name="new-node" class="selectpicker">
                                                        <?php echo $node_dropdown; ?>
                                                </select>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="mode" class="col-md-3 control-label">Mode:</label>
                                        <div class="col-md-8">
                                                <select name="mode" class="selectpicker">
                                                        <option value="2">Migrate with data copy</option>
                                                        <option value="1">Migrate without data copy</option>
                                                        <option value="3">Live Migration</option>
                                                </select>
                                                <p class="help-block"><strong>Migrate without data copy:</strong> this will only update the node in HostGuard and will not actually move the VM.</p>
                                        </div>
                                </div>
                                
                                <?php echo form_submit('migrate', 'Migrate', 'class="btn btn-primary"'); ?>
                                <?php echo form_submit('cancel', 'Cancel', 'class="btn btn-default"'); ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>