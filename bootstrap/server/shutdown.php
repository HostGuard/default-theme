<div class="page-header">
        <h1>Shutdown <small><?php echo $container->hostname; ?></small></h1>
</div>

<p>Are you sure you want to shut down this server?</p>
<?php
        echo form_open('server/shutdown/'.$container->ctid);
?>
<p>
        <input class="btn btn-primary" name="shutdown" value="Shut down" type="submit" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</p>
<?php echo form_close(); ?>