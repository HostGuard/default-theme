<div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading"><?php echo $container->hostname;?> Console </div>
                <div class="panel-body">
                        <applet style="width: 100%; height: 480px" archive="SSHTermApplet-signed.jar,SSHTermApplet-jdkbug-workaround-signed.jar,SSHTermApplet-jdk1.3.1-dependencies-signed.jar" code="com.sshtools.sshterm.SshTermApplet" codebase="/java/">
                        <?php
                                        echo '
                                <param name=sshapps.connection.host value='.long2ip($node->ip_address).' />
                                <param name=sshapps.connection.port value=22 />
                                <param name=sshapps.connection.userName value='.$container->ovz_console_user.' />';
                        ?>
                                <param name=sshapps.connection.showConnectionDialog value=false />
                                <param name=sshapps.connection.authenticationMethod value=password />
                                <param name=sshapps.connection.connectImmediately value=true />
                        </applet>
                </div>
        </div>
</div>