<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>

				<div class="modal-dialog">
					<div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Edit Server <?php echo $container->hostname; ?></h4>
                        </div>
                        
                        <?php echo form_open('server/edit/'.$container->ctid, array('class' => 'form-horizontal')); ?>

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>

                        <div class="modal-body">

                                <div class="form-group">
                                        <label for="hostname" class="col-md-3 control-label">Hostname:</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'hostname',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('hostname', $container->hostname));
                                                ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="cpus" class="col-md-3 control-label">CPUs:</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'cpus',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('cpus', $container->cpu_cores));
                                                ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="guaranteed" class="col-md-3 control-label">Guaranteed RAM (MB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'guaranteed',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('guaranteed', $container->memory_guaranteed));
                                                ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="burst" class="col-md-3 control-label">Burst RAM (MB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'burst',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('burst', $container->memory_burst));
                                                ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="disk" class="col-md-3 control-label" >Disk Space (GB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'disk',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('disk', $container->disk_size));
                                                ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="transfer" class="col-md-3 control-label" >Network Transfer (GB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'transfer',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('transfer', $container->bandwidth_allowed));
                                                ?>
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
                        <div class="panel-heading">Edit Server <?php echo $container->hostname; ?></div>
                        <div class="panel-body">
                        
                                <?php echo form_open('server/edit/'.$container->ctid, array('class' => 'form-horizontal')); ?>

                                <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>

                                <div class="form-group<?php echo (my_form_error('hostname') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="hostname" class="col-md-3 control-label">Hostname:</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'hostname',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('hostname', $container->hostname));
                                                ?>
                                                <?php echo my_form_error('hostname', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>

                                <div class="form-group<?php echo (my_form_error('cpus') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="cpus" class="col-md-3 control-label">CPUs:</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'cpus',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('cpus', $container->cpu_cores));
                                                ?>
                                                <?php echo my_form_error('cpus', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>

                                <div class="form-group<?php echo (my_form_error('guaranteed') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="guaranteed" class="col-md-3 control-label">Guaranteed RAM (MB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'guaranteed',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('guaranteed', $container->memory_guaranteed));
                                                ?>
                                                <?php echo my_form_error('guaranteed', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('burst') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="burst" class="col-md-3 control-label">Burst RAM (MB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'burst',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('burst', $container->memory_burst));
                                                ?>
                                                <?php echo my_form_error('burst', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('disk') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="disk" class="col-md-3 control-label" >Disk Space (GB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'disk',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('disk', $container->disk_size));
                                                ?>
                                                <?php echo my_form_error('disk', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group<?php echo (my_form_error('transfer') != FALSE ? ' has-error' : ''); ?>">
                                        <label for="transfer" class="col-md-3 control-label" >Network Transfer (GB):</label>
                                        <div class="col-md-8">
                                                <?php
                                                        $options = array(
                                                                'name' => 'transfer',
                                                                'class' => 'form-control'
                                                        );
                                                        echo form_input($options, set_value('transfer', $container->bandwidth_allowed));
                                                ?>
                                                <?php echo my_form_error('transfer', '<span class="help-block">', '</span>'); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group">\
                                        <div class="col-md-3 control-label"> </div>
                                        <div class="col-md-8">
                                                <input class="btn btn-primary" type="submit" value="Edit Server" />
                                        </div>
                                </div>

                                <?php echo form_close(); ?>

                        </div>


                </div>
        </div>

<?php endif; ?>