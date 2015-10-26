<div id="contentpanel" class="box">
        <div class="box-title">
                <div>Restore Stashed Snapshot</div>
        </div>
        
        <div class="box-content">
                <p>Are you sure you want to restore the stashed snapshot <b><?php echo $snapshot->snapshot_description ?></b>? ALL DATA THAT IS CURRENTLY ON THIS VIRTUAL SERVER WILL BE ERASED!</p>
                <?php
                        echo form_open('server/snapshots/'.$ctid.'/restore-stashed/'.$snapshot->snapshot_id);
                        echo form_submit('submit', 'Restore');
                        echo form_submit('submit', 'Cancel');
                        echo form_close();
                ?>
                <br />
        </div>
</div>