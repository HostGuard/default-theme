<div class="col-md-12 col-xl-12">
        <div class="panel panel-default">
                <div class="panel-heading">Add ISO</div>
                <div class="panel-body">
                        <?php echo form_open('iso/add', array('class' => 'form-horizontal')); ?>
                        
                        <div class="form-group<?php echo (my_form_error('hypervisor') != FALSE ? ' has-error' : ''); ?>">
                                <label for="hypervisor" class="col-md-3 control-label">Hypervisor:</label>
                                <div class="col-md-8">
                                        <select class="selectpicker" name="hypervisor" id="hypervisor">
                                                <?php
                                                        foreach ($hypervisors as $hypervisor) {
                                                                echo '<option value="'.$hypervisor->virt_id.'">'.$hypervisor->name.'</option>';
                                                        }
                                                ?>
                                        </select>
                                        <?php echo my_form_error('hypervisor', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
        
                        <div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-3 control-label">ISO Name:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('name', set_value('name'), 'class="form-control"') ?>
                                        <?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('description') != FALSE ? ' has-error' : ''); ?>">
                                <label for="description" class="col-md-3 control-label">Description:</label>
                                <div class="col-md-8">
                                        <?php echo form_textarea('description', set_value('description'), 'class="form-control"') ?>
                                        <?php echo my_form_error('description', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('group') != FALSE ? ' has-error' : ''); ?>">
                                <label for="group" class="col-md-3 control-label">Group:</label>
                                <div class="col-md-8">
                                        <?php echo form_dropdown('group', $options, $selected_group, 'class="selectpicker"') ?>
                                        <?php echo my_form_error('group', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group<?php echo (my_form_error('url') != FALSE ? ' has-error' : ''); ?>">
                                <label for="url" class="col-md-3 control-label">URL:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('url', set_value('url'), 'class="form-control"') ?>
                                        <?php echo my_form_error('url', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="submit" class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <?php echo form_submit('submit', 'Add ISO', 'class="btn btn-primary"') ?>
                                </div>
                        </div>

                        <?php echo form_close(); ?>
                </div>
        </div>
</div>