<div class="page-header">
        <h1>Reboot <small><?php echo $container->hostname; ?></small></h1>
</div>

<div class="row">
        <div class="col-md-12">        
                <p>Are you sure you want to reboot this server?</p>
                <?php echo form_open('server/reboot/'.$container->ctid); ?>
                
                <p>
                        <input class="btn btn-primary" name="reboot" value="Reboot" type="submit" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </p>
                
                <?php echo form_close(); ?>
        </div>
</div>