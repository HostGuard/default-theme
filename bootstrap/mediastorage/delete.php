<div class="col-md-12 col-xl-12">
        <div class="panel panel-default">
                <div class="panel-heading">Delete Media Node <?php echo $mediastorage->node_name; ?></div>
                <div class="panel-body">
                        <?php echo form_open('mediastorage/delete/'.$mediastorage->id); ?>

                        <p>Are you sure you want to remove this node as a Media Storage Node? <b>Please Note:</b> Existing media files on the Node will NOT be removed.</p>
                        <?php echo form_submit('delete', 'Delete', 'class="btn btn-primary"'); ?>
                        <a href="/mediastorage/index" class="btn btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>