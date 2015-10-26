<?php if ($this->input->is_ajax_request()): ?>

<?php $this->output->set_output(''); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete Node</h4>
            </div>

            <?php echo form_open('node/delete/'.$node->id, array('class' => 'form-horizontal')); ?>

            <div class="modal-body">
                <p>Are you sure you want to delete node <b><?php echo $node->node_name; ?></b>? All historical data for this node, including logs, will be deleted.</p>
            </div>

            <div class="modal-footer">
                <?php echo form_submit('delete', 'Delete', 'class="btn btn-primary"'); ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
<?php die(); ?>

<?php else: ?>
<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading">Delete Node <?php echo $node->node_name; ?></div>
                <div class="panel-body">
                        <p>Are you sure you want to delete node <b><?php echo $node->node_name; ?></b>? All historical data for this node, including logs, will be deleted.</p>
                        <?php echo form_open('node/delete/'.$node->id); ?>
                        <?php echo form_submit('delete', 'Delete', 'class="btn btn-primary"'); ?>
                        <a href="node/<?php echo $node->id; ?>" class="btn btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                </div>
        </div>
</div>
<?php endif; ?>