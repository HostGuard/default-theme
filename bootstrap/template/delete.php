<?php if ($this->input->is_ajax_request()): ?>

        <?php $this->output->set_output(''); ?>
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete Template</h4>
                        </div>

                        <?php echo form_open('template/delete/'.$template_type.'/'.$template->template_id, array('class' => 'form-horizontal')); ?>

                        <div class="modal-body">
                                <p>Are you sure you want to delete template <b><?php echo $template->template_name; ?></b>?</p>
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
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                                <p>Are you sure you want to delete template <b><?php echo $template->template_name; ?></b>?</p>
                                <?php
                                        echo form_open('template/delete/'.$template_type.'/'.$template->template_id, array('class' => "form-horizonal"));
                                        echo form_submit('delete', 'Delete', 'class="btn btn-primary"');
                                        echo ' ';
                                        echo '<a href="/template/index" class="btn btn-default">Cancel</a>';
                                        echo form_close();
                                ?>
                        </div>
                </div>
        </div>
        
<?php endif; ?>
