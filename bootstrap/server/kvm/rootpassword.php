<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Reset Root Password for <?php echo $container->hostname; ?></h4>
                        </div>



                        <?php echo form_open('server/rootpassword/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                        <?php echo form_hidden("return_url", ($_GET["return_url"] > "" ? $_GET["return_url"] : $_POST["return_url"])) ?>

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        
                        <div class="modal-body">
                        
                                <?php
                                        $this->load->view('error', array('type' => 'info', 'message' => 'This function attempts to reset the root password on Linux VPS servers using the standard partition layout with filesystem on sda1.  Your server will be shut down, the password change attempted, and the server booted again. This process could take up to 5 minutes to complete. <br><br>
										This function will not work on BSD or Windows based servers. Consult your operating system\'s documentation for instructions on resetting the administrator or root password.'));
                                ?>

                                <div class="form-group">
                                        <label for="password" class="col-md-2 control-label">Password:</label>
                                        <div class="col-md-10">
                                                <?php echo form_input('password', '', 'class="form-control"'); ?>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Reset Password', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>

                        <?php echo form_close(); ?>
                </div>
        </div>
        <?php die(); ?>
        
<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Reset Root Password for <?php echo $container->hostname; ?></div>
                        <div class="panel-body">
                                <?php echo form_open('server/rootpassword/'.$container->ctid, array('class' => 'form-horizontal')); ?>
                                <?php echo form_hidden("return_url", ($_GET["return_url"] > "" ? $_GET["return_url"] : $_POST["return_url"])) ?>

                                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                                <div class="form-group">
                                        <label for="password" class="col-md-2 control-label">Password:</label>
                                        <div class="col-md-10">
                                                <?php echo form_input('password', '', 'class="form-control"'); ?>
                                        </div>
                                </div>
                                <?php echo form_submit('submit', 'Reset Password', 'class="btn btn-primary"'); ?>
                                <?php echo '<a href="/server/' .$this->uri->segment(3).'" class="btn btn-default">Cancel</a>' ?>
                                <?php echo form_close(); ?>
                        </div>
                </div>
        </div>

<?php endif; ?>