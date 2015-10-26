	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Node Setup <small><?php echo $node->name; ?></small></h2>
		</div>
		
		<p>The following scripts can be used to configure the main functions of a new node.  These functions include the network bridge, HostGuard and basic firewall rules.  You may wish to configure the node further outside these scripts.</p>
		<p>These scripts can be downloaded and run from the command line. It is recommended they be run on fresh systems, to prevent package conflicts.</p>
		<div class="alert alert-info"><strong>Note</strong>: These scripts should be run in a screen (or similar) instance as root.</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">

		<div class="panel panel-default">
			<div class="panel-heading"><strong>Step One</strong> - Network Setup</div>
			<div class="panel-body">
				<p>This step should be skipped if you have setup the network bridge.  If the network bridge hasn't been setup running this script will use the node details to configure the bridge for you.  It's recommended you verify the node details <a href="/node/edit/<?php echo $node->id; ?>">here</a> before proceeding.</p>

<pre><?php echo 'wget --no-check-certificate https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '?script=2 -O install-network-' . strtolower($node->name) . '.sh' ?>

<?php echo 'chmod +x install-network-' . strtolower($node->name) . '.sh' ?>

<?php echo './install-network-' . strtolower($node->name) . '.sh' ?>
</pre>

				<p>The network setup script can be downloaded if you wish to upload it manually.
					<a class="btn btn-primary btn-sm" href="<?php echo 'https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '?script=2' ?>">Download Script</a>
				</p>
			</div>
		</div>
	
	 <div class="panel panel-default">
                <div class="panel-heading"><strong>Step Two</strong> - HostGuard Setup</div>
                <div class="panel-body">
					<p>You should verify your node meets the <a href="#required" data-toggle="modal" data-target="#required">minimum requirements</a> before proceeding with the installation process.</p>

					<p>You should run the following command to ensure there are no conflicts.  In the event conflicts are encountered they should be resolved before proceeding.</p>
					<pre>rpm -Uvh http://repo.hostguard.net/hostguard-release-1-1.noarch.rpm</pre>

					<p>If no conflicts were reported with the above command you can proceed with the setup by running these commands:</p>
<pre><?php echo 'wget --no-check-certificate https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '?script=1 -O install-slave-' . strtolower($node->name) . '.sh' ?>

<?php echo 'chmod +x install-slave-' . strtolower($node->name) . '.sh' ?>

<?php echo './install-slave-' . strtolower($node->name) . '.sh' ?></pre>

					<p>The HostGuard setup script can be downloaded if you wish to upload it manually.
					<a class="btn btn-primary btn-sm" href="<?php echo 'https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '?script=1' ?>">Download Here</a>
					</p>
        </div>
        </div>


    <div class="panel panel-default">
        <div class="panel-heading"><strong>Step Three</strong> - Firewall Setup (Recommended)</div>
        <div class="panel-body">
			<p>If you have not configured already configured any firewall (iptables) rules, you can configure our default rules with the following command.  You can alternatively manually add the required ports from the list below.</p>
			<pre>yum -y install hostguard-iptables-node</pre>
			
            <p>The default rules installed using the package:</p>
            <pre>
:INPUT ACCEPT [0:0]
:FORWARD ACCEPT [0:0]
:OUTPUT ACCEPT [0:0]
:POSTROUTING ACCEPT [0:0]
-A POSTROUTING -o virbr0 -p udp -m udp --dport 68 -j CHECKSUM --checksum-fill
-A FORWARD -i virbr0 -o virbr0 -j ACCEPT
-A FORWARD -o virbr0 -j REJECT --reject-with icmp-port-unreachable
-A FORWARD -i virbr0 -j REJECT --reject-with icmp-port-unreachable

-A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
-A INPUT -p icmp -j ACCEPT
-A INPUT -i lo -j ACCEPT

-A INPUT -i virbr0 -p udp -m udp --dport 53 -j ACCEPT
-A INPUT -i virbr0 -p tcp -m tcp --dport 53 -j ACCEPT
-A INPUT -i virbr0 -p udp -m udp --dport 67 -j ACCEPT
-A INPUT -i virbr0 -p tcp -m tcp --dport 67 -j ACCEPT

#SSH services
#Other SSH ports that you may want to consider
-A INPUT -m state --state NEW -m tcp -p tcp --dport 8221 -j ACCEPT
-A INPUT -m state --state NEW -m tcp -p tcp --dport 221 -j ACCEPT
-A INPUT -m state --state NEW -m tcp -p tcp --dport 42 -j ACCEPT
-A INPUT -m state --state NEW -m tcp -p tcp --dport 2222 -j ACCEPT
#Default SSH
-A INPUT -m state --state NEW -m tcp -p tcp --dport 22 -j ACCEPT

#HTTP Services
-A INPUT -m state --state NEW -m tcp -p tcp --dport 80 -j ACCEPT
-A INPUT -m state --state NEW -m tcp -p tcp --dport 443 -j ACCEPT
-A INPUT -j REJECT --reject-with icmp-host-prohibited
-A FORWARD -j REJECT --reject-with icmp-host-prohibited
COMMIT
            </pre>
            
        </div>
    </div>
	
	<p>It can take a few minutes once you have finished the node installation, before data about the node will appear in HostGuard.  If it takes more than 20 minutes for information to appear your install may have an issue.  Contact support for further assistance.</p>
	
    <p class="text-center"><a class="btn btn-lg btn-success" href="/node/index">Done</a></p>
</div>



<div class="modal fade" id="required" tabindex="-1" role="dialog" aria-labelledby="required" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="required">Node Requirements</h4>
			</div>
			<div class="modal-body">
				<h4>Minimum KVM Node Requirements</h4>
				<ul>
					<li>Supported Operating System (CentOS 5 or 6)</li>
					<li>8GB Ram</li>
					<li>50GB Disk Space</li>
					<li>LVM Group with 50GB Disk Space</li>
					<li>100Mbps Network Connection</li>
					<li>Root Login Enabled</li>
					<li>Network Bridge Configured</li>
				</ul>
				
				<p>We recommend disabling password authentication for the root account to increase security.  ISO's, Snapshots and Templates are saved outside of the Volume Group, so you should allow for additional disk space.</p>
				
				<h4>Minimum OpenVZ Node Requirements</h4>
				<ul>
					<li>Supported Operating System (CentOS 5 or 6)</li>
					<li>8GB Ram</li>
					<li>50GB Disk Space</li>
					<li>50GB /vz Partition</li>
					<li>100Mbps Network Connection</li>
					<li>Root Login Enabled</li>
				</ul>
				
				<p>We recommend disabling password authentication for the root account to increase security.  Snapshots and Templates are saved outside of the /vz partition, so you should allow for additional disk space.</p>
				
				<div class="alert alert-info"><strong>Note</strong>: Additional information regarding node requirements and setup directions can be found in the <a href="http://hostguard.net/docs" target="_blank">documentation</a></div>
		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>