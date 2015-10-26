<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit ISO</h4>
                        </div>

                        <?php echo form_open('iso/edit/'.$iso->iso_id, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="name" class="control-label col-md-3">ISO Name</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('name', $iso->iso_name, 'class="form-control"'); ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="description" class="control-label col-md-3">Description</label>
                                        <div class="col-md-8">
                                                <?php echo form_textarea('description', $iso->iso_description, 'class="form-control"'); ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="group" class="control-label col-md-3">Category</label>
                                        <div class="col-md-8">
                                                <?php echo form_dropdown('group', $iso_groups, $selected_group, 'class="selectpicker"'); ?>
                                        </div>
                                        <script type="text/javascript">
                                                $('.selectpicker').selectpicker({width:'100%'});
                                        </script>
                                </div>
                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?>
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