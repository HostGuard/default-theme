<html>
<body>
        <h1>Login Alert for <?php echo $company;?></h1>
        
        <p>Someone has recently logged into your HostGuard account at <?php echo $company; ?>.</p>
        <p>IP Address: <?php echo $ip; ?><br />
        Hostname: <?php echo $hostname; ?><br />
        Time: <?php echo $time; ?></p>
        <p>If this is not you, please log in to your account immediately to change your password, and inform our staff immediately.</p>
        <p>Regards,<br />
        <?php echo $company; ?>
</body>
</html> 
