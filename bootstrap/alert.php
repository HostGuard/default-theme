<?php
if ($alert_level == "critical") {
        echo '<p class="msg-error"><strong>Critical Alert!</strong> Module: '.$alert_module.', Value: '.$alert_value.', '.elapsed_time(time()-$alert_time).' ago <a href="/alert/ack/'.$alert_id.'" title="Remove" class="remove-btn">Remove</a></p>';
} else if ($alert_level == "warning") {
        echo '<p class="msg-attention"><strong>Warning!</strong> Module: '.$alert_module.', Value: '.$alert_value.', '.elapsed_time(time()-$alert_time).' ago <a href="/alert/ack/'.$alert_id.'" title="Remove" class="remove-btn">Remove</a></p>';
}
?>
