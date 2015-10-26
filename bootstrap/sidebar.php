<?php 
	if ($this->ion_auth->is_admin() === true) {
        $this->load->view('admin/sidebar');
        return;
	}
	
	$controller = $this->uri->segment(1);
	$func = $this->uri->segment(2);
?>

	<div class="row">
		<div id="sidebar" class="col-sm-3 col-md-2">
			<ul class="nav">
				<li><a href="/">Servers</a>
					<div class="list-group" id="my-servers">
						<?php
							$sql = 'SELECT * FROM containers WHERE user = ? ORDER BY hostname ASC';
							$servers = $this->db->query($sql, array($this->session->userdata('user_id')));
							foreach ($servers->result() as $server) {
								echo '<a class="list-group-item '.($func == $server->ctid || $this->uri->segment(3, 0) == $server->ctid ? 'active' : '').'" href="/server/'.$server->ctid.'">'.$server->hostname.'</a>';
							}
						?>
					</div>
				</li>
			</ul>
		</div>
	</div>
	
	<div id="admin-main" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="row">