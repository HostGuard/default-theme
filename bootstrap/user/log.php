<div class="col-md-12 col-xl-12">
        <div class="panel panel-default">
                <div class="panel-heading">Login Log</div>
                <div class="panel-body no-pad">
                        <table class="table table-condensed">
                                <tr><th>Time</th><th>IP Address</th><th>Type</th><th>Message</th></tr>
                                <?php
                                        foreach ($logs as $log) {
                                                echo '<tr'.($log->log_level == "error" ? ' class="msg-error"' : '').'><td>'.date('M d, Y g:ia', gmt_to_local($log->log_time, $this->ion_auth->user()->row()->timezone)).'</td><td>'.long2ip($log->log_ip).'</td><td>'.$log->log_level.'</td><td style="max-width: 500px">'.$log->log_message.'</td></tr>';
                                        }
                                ?>
                        </table>
                        
                        <?php echo '<p style="margin: 0 auto; text-align: center">'.$this->pagination->create_links().'</p>'; ?>
                </div>
        </div>
</div>