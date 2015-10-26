<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Add Node</div>
        <div class="panel-body">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>

            <?php
            $data = array('type' => 'important', 'message' => 'Adding a node is only half the process.  A script will be generated for the API to install the other half on your system.  You will need root access to the system.');
            $this->load->view('error', $data);
            ?>
            <?php echo form_open('node/add', array('class' => 'form-horizontal')); ?>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hostname">Hostname:</label>
                <div class="col-md-8"><?php echo form_input('hostname', set_value('hostname'), 'class="form-control"') ?></div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="node-ip">IP Address:</label>
                <div class="col-md-8"><?php echo form_input('node-ip', set_value('node-ip'), 'class="form-control"') ?></div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="node-gateway">Gateway Address:</label>
                <div class="col-md-8"><?php echo form_input('node-gateway', set_value('node-gateway'), 'class="form-control"') ?></div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="node-netmask">Netmask Address:</label>
                <div class="col-md-8"><?php echo form_input('node-netmask', set_value('node-netmask'), 'class="form-control"') ?></div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="node-broadcast">Broadcast Address:</label>
                <div class="col-md-8"><?php echo form_input('node-broadcast', set_value('node-broadcast'), 'class="form-control"') ?></div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="node-dns">DNS Address:</label>
                <div class="col-md-8"><?php echo form_input('node-dns', set_value('node-dns'), 'class="form-control"') ?></div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="port">SSH Port:</label>
                <div class="col-md-8"><?php echo form_input('port', set_value('port'), 'class="form-control"') ?></div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="location">Location:</label>
                <div class="col-md-8">
                        <?php
                        echo form_dropdown('location', $locations, set_value('location'), 'class="form-control"');
                        ?>
                </div>
            </div>

                <div class="form-group<?php echo (my_form_error('vol_group') != FALSE ? ' has-error' : ''); ?>">
                    <label for="volumegroup" class="col-md-3 control-label">Volume Group:</label>
                    <div class="col-md-8">
                        <?php echo form_input('vol_group', set_value('vol_group'), 'class="form-control"'); ?>
                        <p class="alert alert-info" style="margin-top:10px;">Typical value is "vps".  If you do not know the value, then do not enter one here.  The install script will guide you to the correct value.</p>
                        <?php echo my_form_error('vol_group', '<span class="alert alert-danger">', '</span>'); ?>
                    </div>
                </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hypervisor">Hypervisor:</label>
                <div class="col-md-8">
                    <?php
                    echo form_dropdown('hypervisor', $hypervisors, set_value('hypervisor'), 'class="form-control"');
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="distro">Operating System:</label>
                <div class="col-md-8">
                    <?php
                    $os = array(
                        'el5' => 'CentOS/EL 5',
                        'el6' => 'CentOS/EL 6',
                        'ub12' => 'Debian 7/Ubuntu 12',
                    );
                    echo form_dropdown('distro', $os, set_value('distro'), 'class="form-control"');
                    ?>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label"> </label>
                <div class="col-md-8">
                    <input class="btn btn-primary" type="submit" value="Add Server" />
                    <a href="/node/index" class="btn btn-default">Cancel</a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>

