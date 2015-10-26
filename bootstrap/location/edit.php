<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit Location <?php echo $location->location_name; ?></h4>
                        </div>
                        
                        <?php echo form_open('location/edit/'.$location->location_id, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Location Name:</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('name', $location->location_name, 'class="form-control"') ?>
                                        </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Save Changes', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Edit Location <?php echo $location->location_name; ?></div>
                        <div class="panel-body">
                                <?php 
                                        echo validation_errors('<div class="alert alert-danger">', '</div>');
                                        echo form_open('location/edit/'.$location->location_id, array('class' => 'form-horizontal'));
                                ?>
                                                
                                <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Location Name:</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('name', $location->location_name, 'class="form-control"') ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-md-3 control-label"> </label>
                                        <div class="col-md-8">
                                                <input class="btn btn-default" type="submit" name="submit" value="Save Changes" />
                                        </div>
                                </div>
                                
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>