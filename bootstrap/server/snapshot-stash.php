<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Stash Snapshot</h4>
                        </div>

                        <?php echo form_open('server/snapshots/'.$ctid.'/stash/'.$snapshot->snapshot_id, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <?php
                                        $this->load->view('error', array('type' => 'info', 'message' => 'Stashed snapshots are only intended for recovery in worst-case scenario situations.  Therefore, they can only be restored by our staff.  You may stash one snapshot for each VM - when you stash a new snapshot, it will automatically overwrite your previous stashed snapshot.'));
                                ?>
                                
                                <p>Are you sure you want to stash the snapshot <b><?php echo $snapshot->snapshot_description; ?></b>?</p>
                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Stash', 'class="btn btn-primary"'); ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>

                        <?php echo form_close(); ?>

                </div>
        </div>
        <?php die(); ?>

<?php else: ?>

        <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">Restore Snapshot</div>
                        <div class="panel-body">
                                <?php
                                        $this->load->view('error', array('type' => 'info', 'message' => 'Stashed snapshots are only intended for recovery in worst-case scenario situations.  Therefore, they can only be restored by our staff.  You may stash one snapshot for each VM - when you stash a new snapshot, it will automatically overwrite your previous stashed snapshot.'));
                                ?>
                                
                                <p>Are you sure you want to stash the snapshot <b><?php echo $snapshot->snapshot_description; ?></b>?</p>
                                
                                <?php
                                        echo form_open('server/snapshots/'.$ctid.'/stash/'.$snapshot->snapshot_id);
                                        echo form_submit('submit', 'Stash', 'class="btn btn-primary"');
                                        echo ' <a class="btn btn-default" href="/server/'.$ctid.'">Cancel</a>';
                                        echo form_close();
                                ?>
                        </div>
                </div>
        </div>
        
<?php endif; ?>