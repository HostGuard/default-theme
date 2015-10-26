<div class="page-header">
        <h1>Boot <small><?php echo $container->hostname; ?></small></h1>
</div>

<div class="row">
        <div class="col-md-12">
                <p>Are you sure you want to boot this server?</p>
                <?php echo form_open('server/boot/'.$container->ctid); ?>

                <input type="submit" class="btn btn-primary" name="boot" value="Boot" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                <?php echo form_close(); ?>
        </div>
</div>