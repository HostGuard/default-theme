	<div class="col-xs-12">
		<div class="page-header page-nopad">
			<h2>Create VPS</h2>
		</div>
		
		<p>Choose which virtualization type to use for the new VPS.</p>
	</div>
</div>

<div class="row">
	<?php
		$sql = 'SELECT * FROM virtualization_types ORDER BY name ASC';
		$hypervisors = $this->db->query($sql);
		foreach ($hypervisors->result() as $hypervisor) 
		{
			echo('<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img class="img-responsive" src="/themes/'.$current_theme.'/img/logos/'.$hypervisor->name.'.png" alt="'.$hypervisor->name.'"/>
				<div class="caption">
					<br>
					<p class="text-center"><a href="/lib'.strtolower($hypervisor->name).'/create" class="btn btn-primary btn-lg" role="button">Create a '.$hypervisor->name.' VPS</a></p>							
				</div>
			</div>
		</div>');
		}
	?>