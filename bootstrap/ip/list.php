<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $block->block_name ?> Allocated IPs</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Address</th><th>MAC</th><th>User</th><th>Container Hostname</th><th>Node</th></tr>

                                <?php
                                        foreach ($addresses as $ip) {
                                                echo '<tr><td>'.long2ip($ip->ip_address).'</td><td>'.$ip->mac.'
<a class="btn btn-primary btn-xs" href="/ip/mac/'.$ip->ip_address.'?return_url='.urlencode($_SERVER['REQUEST_URI']).'" data-toggle="modal" data-target="#mac-'.$ip->ip_address.'"><i class="glyphicon glyphicon-edit"></i> Edit</a><div class="modal fade" id="mac-'.$ip->ip_address.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></td>';
                                                if ($ip->ctid === NULL) {
                                                        echo '<td colspan="3">Unallocated
<a data-toggle="modal" data-target="#reserve-'.$ip->ip_address.'" class="btn btn-success btn-xs" href="/ip/reserve/'.$ip->ip_address.'?return_url='.urlencode($_SERVER['REQUEST_URI']).'">Reserve</a>
<div id="reserve-'.$ip->ip_address.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div></td>';
                                                } elseif ($ip->ctid == -1) {
                                                        echo '<td colspan="3">Reserved
<a data-toggle="modal" data-target="#unreserve-'.$ip->ip_address. '" class="btn btn-danger btn-xs" href="/ip/unreserve/'.$ip->ip_address.'?return_url='.urlencode($_SERVER['REQUEST_URI']).'">Unreserve</a>
<div id="unreserve-'.$ip->ip_address.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div></td>';
                                                } else {
                                                        echo '<td>'.$ip->first_name.' '.$ip->last_name.'<td><a href="/server/'.$ip->ctid.'">'.$ip->hostname.'</a></td><td>'.$ip->node_name.'</td></tr>';
                                                }
                                        }
                                ?>
                        </table>
                        
                        <?php echo '<p style="margin: 0 auto; text-align: center">'.$this->pagination->create_links().'</p>'; ?>
                        
                </div>
        </div>
</div>
