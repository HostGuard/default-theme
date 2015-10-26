<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Restore Snapshot</h4>
                        </div>

                        <?php echo form_open('server/snapshots/'.$ctid.'/restore/'.$snapshot->snapshot_id, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <p>Are you sure you want to restore the snapshot <b><?php echo $snapshot->snapshot_description; ?></b>? ALL DATA THAT IS CURRENTLY ON THIS VIRTUAL SERVER WILL BE ERASED!</p>
                        </div>

                        <div class="modal-footer">
                                <?php echo form_submit('submit', 'Restore', 'class="btn btn-primary"'); ?>
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
                                <p>Are you sure you want to restore the snapshot <b><?php echo $snapshot->snapshot_description; ?></b>? ALL DATA THAT IS CURRENTLY ON THIS VIRTUAL SERVER WILL BE ERASED!</p>
                                <?php
                                        echo form_open('server/snapshots/'.$ctid.'/restore/'.$snapshot->snapshot_id);
                                        echo form_submit('submit', 'Restore', 'class="btn btn-primary"');
                                        echo ' <a class="btn btn-default" href="/server/'.$ctid.'">Cancel</a>';
                                        echo form_close();
                                ?>
                        </div>
                </div>
        </div>
        
<?php endif; ?>