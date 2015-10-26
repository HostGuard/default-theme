<div class="col-md-12">
<div class="alert alert-info"><strong>Note:</strong> if you are adding DNS for the first time in order to create a VPS, then the first step is to create a domain.  The system requires Reverse DNS, so the domain should look something like this, where 4 is the value used for PTRs under the domain:<br />
    3.2.1.in-addr.arpa
    </div>
</div>

<div class="col-md-12 col-xl-6">

        <div class="panel panel-default">
                <div class="panel-heading">DNS Zones</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Zone Name</th><th>Type</th><th>Records</th><th></th></tr>
                                <?php foreach ($domains as $domain): ?>
                                        <tr>
                                                <td><a href="/dns/zone/<?php echo $domain->id; ?>"><?php echo $domain->name; ?></a></td>
                                                <td><?php echo $domain->type; ?></td>
                                                <td><?php echo $domain->count; ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="/dns/zone/<?php echo $domain->id ?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="/dns/delete_zone/<?php echo $domain->id; ?>" data-toggle="modal" data-target="#delete-<?php echo $domain->id; ?>"><i class="glyphicon glyphicon-trash"></i> Delete</a><div class="modal fade" id="delete-<?php echo $domain->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                </td>
                                        </tr>
                                <?php endforeach; ?>
                        </table>
                </div>
        </div>
</div>

<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">Add Domain</div>
                <div class="panel-body">
                        <?php echo validation_errors('<div class="msg-error">', '</div>'); ?>
                        <?php echo form_open('dns/index', array('class' => 'form-horizontal')); ?>

                        <div class="form-group<?php echo (my_form_error('domain') != FALSE ? ' has-error' : ''); ?>">
                                <label for="domain" class="col-md-3 control-label" style="max-width: 109px">Domain:</label>
                                <div class="col-md-8">
                                        <?php echo form_input('domain', set_value('domain'), 'class="form-control"'); ?>
                                        <?php echo my_form_error('domain', '<span class="help-block">', '</span>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-8">
                                        <input class="btn btn-default" name="submit" type="submit" value="Add Domain" />
                                </div>
                        </div>

                        <?php echo form_close(); ?>
                </div>
        </div>
</div>