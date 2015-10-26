<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $container->hostname;?> Console </div>
                <div class="panel-body">
                        <applet code="VncViewer.class" archive="/java/vncviewer.jar">
                                <param name="open new window" value=yes>
                                <param name="scaling factor" value=auto>
                                <?php
                                echo '
                                        <param name="port" value="'.$container->kvm_vnc_port.'">
                                        <param name="host" value="'.long2ip($node->ip_address).'">
                                        <param name="password" value="'.$container->kvm_password.'">';
                                ?>
                                Java is required to use the KVM Console
                        </applet>
                </div>
        </div>
</div>