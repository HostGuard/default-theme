<?php
        $log_data = array(
                'user' => $this->session->userdata('user_id'),
                'node' => 0,
                'container' => 0,
                'type' => 'auth',
                'level' => 'error',
                'message' => '403 Error: '.$_SERVER['REQUEST_URI']
        );
        $this->logging->log($log_data);
                        
?>
<div class="col-md-12">
        <div class="panel panel-danger">
                <div class="panel-heading">403 Forbidden</div>
                <div class="panel-body">
                        <p>You are not authorized to perform this function.  This incident has been logged.</p>
                </div>
        </div>
</div>