<div class="col-md-12 col-xl-12">
        <div class="panel panel-default">
                <div class="panel-heading">ISO Images <a class="btn btn-primary btn-xs pull-right" href="/iso/add">Add ISO</a></div>
                <div class="panel-body">
                
                        <ul id="tabs" class="nav nav-tabs">
                                <?php foreach($groups as $group): ?>
                                        <li><a href="#<?php echo str_replace(' ', '', $group->group_name); ?>" data-toggle="tab"><?php echo $group->group_name; ?></a></li>
                                <?php endforeach; ?>
                                <?php if (count($uncategorized) > 0): ?>
                                        <li><a href="#uncategorized" data-toggle="tab">Uncategorized</a></li>
                                <?php endif; ?>
                                        <li><a href="#" data-toggle="modal" data-target="#addCategory"><i class="glyphicon glyphicon-plus"></i> Category</a></li>
                        </ul>
                        
                        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                        <div class="modal-content">
                                                <?php echo form_open('iso/groups', array('class' => 'form-horizontal')); ?>

                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="addCategoryLabel">Add Category</h4>
                                                </div>
                                                
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                                <label class="col-md-3 control-label">Category Name</label>
                                                                <div class="col-md-8">
                                                                        <?php echo form_input('group_name', null, 'class="form-control"'); ?>
                                                                </div>
                                                        </div>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category" />
                                                </div>
                                        
                                                <?php echo form_close(); ?>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="tab-content">
                        
                                <?php
                                foreach ($groups as $group) {
                                        echo '
                                        <div class="tab-pane" id="'.str_replace(' ', '', $group->group_name).'">
                                                <table class="table table-condensed">
                                                        <tr><th>ID</th><th>Name</th><th>Description</th><th>Filename</th><th></th><th></th></tr>';

                                        foreach ($group->isos as $iso) {
                                                echo '
                                                        <tr><td>'.$iso->iso_id.'</td><td>'.$iso->iso_name.'</td><td>'.$iso->iso_description.'</td><td>'.$iso->iso_filename.'</td><td>
                                                        <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#edit-'.$iso->iso_id.'" href="/iso/edit/'.$iso->iso_id.'">Edit</a><div id="edit-'.$iso->iso_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                        <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-'.$iso->iso_id.'" href="/iso/delete/'.$iso->iso_id.'">Delete</a><div id="delete-'.$iso->iso_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div></td></tr>';
                                        }
                                        
                                        echo '
                                                </table>';
                                        echo form_open('/iso/edit_group/'.$group->group_id, array('class' => 'form-horizontal'));
                                        echo '
                                                        <div class="form-group">
                                                                <label class="col-md-3 control-label">Category Name</label>
                                                                <div class="col-md-3">
                                                                        '.form_input('group_name', $group->group_name, 'class="form-control"').'
                                                                </div>
                                                                <input type="submit" class="btn btn-primary" value="Save" /> 
                                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#rmCategory-'.$group->group_id.'">Remove Category</a>
                                                        </div>
                                                </form>
                                                
                                                <div class="modal fade" id="rmCategory-'.$group->group_id.'" tabindex="-1" role="dialog" aria-labelledby="rmCategory-'.$group->group_id.'-label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                        '.form_open('iso/delete_group/'.$group->group_id, array('class' => 'form-horizontal')).'

                                                                        <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                                <h4 class="modal-title" id="rmCategory-'.$group->group_id.'-label">Delete Group "'.$group->group_name.'"</h4>
                                                                        </div>
                                                                        
                                                                        <div class="modal-body">
                                                                                <p>Are you sure you want to delete this group?  All ISOs currently in this group will be moved to the "Uncategorized" group.</p>
                                                                        </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                <input class="btn btn-primary" type="submit" name="delete" value="Remove" />
                                                                        </div>
                                                                
                                                                        '.form_close().'
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>';
                                }
                                
        
                                if (count($uncategorized) > 0) {
                                        echo '
                                        <div class="tab-pane" id="uncategorized">
                                                <table class="table table-condensed">
                                                        <tr><th>ID</th><th>Name</th><th>Description</th><th>Filename</th><th></th><th></th></tr>';
                
                                        foreach ($uncategorized as $iso) {
                                                echo '
                                                        <tr><td>'.$iso->iso_id.'</td><td>'.$iso->iso_name.'</td><td>'.$iso->iso_description.'</td><td>'.$iso->iso_filename.'</td><td><a class="btn btn-default btn-xs" data-toggle="modal" data-target="#edit-'.$iso->iso_id.'" href="/iso/edit/'.$iso->iso_id.'">Edit</a><div id="edit-'.$iso->iso_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                        <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-'.$iso->iso_id.'" href="/iso/delete/'.$iso->iso_id.'">Delete</a><div id="delete-'.$iso->iso_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div></td></tr>';
                                        }
                                        
                                        echo '
                                                </table>
                                        </div>';
                                }
                                ?>

                        </div>
                </div>
        </div>
</div>

<script type="text/javascript">
        $('#tabs a:first').tab('show') // Select first tab
</script>