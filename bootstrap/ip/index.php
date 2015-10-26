<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">IPv4 Blocks <a class="pull-right btn btn-primary btn-xs" href="/ip/add_block">Add IPv4 Block</a></div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th>Used</th><th>Free</th><th>Total</th><th>Start</th><th>End</th><th>Nameservers</th><th>Nodes</th><th></th></tr>

                                <?php
                                        foreach ($blocks as $block) {
                                                $total = $block->block_end - $block->block_start + 1;
                                                $free = $total - $block->used;
                                                echo '<tr><td>
<a href="/ip/listall/'.$block->block_id.'">'.$block->block_name.'</a></td><td>'.$block->used.'</td><td>'.$free.'</td><td>'.$total.'</td><td>'.long2ip($block->block_start).'</td><td>'.long2ip($block->block_end).'</td><td>'.long2ip($block->block_ns1).', '.long2ip($block->block_ns2).'</td><td>'.str_replace(',', ', ', $block->block_nodes).'</td><td>
<a style="width:100px;margin-bottom:5px;" class="btn btn-primary btn-xs" href="/ip/edit_block/'.$block->block_id.'"><i class="glyphicon glyphicon-edit"></i> Edit Block</a>
<a style="width:100px;margin-bottom:5px;" class="btn btn-danger btn-xs" href="/ip/delete_block/'.$block->block_id.'" data-toggle="modal" data-target="#delete-'.$block->block_id.'" ><i class="glyphicon glyphicon-trash"></i> Delete Block</a> <div id="delete-'.$block->block_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                </td></tr>';
                                        }
                                ?>
                        </table>
                </div>
        </div>
</div>


<div class="col-md-12 col-xl-6">
        <div class="panel panel-default">
                <div class="panel-heading">IPv6 Blocks <a class="pull-right btn btn-primary btn-xs" href="/ip/add_block6">Add IPv6 Block</a></div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Name</th><th>Used</th><th>Free</th><th>Total</th><th>Network</th><th>Nameservers</th><th>Nodes</th><th></th></tr>

                                <?php

                                        foreach ($blocks6 as $block) {
                                                $total = pow(2, 64-$block->block_netmask) - 1;
                                                $free = $total - $block->used;
                                                echo '<tr><td><a href="/ip/listall6/'.$block->block_id.'">'.$block->block_name.'</a></td><td>'.$block->used.'</td><td>'.$free.'</td><td>'.$total.'</td><td>'.int64_to_inet6(array($block->block_gateway, 0)).'/'.$block->block_netmask.'</td><td>'.int64_to_inet6(array($block->block_ns1_1, $block->block_ns1_2)).', '.int64_to_inet6(array($block->block_ns2_1, $block->block_ns2_2)).'</td><td>'.str_replace(',', ', ', $block->block_nodes).'</td><td>
<a style="width:100px;margin-bottom:5px;" class="btn btn-primary btn-xs" href="/ip/edit_block6/'.$block->block_id.'"><i class="glyphicon glyphicon-edit"></i> Edit Block</a>
<a style="width:100px;margin-bottom:5px;" class="btn btn-danger btn-xs" href="/ip/delete_block6/'.$block->block_id.'" data-toggle="modal" data-target="#delete-'.$block->block_id.'" ><i class="glyphicon glyphicon-trash"></i> Delete Block</a> <div id="delete-'.$block->block_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                                                </td></tr>';
                                        }
                                ?>
                        </table>
                </div>
        </div>
</div>