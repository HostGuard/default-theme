	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<a class="btn btn-primary pull-right" href="/node/add">Add Node</a>
			<h2>Nodes</h2>
		</div>
				
	</div>
</div>
<div class="row">

	<div class="col-md-12">
        <?php foreach ($locations as $location): ?>
                <div id="location-<?php echo $location['id']; ?>" class="panel panel-default">
                        <div class="panel-heading"><?php echo $location['location_name']; ?>

                            
                        </div>
                        <div id="accordion<?php echo $location['id']; ?>" class="visible-xs">
                        <?php foreach ($location['nodes'] as $node): ?>
                                <?php                                
									if ($node->load1 > $node->load_critical) {$load1style = 'label label-danger';
									} elseif ($node->load1 > $node->load_warning) {$load1style = 'label label-warning';
									} else {$load1style = 'label label-success';}
									if ($node->load5 > $node->load_critical) {$load5style = 'label label-danger';
									} elseif ($node->load1 > $node->load_warning) {$load5style = 'label label-warning';
									} else {$load5style = 'label label-success';}
									if ($node->load15 > $node->load_critical) {$load15style = 'label label-danger';
									} elseif ($node->load15 > $node->load_warning) {$load15style = 'label label-warning';
									} else {$load15style = 'label label-success';}
                                ?>

                                <a style="display: block; line-height: 30px; padding-left: 15px; border-bottom: 1px solid #DDDDDD; line-height: 40px;" data-toggle="collapse" data-parent="#accordion" href="#node<?php echo $node->id; ?>">
                                    <?php echo $node->node_name; ?></a>


                                <div id="node<?php echo $node->id; ?>" class="collapse" style="border-bottom: 1px solid #DDDDDD; padding: 15px;">
                                        <table class="table table-condensed container-info">
                                                <tr>
                                                        <th>Load Average</th>
                                                        <td>
                                                                <span class="<?php echo $load1style; ?>"><?php echo $node->load1; ?></span>
                                                                <span class="<?php echo $load5style; ?>"><?php echo $node->load5; ?></span>
                                                                <span class="<?php echo $load15style; ?>"><?php echo $node->load15; ?></span>
                                                        </td>
                                                </tr>
                                                
                                                <tr>
                                                        <th>Memory</th>
                                                        <td>
                                                                <div class="progress" style="max-width: 250px">
                                                                        <span><?php echo byte_format($node->memory_used * 1024).' / '.byte_format($node->memory_total * 1024); ?></span>
                                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $node->memory_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $node->memory_total; ?>" style="width: 
                                                                                <?php echo max(($node->memory_used / $node->memory_total * 100), 0); ?>%">
                                                                        </div>
                                                                </div>
                                                        </td>
                                                </tr>
                                                
                                                <tr>
                                                        <th>Disk</th>
                                                        <td>
                                                                <div class="progress" style="max-width: 250px">
                                                                        <span><?php echo byte_format($node->disk_used * 1024).' / '.byte_format($node->disk_total * 1024); ?></span>
                                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $node->disk_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $node->disk_total; ?>" style="width: 
                                                                                <?php echo max(($node->disk_used / $node->disk_total * 100), 1);?>%">
                                                                        </div>
                                                                </div>
                                                        </td>
                                                </tr>
                                                
                                                <tr>
                                                        <th>Uptime</th>
                                                        <td><?php echo elapsed_time($node->uptime); ?></td>
                                                </tr>
                                                
                                                <tr>
                                                        <th>Network In</th>
                                                        <td><?php echo byte_format($node->bytes_in/5); ?>/s</td>
                                                </tr>
                                                
                                                <tr>
                                                        <th>Network Out</th>
                                                        <td><?php echo byte_format($node->bytes_out/5); ?>/s</td>
                                                </tr>
                                        </table>
                                        
                                        <a class="btn btn-block btn-default" href="/node/<?php echo $node->id; ?>">Manage Node</a>
                                </div>
                        <?php endforeach; ?>
                        </div>

                        <div class="panel-body no-pad hidden-xs">
                                <table class="table table-condensed">
                                        <tr>
                                                <th class="col-md-2" colspan="2">Hostname</th>
                                                <th class="col-md-2">Load Average</th>
                                                <th class="col-md-2">Memory</th>
                                                <th class="col-md-2">Disk</th>
                                                <th class="col-md-2">Network</th>
                                                <th class="col-md-2">Uptime</th>
                                        </tr>
                                        <?php foreach ($location['nodes'] as $node): ?>
                                        <tr>
                                                <td><a href="/node/<?php echo $node->id; ?>"><?php echo $node->node_name; ?></a>
                                    <?php
                                    
                                        if ($node->last_status_update < date_timestamp_get(date_sub(date_create("now"), date_interval_create_from_date_string('10 minutes'))))  {
                                                echo(
                                                        '<p class="label label-danger" title="This means the hgstatus-client process is not running.  It last updated '.
                                                        date("F j, Y, g:i a", $node->last_status_update).
                                                        '."><span class="glyphicon glyphicon-exclamation-sign"></span> Status Unknown</p>'
                                                );
                                        }
                                    ?>                                                
                                                </td>
                                                <td>
                                                    <?php
                                                    echo
                                                        '<a style="margin-bottom:5px;width:100px;text-align:left;" class="btn btn-primary btn-xs" href="/node/'.$node->id.'"><i class="glyphicon glyphicon-edit"></i> View Details</a> ' .
                                                        '<a style="margin-bottom:5px;width:100px;text-align:left;" class="btn btn-danger btn-xs" href="/node/delete/'.$node->id.'" data-toggle="modal" data-target="#delete-'.$node->id.'" ><i class="glyphicon glyphicon-trash"></i> Delete Node</a> <div id="delete-'.$node->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div> ' .
                                                        '<a style="margin-bottom:5px;width:100px;text-align:left;" class="btn btn-default btn-xs" href="/node/installer/'.$node->id.'"><i class="glyphicon glyphicon-transfer"></i> Scripts</a> '
                                                    ?>
                                                </td>
                                                <?php
                                                        if ($node->load1 > $node->load_critical) {
                                                                $load1style = 'label label-danger';
                                                        } elseif ($node->load1 > $node->load_warning) {
                                                                $load1style = 'label label-warning';
                                                        } else {
                                                                $load1style = 'label label-success';
                                                        }
                                                        if ($node->load5 > $node->load_critical) {
                                                                $load5style = 'label label-danger';
                                                        } elseif ($node->load1 > $node->load_warning) {
                                                                $load5style = 'label label-warning';
                                                        } else {
                                                                $load5style = 'label label-success';
                                                        }
                                                        if ($node->load15 > $node->load_critical) {
                                                                $load15style = 'label label-danger';
                                                        } elseif ($node->load15 > $node->load_warning) {
                                                                $load15style = 'label label-warning';
                                                        } else {
                                                                $load15style = 'label label-success';
                                                        }
                                                ?>

                                                <td>
                                                        <span class="<?php echo $load1style; ?>" style="font-weight: bold"><?php echo $node->load1; ?></span>
                                                        <span class="<?php echo $load5style; ?>"><?php echo $node->load5; ?></span>
                                                        <span class="<?php echo $load15style; ?>"><?php echo $node->load15; ?></span>
                                                </td>
                                                <td>
                                                        <div class="progress">
                                                                <span><?php echo byte_format($node->memory_used * 1024); ?> / <?php echo byte_format($node->memory_total * 1024); ?></span>
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $node->memory_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $node->memory_total; ?>" style="width: <?php echo max(($node->memory_used / $node->memory_total * 100), 0); ?>%"></div>
                                                        </div>
                                                </td>
                                                <td class="hidden-xs">
                                                        <div class="progress">
                                                                <span><?php echo byte_format($node->disk_used * 1024); ?> / <?php echo byte_format($node->disk_total * 1024); ?></span>
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $node->disk_used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $node->disk_total; ?>" style="width: <?php echo max(($node->disk_used / $node->disk_total * 100), 1); ?>%"></div>
                                                        </div>
                                                </td>
                                                <td class="hidden-xs">In: <?php echo byte_format($node->bytes_in/5); ?>/s<br />Out: <?php echo byte_format($node->bytes_out/5); ?>/s </td>
                                                <td class="hidden-xs"><?php echo elapsed_time($node->uptime); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                        
                                </table>
                        </div>
                </div>
        <?php endforeach; ?>
	</div>