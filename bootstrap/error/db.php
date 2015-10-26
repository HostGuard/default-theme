<div class="col-md-12">
        <div class="panel panel-danger">
                <div class="panel-heading">Oops!</div>
                <div class="panel-body">
                        <p>Something went wrong, but we've dispatched a team of trained monkeys to deal with it.  Sorry for the inconvenience!</p>
                        <p><b>Error ID:</b> <?php echo $error_id; ?></p>
                        
<h4>A PHP Error was encountered</h4>

<p>Severity: <?php echo $severity; ?></p>
<p>Message:  <?php echo $message; ?></p>
<p>Filename: <?php echo $filepath; ?></p>
<p>Line Number: <?php echo $line; ?></p>

                </div>
        </div>
</div>