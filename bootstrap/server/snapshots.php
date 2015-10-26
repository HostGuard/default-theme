<div class="row">
        <div class="col-md-12">
                <div class="page-header">
                        <h1>Snapshots <small><?php echo $container->hostname; ?></small></h1>
                </div>

                <div class="col-md-12">

                <?php
                        if (isset($error)) {
                                $this->load->view('error', $error);
                        }
                        
                        if ($this->session->flashdata('message-type') !== FALSE) {
                                $this->load->view('error', array('type' => $this->session->flashdata('message-type'), 'message' => $this->session->flashdata('message-text')));
                        }
                ?>
        
                <?php
                        if (isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none') {
                                $this->load->view('error', array('type' => 'info', 'message' => 'Clicking "Stash" next to a snapshot will store it on our off-site backup server.  Stashed snapshots are only intended for recovery in worst-case scenario situations.  Therefore, they can only be restored by our staff.  You may stash one snapshot for each VM - when you stash a new snapshot, it will automatically overwrite your previous stashed snapshot. Your most recently stashed snapshot will be marked "Stashed" below. <br /><br /><b>Note:</b> You may stash one snapshot for each VM every '.$this->ion_auth->hgsettings['STASH_MIN_DAYS'].' days.'.($container->stash_time > (time() - ($this->ion_auth->hgsettings['STASH_MIN_DAYS']*86400)) ? ' You may stash a new snapshot for this VM at '.date('M d, Y g:ia', gmt_to_local($container->stash_time + ($this->ion_auth->hgsettings['STASH_MIN_DAYS'] * 86400), $this->ion_auth->user()->row()->timezone)).'.' : '')));
                        }
                ?>
        
                <table class="table table-striped">
                        <tr><th>Snapshot Name</th><th>Snapshot Date</th><th></th><th></th><?php echo (isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none' ? '<th></th>' : '') ?></tr>
                        <?php
                                foreach($snapshots as $snapshot) {
                                        echo '<tr><td>'.html_entity_decode($snapshot->snapshot_description).($snapshot->snapshot_stashed == 1 ? ' (Stashed)': '').'</td><td>'.date('M d, Y g:ia', gmt_to_local($snapshot->snapshot_time, $this->ion_auth->user()->row()->timezone)).'</td><td><a href="/server/snapshots/'.$ctid.'/restore/'.$snapshot->snapshot_id.'">Restore</a></td><td><a href="/server/snapshots/'.$ctid.'/delete/'.$snapshot->snapshot_id.'">Delete</a></td>'.(isset($this->ion_auth->hgsettings['SNAPSHOT_SERVER']) && $this->ion_auth->hgsettings['SNAPSHOT_SERVER'] != '' && $this->ion_auth->hgsettings['SNAPSHOT_PROTOCOL'] != 'none' ? '<td><a href="/server/snapshots/'.$ctid.'/stash/'.$snapshot->snapshot_id.'">Stash</a></td>' : '').'</tr>';
                                }
                        ?>
                        

                </table>

                <div class="page-header">
                        <h2>Create New Snapshot</h2>
                </div>

        
                <div class="col-md-12">
                        <p>You have used <?php echo $num; ?> of <?php echo (intval($this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']) != 0 ? $this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS'] : 0) ?> snapshot<?php echo (intval($this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']) == 1 ? '' : 's') ?> allowed.</p>
                        <?php
                                if ($num < $this->ion_auth->hgsettings['VM_MAX_SNAPSHOTS']) {
                                        echo form_open('server/snapshots/'.$container->ctid.'/create', 'class="form-horizontal"');
                                        echo '
                                                <div class="control-group">
                                                        <label for="snapshot-name" class="col-md-2 control-label">Name</label>
                                                        <div class="col-md-4">
                                                                <input name="snapshot-name" id="snapshot-name" class="form-control" value="" />
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Create Snapshot" />
                                                </div>';
                                        
                                        echo form_close();
                                }
                        ?>
                                
                </div>
        </div>
</div>