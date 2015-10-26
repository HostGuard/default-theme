
<!--	This is the important information.  I'll make it look good if you can make it work :)
	<div class="panel panel-default">
		<div class="panel-heading">location</div>

		<a href="#node5">Bay</a>
		
		<table class="table table-condensed container-info">
			<tbody>
				<tr>
					<th>Load Average</th>
					<td>
						<span class="label label-success">3.64</span>
						<span class="label label-success">3.02</span>
						<span class="label label-success">2.83</span>
					</td>
				</tr>
				<tr>
					<th>Memory</th>
					<td>
						<div class="progress" style="max-width: 250px">
							<span>24.4 GB / 70.8 GB</span>
							<div class="progress-bar" role="progressbar" aria-valuenow="25627788" aria-valuemin="0" aria-valuemax="74204964" style="width: 
									34.536487343353%">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>Disk</th>
					<td>
						<div class="progress" style="max-width: 250px">
							<span>3.9 GB / 23.3 GB</span>
							<div class="progress-bar" role="progressbar" aria-valuenow="4044968" aria-valuemin="0" aria-valuemax="24391484" style="width: 
										16.583525627223%">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>Uptime</th>
					<td>452 days 01:27</td>
				</tr>
				<tr>
					<th>Network In</th>
					<td>61.3 KB/s</td>
				</tr>
				<tr>
					<th>Network Out</th>
					<td>80.6 KB/s</td>
				</tr>
			</tbody>
		</table>
	</div>
	
	
	-->
	<div class="col-md-12">
        <?php foreach ($locations as $location): ?>
			<div id="location-<?php echo $location['id']; ?>" class="panel panel-default">
				<div class="panel-heading"><?php echo $location['location_name']; ?></div>
					
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

							<div style="display: block; padding: 5px 10px; border-bottom: 1px solid #DDDDDD; line-height: 30px;" data-toggle="collapse" data-parent="#accordion" href="#node<?php echo $node->id; ?>">
								
								<div class="col-xs-3">
									<?php echo $node->node_name; ?>
								</div>
								
								<div class="col-xs-6 text-center">
									<span class="<?php echo $load1style; ?>"><?php echo $node->load1; ?></span>
									<span class="<?php echo $load5style; ?>"><?php echo $node->load5; ?></span>
									<span class="<?php echo $load15style; ?>"><?php echo $node->load15; ?></span>
								</div>
								
								<div class="col-xs-3">
									<a class="btn btn-sm btn-default pull-right"><i class="fa fa-bars"></i></a>
								</div>
								<div class="clearfix"></div>
							</div>
							
							<div id="node<?php echo $node->id; ?>" class="collapse" style="border-bottom: 1px solid #DDDDDD;">
								<table class="table table-condensed table-striped" style="margin-bottom: 5px;">
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
										<th>Network Activity (In/Out)</th>
										<td><?php echo byte_format($node->bytes_in/5); ?>/s - <?php echo byte_format($node->bytes_out/5); ?>/s</td>
									</tr>
									<tr>
										<td colspan="2">
											<a class="btn btn-block btn-primary" href="/node/<?php echo $node->id; ?>">Manage Node</a>
										</td>
									</tr>
								</table>
							</div>
                        <?php endforeach; ?>
					</div>

					<div class="panel-body no-pad hidden-xs">
						<table class="table table-condensed">
							<tr>
								<th class="col-md-2">Hostname</th>
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
													'."><span class="fa fa-exclamation-circle fa-white"></span> Status Unknown</p>'
											);
									}
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