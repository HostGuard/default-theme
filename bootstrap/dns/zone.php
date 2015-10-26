<div class="col-md-12">
    <div class="alert alert-info"><strong>Note:</strong> if you are adding a Reverse DNS record, use the PTR <strong>Type</strong>.  Example:<br />
        111.111.111.111.in-addr.arpa	PTR	subdomain.domain.org	86400
    </div>
</div>

<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $domain->name; ?></div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th>Type</th><th>Content</th><th>TTL</th><th></th></tr>
                                <?php
                                foreach ($records as $record) {
                                        echo '<tr><td>'.$record->name.'</a></td><td>'.$record->type.'</td><td>'.$record->content.($record->type == "MX" ? ' <span style="margin-left: 20px"><b>Priority:</b> '.$record->prio.'</span>' : '').'</td><td>'.$record->ttl.'</td><td><a class="btn btn-danger btn-sm" href="/dns/delete_record/'.$record->id.'" data-toggle="modal" data-target="#delete-'.$record->id.'"><i class="glyphicon glyphicon-trash"></i> Delete</a><div class="modal fade" id="delete-'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div></tr>';
                                }
                                ?>
                        </table>
                </div>
        </div>
</div>


<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Add Record</div>
                <div class="panel-body">
                
                        <?php echo validation_errors('<div class="msg-error">', '</div>'); ?>
                        <?php echo form_open('dns/zone/'.$domain->id, array('class' => 'form-horizontal')); ?>

                        <div class="form-group<?php echo (my_form_error('name') != FALSE ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-3 control-label" style="max-width: 109px">Name:</label>
                                <div class="col-md-8">
                                        <div class="input-group"><?php echo form_input('name', set_value('name'), 'class="form-control"'); ?><span class="input-group-addon">.<?php echo $domain->name; ?></span></div>
                                        <?php echo my_form_error('name', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>

                        <div class="form-group<?php echo (my_form_error('type') != FALSE ? ' has-error' : ''); ?>">
                                <label for="type" class="col-md-3 control-label" style="max-width: 109px">Type:</label>
                                <div class="col-md-8">
                                        <?php
                                                $type_options = array(
                                                        "A" => "A",
                                                        "AAAA" => "AAAA",
                                                        "CNAME" => "CNAME",
                                                        "HINFO" => "HINFO",
                                                        "MX" => "MX",
                                                        "NAPTR" => "NAPTR",
                                                        "NS" => "NS",
                                                        "PTR" => "PTR",
                                                        "RP" => "RP",
                                                        "SOA" => "SOA",
                                                        "SPF" => "SPF",
                                                        "SRV" => "SRV",
                                                        "SSHFP" => "SSHFP",
                                                        "TXT" => "TXT"
                                                );
                                                
                                                echo form_dropdown('type', $type_options, set_value('type'), 'id="type" class="selectpicker"');
                                        ?>
                                        <?php echo my_form_error('type', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
        
                        <div class="form-group<?php echo (my_form_error('content') != FALSE ? ' has-error' : ''); ?>">
                                <label for="content" class="col-md-3 control-label" style="max-width: 109px">Content:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('content', set_value('content'), 'class="form-control"'); ?>
                                        <?php echo my_form_error('content', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
        
                        <div class="form-group<?php echo (my_form_error('ttl') != FALSE ? ' has-error' : ''); ?>">
                                <label for="ttl" class="col-md-3 control-label" style="max-width: 109px">TTL:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('ttl', set_value('ttl', 86400), 'class="form-control"'); ?>
                                        <span class="help-block">Minimum: 60</span>
                                        <?php echo my_form_error('ttl', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-default" name="submit" type="submit" value="Add Record" />
                                </div>
                        </div>
                        
                        <?php echo form_close(); ?>

                        <script type="text/javascript">
                                $('#type').change(function() {
                                        if ($('#type option:selected').text() == "MX") {
                                                $('#dns-content').after('<div class="form-group" id="dns-priority" style="display: none"><label for="priority" class="col-md-3 control-label" style="max-width: 109px">Priority:</label><div class="col-md-8"><input type="text" name="priority" id="priority" /></div></div>');
                                                $('#dns-priority').slideDown();
                                        } else {
                                                $('#dns-priority').slideUp(400, function(){$('#dns-priority').remove()});
                                        }
                                });
                        </script>
                </div>
        </div>
</div>
