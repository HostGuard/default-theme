<div class="col-md-12 col-xl-12">
<?php foreach($vtypes as $vtype => $vtypeid): ?>
        
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $vtype ?> Templates <a data-toggle="modal" data-target="#<?php echo $vtype ?>-addTemplate" class="btn btn-primary btn-xs pull-right" href="/template/add/<?php echo strtolower($vtype) ?>">Add Template</a></div>
                <div class="panel-body">
                
                        <ul id="<?php echo $vtype ?>-tabs" class="nav nav-tabs">
                                <?php foreach($groups[$vtype] as $group): ?>
                                        <li><a href="#<?php echo $vtype . '-' . $group->group_id; ?>" data-toggle="tab"><?php echo $group->group_name; ?></a></li>
                                <?php endforeach; ?>
                                <?php if (count($uncategorized[$vtype]) > 0): ?>
                                        <li><a href="#<?php echo $vtype ?>-uncategorized" data-toggle="tab">Uncategorized</a></li>
                                <?php endif; ?>
                                        <li><a href="#" data-toggle="modal" data-target="#<?php echo $vtype ?>-addCategory"><i class="glyphicon glyphicon-plus"></i> Category</a></li>
                        </ul>
                        
                        <div id="<?php echo $vtype ?>-addTemplate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                        
                        <div class="modal fade" id="<?php echo $vtype ?>-addCategory" tabindex="-1" role="dialog" aria-labelledby="<?php echo $vtype ?>-addCategoryLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                        <div class="modal-content">
                                                <?php echo form_open('template/add_group/' . strtolower($vtype) , array('class' => 'form-horizontal')); ?>

                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="<?php echo $vtype ?>-addCategoryLabel">Add Category</h4>
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
                                foreach ($groups[$vtype] as $group) {                                                                                
                                        echo '
                                        <div class="tab-pane" id="' . $vtype . '-' . $group->group_id.'">
                                                <table class="table table-condensed">
                                                        <tr><th>ID</th><th>Name</th><th>Description</th><th>Filename</th><th></th></tr>';

                                                        
                                        foreach ($templates[$group->group_name] as $template) {
                                                        echo '
                                                        <tr><td>'.$template->template_id.'</td><td>'.$template->template_name.'</td><td>'.$template->template_description.'</td><td>'.$template->template_filename.'</td>
                                                        <td><a data-toggle="modal" data-target="#'.$vtype.'-edit-'.$template->template_id.'" href="/template/edit/'.strtolower($vtype).'/'.$template->template_id.'" class="btn btn-primary btn-sm">Edit</a>
                                                        <a data-toggle="modal" data-target="#'.$vtype.'-delete-'.$template->template_id.'" href="/template/delete/'.strtolower($vtype).'/'.$template->template_id.'" class="btn btn-danger btn-sm">Delete</a>
                                                        <div id="'.$vtype.'-edit-'.$template->template_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                        <div id="'.$vtype.'-delete-'.$template->template_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div></td></tr>';
                                        }
                                        
                                        echo '
                                                </table>';
                                        echo form_open('/template/edit_group/'.strtolower($vtype).'/'.$group->group_id, array('class' => 'form-horizontal'));
                                        echo '
                                                        <div class="form-group">
                                                                <label class="col-md-3 control-label">Category Name</label>
                                                                <div class="col-md-3">
                                                                        '.form_input('group_name', $group->group_name, 'class="form-control"').'
                                                                </div>
                                                                <input type="submit" class="btn btn-primary" value="Save" /> 
                                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#'.$vtype.'-rmCategory-'.$group->group_id.'">Remove Category</a>
                                                        </div>
                                                </form>
                                                
                                                <div class="modal fade" id="'.$vtype.'-rmCategory-'.$group->group_id.'" tabindex="-1" role="dialog" aria-labelledby="'.$vtype.'-rmCategory-'.$group->group_id.'-label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                        '.form_open('template/delete_group/'.strtolower($vtype).'/'.$group->group_id, array('class' => 'form-horizontal')).'

                                                                        <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                                <h4 class="modal-title" id="'.$vtype.'-rmCategory-'.$group->group_id.'-label">Delete Group "'.$group->group_name.'"</h4>
                                                                        </div>
                                                                        
                                                                        <div class="modal-body">
                                                                                <p>Are you sure you want to delete this category?  All templates currently in this category will be moved to "Uncategorized".</p>
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
                                
        
                                if (count($uncategorized[$vtype]) > 0) {
                                        echo '
                                        <div class="tab-pane" id="'.$vtype.'-uncategorized">
                                                <table class="table table-condensed">
                                                        <tr><th>ID</th><th>Name</th><th>Description</th><th>Filename</th><th></th><th></th></tr>';
                
                                        foreach ($uncategorized[$vtype] as $template) {
                                                echo '
                                                        <tr><td>'.$template->template_id.'</td><td>'.$template->template_name.'</td><td>'.$template->template_description.'</td><td>'.$template->template_filename.'</td><td>
                                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#'.$vtype.'-edit-'.$template->template_id.'" href="/template/edit/'.strtolower($vtype).'/'.$template->template_id.'">Edit</a>
                                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#'.$vtype.'-delete-'.$template->template_id.'" href="/template/delete/'.strtolower($vtype).'/'.$template->template_id.'">Delete</a>
                                                        <div id="'.$vtype.'-edit-'.$template->template_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                        <div id="'.$vtype.'-delete-'.$template->template_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                        </td></tr>';
                                        }

                                        
                                        echo '
                                                </table>
                                        </div>';
                                }
                                ?>

                        </div>
                </div>
        </div>
<script>
        <?php echo('$("#' . $vtype . '-tabs a:first").tab("show")'); ?>
</script>
        <?php endforeach; ?>
</div>


