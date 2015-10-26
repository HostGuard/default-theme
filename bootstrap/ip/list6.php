<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $block->block_name ?> Allocated IPs</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Address</th><th>User</th><th>Container Hostname</th><th>Node</th></tr>

                                <?php
                                        foreach ($addresses as $ip) {
                                                echo '<tr><td>'.int64_to_inet6(array($ip->ip_address, 0)).'/64</td>';
                                                if ($ip->ctid == -1) {
                                                        echo '<td colspan="3">Reserved <a class="btn btn-danger btn-xs" href="/ip/unreserve6/'.$ip->ip_address.'">Unreserve</a></td>';
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
