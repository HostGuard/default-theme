<div class="col-md-12 col-xl-12">
        <div class="panel panel-default">
                <div class="panel-heading">Delete ISO Group</div>
                <div class="panel-body">
                <p>Are you sure you want to delete ISO group <b><?php echo $group->group_name; ?></b>?  All ISOs currently belonging to this group will be moved to ungrouped status.</p>
                <?php
                        echo form_open('iso/delete_group/'.$group->group_id, array('class' => "form-horizonal"));
                        echo form_submit('delete', 'Delete', 'class="btn btn-primary"');
                        echo ' ';
                        echo form_submit('cancel', 'Cancel', 'class="btn btn-default"');
                        echo form_close();
                ?>
                </div>
        </div>
</div>