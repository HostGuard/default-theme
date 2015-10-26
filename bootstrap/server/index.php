<?php
        if ($container->suspended == 1) {
                $this->load->view('error', array('type' => 'error', 'message' => 'Your VPS is currently suspended.  Please contact support for more information.'));
        }
        
        foreach ($alerts as $alert) {
                $this->load->view('useralert', $alert);
        }
?>

<div class="col-md-6">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $container->hostname; ?></div>
                <div class="panel-body">
                        <table class="table table-condensed table-bordered container-info">
                        <?php

                        echo '
                                <tr><th class="col-lg-3">IP Address</th><td>'.long2ip($container->ip_address).'</td></tr>
                                <tr><th>Node</th><td> '.$node->node_name.'</td></tr>
                                <tr><th>Location</th><td>'.$node->location_name.'</td></tr>';
                                        
                        if ($this->ion_auth->is_admin() === TRUE) {
                                echo '<tr><th>Owner</th><td>'.$owner->first_name.' '.$owner->last_name.' ('.$owner->email.')</td></tr>';
                                echo '<tr><th>ctid</th><td>'.$container->ctid.'</td></tr>';
                                echo '<tr><th>vserverid</th><td>'.$container->vserverid.'</td></tr>';
                        }
                        
                        echo '</table>';
                        
                        ?>
                </div>
        </div>
</div>

<div class="col-md-6">
        <div class="panel panel-default">
                <div class="panel-heading">Status</div>
                <div class="panel-body">
                <?php
                        if ($container->load_average > $container->load_critical) {
                                $load1style = 'label label-danger';
                        } elseif ($container->load_average > $container->load_warning) {
                                $load1style = 'label label-warning';
                        } else {
                                $load1style = 'label label-success';
                        }
                        if ($container->load_average_5 > $container->load_critical) {
                                $load5style = 'label label-danger';
                        } elseif ($container->load_average5 > $container->load_warning) {
                                $load5style = 'label label-warning';
                        } else {
                                $load5style = 'label label-success';
                        }
                        if ($container->load_average_15 > $container->load_critical) {
                                $load15style = 'label label-danger';
                        } elseif ($container->load_average_15 > $container->load_warning) {
                                $load15style = 'label label-warning';
                        } else {
                                $load15style = 'label label-success';
                        }
                ?>

                        <table class="container-info table">
                                <tr><th>Status</th><td><span class="status-<?php echo $container->status; ?>"><?php echo ucfirst($container->status); ?></span></td></tr>

                                <tr>
                                        <th>Load</th>
                                        <td><span class="<?php echo $load1style; ?>"><?php echo $container->load_average; ?></span> <span class="<?php echo $load5style; ?>"><?php echo $container->load_average_5; ?></span> <span class="<?php echo $load15style; ?>"><?php echo $container->load_average_15; ?></span></td>
                                </tr>

                                <tr>
                                        <th>Memory</th>
                                        <td>
                                                <div class="progress" style="max-width: 250px">
                                                        <span><?php echo $container->memory_used; ?> MB / <?php echo $container->memory_burst; ?> MB</span>
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $container->memory_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $container->memory_burst; ?>" style="width: <?php echo max((($container->memory_used / $container->memory_burst) * 100), 1); ?>%"></div>
                                                </div>
                                        </td>
                                </tr>

                                <tr>
                                        <th>Disk</th>
                                        <td>
                                                <div class="progress" style="max-width: 250px">
                                                        <span><?php echo byte_format($container->disk_used * 1024 * 1024).' / '.$container->disk_size; ?> GB</span>
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ($container->disk_used * 1024 * 1024); ?>" aria-valuemin="0" aria-valuemax="<?php echo $container->disk_size; ?>" style="width:<?php echo max((($container->disk_used/1024 / $container->disk_size) * 100), 1); ?>%"></div>
                                                </div>
                                        </td>
                                </tr>
                                
                                <tr>
                                        <th>Bandwidth</th>
                                        <td>
                                                <div class="progress" style="max-width: 250px">
                                                        <span><?php echo byte_format($container->bandwidth_total).' / '.$container->bandwidth_allowed ;?> GB</span>
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $container->bandwidth_total; ?>" aria-valuemin="0" aria-valuemax="<?php echo ($container->bandwidth_allowed*1024*1024*1024); ?>" style="width: <?php echo min(100, max((($container->bandwidth_total / ($container->bandwidth_allowed*1024*1024*1024)) * 100), 1)); ?>%"></div>
                                                </div>
                                        </td>
                                </tr>
                        </table>
                </div>
        </div>
</div>

<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Power Options</div>
                <div class="panel-body">
                        <ul id="power-options" class="col-lg-12 list-inline">
                                <?php
                                        echo '
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a href="#" data-toggle="modal" data-target="#reboot"><span><img src="/themes/bootstrap/img/refresh.png" /><br />Reboot</span></a></li>
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a href="#" data-toggle="modal" data-target="#shutdown"><span><img src="/themes/bootstrap/img/stop.png" /><br />Shut Down</span></a></li>
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a href="#" data-toggle="modal" data-target="#boot"><span><img src="/themes/bootstrap/img/play.png" /><br />Boot</span></a></li>';
                                ?>
                        </ul>
                        
                        <div class="modal fade" id="reboot" tabindex="-1" role="dialog" aria-labelledby="rebootLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="rebootLabel">Reboot</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <p>Are you sure you want to reboot this server?</p>
                                                </div>
                                                <div class="modal-footer">
                                                        <?php echo form_open('server/reboot/'.$container->ctid); ?>
                                                        <input class="btn btn-primary" name="reboot" value="Reboot" type="submit" />
                                                        <input class="btn btn-danger" name="cancel" value="Cancel" type="submit" data-dismiss="modal" />
                                                        <?php echo form_close(); ?>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="modal fade" id="shutdown" tabindex="-1" role="dialog" aria-labelledby="shutdownLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="shutdownLabel">Shutdown</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <p>Are you sure you want to shut down this server?</p>
                                                </div>
                                                <div class="modal-footer">
                                                        <?php echo form_open('server/shutdown/'.$container->ctid); ?>
                                                        <input class="btn btn-primary" name="shutdown" value="Shutdown" type="submit" />
                                                        <input class="btn btn-danger" name="cancel" value="Cancel" type="submit" data-dismiss="modal" />
                                                        <?php echo form_close(); ?>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="modal fade" id="boot" tabindex="-1" role="dialog" aria-labelledby="bootLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="bootLabel">Boot</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <p>Are you sure you want to boot this server?</p>
                                                </div>
                                                <div class="modal-footer">
                                                        <?php echo form_open('server/boot/'.$container->ctid); ?>
                                                        <input class="btn btn-primary" name="boot" value="Boot" type="submit" />
                                                        <input class="btn btn-danger" name="cancel" value="Cancel" type="submit" data-dismiss="modal" />
                                                        <?php echo form_close(); ?>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        
                        
                        
                </div>
        </div>

        <div class="panel panel-default">
                <div class="panel-heading">System Options</div>
                <div class="panel-body">
                        <ul id="system-options" class="col-lg-12 list-inline">
                                <?php
                                        echo '
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/reinstall/'.$container->ctid.'"><span><img src="/themes/bootstrap/img/install.png" /><br />Reinstall</span></a></li>
                                
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a data-toggle="modal" data-target="#rootpw-modal" href="/server/rootpassword/'.$container->ctid."><span><img src="/themes/bootstrap/img/lock.png" /><br />Root Password</span></a></li>
                                
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/logs/'.$container->ctid.'"><span><img src="/themes/bootstrap/img/notebook.png" /><br />Logs</span></a></li>
                                
                                <li class="clearfix visible-xs"></li>
                                
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/ipaddresses/'.$container->ctid.'"><span><img src="/themes/bootstrap/img/globe.png" /><br />IP Addresses</span></a></li>
                                
                                <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/monitoring/'.$container->ctid.'" data-toggle="modal" data-target="#monitoring-modal"><span><img src="/themes/bootstrap/img/monitor.png"><br />Monitoring</a><div id="monitoring-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></li>';
                                ?>
                        </ul>
                        <div id="rootpw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
                </div>
        </div>
                
        <div class="panel panel-default">
                <div class="panel-heading">Console</div>
                <div class="panel-body">
                        <table class="table table-condensed">
                                <tr><th>Username</th><th>Password</th><th>Address</th><th>Port</th></tr>
                                <tr><td><?php echo $container->ovz_console_user; ?></td><td> ******** </td><td><?php echo long2ip($node->ip_address); ?></td><td><?php echo $node->ssh_port; ?></td></tr>
                        </table>
                                
                        <a class="btn btn-primary" id="kvm-console" href="/ajaxterm/<?php echo ($container->ctid + 10000); ?>">Launch NoVNC Console</a>
                        <a class="btn btn-success" href="/libopenvz/javaconsole/<?php echo $container->ctid; ?>">Launch Java Console</a>
                        <a data-toggle="modal" data-target="#consolepw-modal" class="btn btn-warning" href="/libopenvz/consolepassword/<?php echo $container->ctid; ?>">Reset Console Password</a>
                        
                        <div id="consolepw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>
                        
                        <script type="text/javascript">
                                $("#kvm-console").click(function(e) {
                                        e.preventDefault();
                                        window.open($(this).attr('href'), 'popUpWindow', 'height=577,width=647,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no')
                                });
                        </script>
                </div>
        </div>
        
        <?php
        if ($this->ion_auth->is_admin() === true) {
                echo '
                        <div class="panel panel-default">
                                <div class="panel-heading">Admin Options</div>
                                <div class="panel-body">
                                <ul id="admin-options" class="col-lg-12 list-inline">';
                if ($container->suspended == 1) {
                        echo '
                                        <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/unsuspend/'.$container->ctid.'" data-toggle="modal" data-target="#unsuspend-modal"><span><img src="/themes/bootstrap/img/plus.png"><br />Unsuspend</a><div id="unsuspend-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></li>';
                } else {
                        echo '
                                        <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/suspend/'.$container->ctid.'" data-toggle="modal" data-target="#suspend-modal"><span><img src="/themes/bootstrap/img/minus.png"><br />Suspend</a><div id="suspend-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></li>';
                }
                
                echo '
                                        <li class="button col-xs-4 col-md-2 col-lg-3">
                                        <a href="/server/destroy/'.$container->ctid.'" data-toggle="modal" data-target="#destroy-modal"><img src="/themes/bootstrap/img/trash-full.png" /><br />Destroy</a>
                                        <div id="destroy-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div>

                                        </li>
                                        
                                        <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/change_owner/'.$container->ctid.'" data-toggle="modal" data-target="#owner-modal"><span><img src="/themes/bootstrap/img/user.png"><br />Change Owner</a><div id="owner-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></li>                                        
                                        
                                        <li class="button col-xs-4 col-md-2 col-lg-3"><a data-toggle="modal" data-target="#edit-modal" href="/server/edit/'.$container->ctid.'"><span><img src="/themes/bootstrap/img/edit.png" /><br />Edit</span></a><div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></li>

                                        <li class="button col-xs-4 col-md-2 col-lg-3"><a href="/server/migrate/'.$container->ctid.'" data-toggle="modal" data-target="#migrate-modal"><span><img src="/themes/bootstrap/img/migrate.png"><br />Migrate</a><div id="migrate-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"></div></li>                                                                         

                                        <li class="button col-xs-4 col-md-2 col-lg-3">
                                                <a href="#" data-toggle="modal" data-target="#info-modal"><span><img src="/themes/bootstrap/img/mail.png"><br />Resend VM Info</a>
                                        
                                                <div id="info-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                        
                                                                        <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title">Resend VM Info</h4>
                                                                        </div>
                                                                        
                                                                        <div class="modal-body">
                                                                                <p>Are you sure you want to resend the VM info email to the VM owner?</p>
                                                                        </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                                <a href="/server/resend_info/'.$container->ctid.'" class="btn btn-primary">Resend Info</a> 
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                        
                                                                </div>
                                                        </div>
                                                </div>
                                        </li>
                                </ul>
                                
                                </div>
                        </div>';
        }
        ?>

        
</div>
        
<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                <div class="panel-body">

                        <form class="form-horizontal" role="form" action="/libopenvz/edit/<?php echo $container->ctid; ?>" method="POST">
                        <div class="col-md-6 settings">
                                <div class="form-group">
                                        <label for="tuntap" class="col-md-4 control-label">TUN/TAP Support</label>
                                        <div class="col-md-4">
                                                <input type="checkbox" name="tuntap" checked="checked" value="<?php echo $container->openvz_tuntap; ?>" class="switch">
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="pptp" class="col-md-4 control-label">PPTP Support</label>
                                        <div class="col-md-4">
                                                <input type="checkbox" name="pptp" checked="checked" value="<?php echo $container->openvz_pptp; ?>" class="switch">
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="ipgre" class="col-md-4 control-label">IPGRE Support</label>
                                        <div class="col-md-4">
                                                <input type="checkbox" name="ipgre" checked="checked" value="<?php echo $container->openvz_ipgre; ?>" class="switch">
                                        </div>
                                </div>
                        </div>
                        
                        <div class="col-md-6">
                                
                                <div class="form-group">
                                        <label for="ipip" class="col-md-4 control-label">IPIP Support</label>
                                        <div class="col-md-4">
                                                <input type="checkbox" name="ipip" checked="checked" value="<?php echo $container->openvz_ipip; ?>" class="switch">
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="ipsec" class="col-md-4 control-label">IPSEC Support</label>
                                        <div class="col-md-4">
                                                <input type="checkbox" name="ipsec" checked="checked" value="<?php echo $container->openvz_ipsec; ?>" class="switch">
                                        </div>
                                </div>
                                
                                <script type="text/javascript">
                                $(function() {
                                        $('.switch').bootstrapSwitch();
                                        $('.switch').on('switch-change', function () {
                                                $(this).bootstrapSwitch('toggleRadioStateAllowUncheck', true);
                                                if ($(this).val() == 1) {
                                                        $(this).attr('value', 0)
                                                } else {
                                                        $(this).attr('value', 1)
                                                }
                                        });
                                });
                                </script>                                
                                
                                <div class="form-group">
                                        <label for="group" class="col-md-4 control-label"><img src="/themes/bootstrap/img/group.png" /> Group</label>
                                        <div class="col-md-8">
                                                <?php echo form_input('group', html_entity_decode($container->group_name), 'class="form-control"'); ?>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="col-md-12">
                                <input class="btn btn-primary pull-right" type="submit" name="save" value="Save Options" />
                        </div>
                        </form>
                </div>
        </div>
        
        <div class="panel panel-default">
                <div class="panel-heading">Snapshots</div>
                <div class="panel-body">
                        <p>You have used <?php echo count($snapshots); ?> of <?php echo (intval($this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']) != 0 ? $this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS'] : 0) ?> snapshot<?php echo (intval($this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']) == 1 ? '' : 's') ?> allowed.</p>
                
                        <table class="table table-condensed">
                                <tr><th>Snapshot Name</th><th>Snapshot Date</th><th></th><th></th><?php echo (isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none' ? '<th></th>' : '') ?></tr>
                                <?php
                                        foreach($snapshots as $snapshot) {
                                                echo '<tr><td>'.html_entity_decode($snapshot->snapshot_description).($snapshot->snapshot_stashed == 1 ? ' (Stashed)': '').'</td><td>'.date('M d, Y g:ia', gmt_to_local($snapshot->snapshot_time, $this->ion_auth->user()->row()->timezone)).'</td><td><a href="/server/snapshots/'.$ctid.'/restore/'.$snapshot->snapshot_id.'">Restore</a></td><td><a href="/server/snapshots/'.$container->ctid.'/delete/'.$snapshot->snapshot_id.'">Delete</a></td>'.(isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none' ? '<td><a href="/server/snapshots/'.$ctid.'/stash/'.$snapshot->snapshot_id.'">Stash</a></td>' : '').'</tr>';
                                        }
                                ?>
                        </table>
                        
                        <?php
                                if (isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none') {
                                        $this->load->view('error', array('type' => 'info', 'message' => 'Clicking "Stash" next to a snapshot will store it on our off-site backup server.  Stashed snapshots are only intended for recovery in worst-case scenario situations.  Therefore, they can only be restored by our staff.  You may stash one snapshot for each VM - when you stash a new snapshot, it will automatically overwrite your previous stashed snapshot. Your most recently stashed snapshot will be marked "Stashed" below. <br /><br /><b>Note:</b> You may stash one snapshot for each VM every '.$this->ion_auth->hgsettings['STASH_MIN_DAYS'].' days.'.($container->stash_time > (time() - ($this->ion_auth->hgsettings['STASH_MIN_DAYS']*86400)) ? ' You may stash a new snapshot for this VM at '.date('M d, Y g:ia', gmt_to_local($container->stash_time + ($this->ion_auth->hgsettings['STASH_MIN_DAYS'] * 86400), $this->ion_auth->user()->row()->timezone)).'.' : '')));
                                }
                        ?>
                        
                        <?php if (count($snapshots) < $this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']): ?>
                                <a href="#" data-toggle="modal" data-target="#snapshot-modal" class="btn btn-success">Create Snapshot</a>
                                <div id="snapshot-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                        <div class="modal-dialog">
                                                <div class="modal-content">
                                                        <?php echo form_open('server/snapshots/'.$container->ctid.'/create', 'class="form-horizontal"'); ?>
                                                        
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Create Snapshot</h4>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                                <div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
                                                                        <label for="name" class="col-md-3 control-label">Name:</label>
                                                                        <div class="col-md-7">
                                                                                <?php echo form_input('snapshot-name', set_value('snapshot-name'), 'class="form-control"'); ?>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary" name="submit" value="Create Snapshot" />
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                        
                                                        <?php echo form_close(); ?>
                                                </div>
                                        </div>
                                </div>
                        <?php endif; ?>
                        
                
                </div>
        </div>
</div>