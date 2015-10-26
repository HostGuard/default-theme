<div class="col-md-6">
        <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                        <?php
                                if ($temp === true) {
                                        echo '<div class="msg-info">This is a temporary API Key for adding a new node.  It will be deleted immediately after it is used the first time.</div>';
                                }
                        ?>
                        <p>Your new API Key has been generated.  Please copy the key below and store it somewhere safe - it will not be displayed again.</p>
                        <ul>
                                <li><b>Key Name:</b> <?php echo $name; ?></li>
                                <li><b>ID:</b> <?php echo $id; ?></li>
                                <li><b>Key:</b> <?php echo $key; ?></li>
                        </ul>
                </div>
        </div>
</div>