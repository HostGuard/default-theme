<div class="row">
        <div class="col-md-12">
                <div class="page-header">
                        <h1>Console Settings <small><?php echo $container->hostname; ?></small></h1>
                </div>
                <div class="col-md-12">
                
                        <table>
                                <?php
                                        echo '
                                <tr><th class="col-md-2">Address:</th><td>'.long2ip($node->ip_address).'</td></tr><tr><th class="col-md-2">Port:</th><td>'.$container->kvm_vnc_port.'</td></tr>
                                </table><br />';
                                
                                
                                echo '<a class="btn btn-primary" id="kvm-console" href="/libkvm/console/'.$container->ctid.'">Launch NoVNC Console</a>
                                
                                <a class="btn btn-warning" href="/libkvm/javaconsole/'.$container->ctid.'">Launch Java Console</a>';
                                ?>
                        </table>

                        <script type="text/javascript">
                                $("#kvm-console").click(function(e) {
                                        e.preventDefault();
                                        window.open($(this).attr('href'), 'popUpWindow', 'height=435,width=720,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no')
                                });
                        </script>
                </div>
        </div>
</div>