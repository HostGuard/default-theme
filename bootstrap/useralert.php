<?php
if ($alert_level == "critical") {
        echo '<p class="alert alert-danger"><a href="/alert/ackuser/'.$alert_id.'?return_url='.urlencode($_SERVER["REQUEST_URI"]) .'" title="Remove" class="pull-right btn btn-sm btn-danger">Remove</a><strong>Critical Alert!</strong> Server: '.$hostname.', Module: '.$alert_module.', Value: '.$alert_value.', '.elapsed_time(time()-$alert_time).' ago</p>';
} else if ($alert_level == "warning") {
        echo '<p class="alert alert-warning"><a href="/alert/ackuser/'.$alert_id.'?return_url='.urlencode($_SERVER["REQUEST_URI"]) .'" title="Remove" class="pull-right btn btn-sm btn-warning">Remove</a><strong>Warning!</strong> Server: '.$hostname.', Module: '.$alert_module.', Value: '.$alert_value.', '.elapsed_time(time()-$alert_time).' ago</p>';
}
?>
