<div class="page-header">
        <h1>Power Off <small><?php echo $container->hostname; ?></small></h1>
</div>

<div class="row">
        <div class="col-md-12">
                <p class="alert alert-danger"><strong>Warning!</strong> This is the equivalent of unplugging the power cord on a physical server.  Improper shutdowns CAN result in data loss!</p>
                
                <p>Are you sure you want to power off this server?</p>
                <?php echo form_open('server/poweroff/'.$container->ctid); ?>
                
                <p>
                        <input class="btn btn-primary" name="poweroff" value="Power Off" type="submit" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </p>
                
                <?php echo form_close(); ?>
        </div>
</div>