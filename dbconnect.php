<?php
// Connecting, selecting database
$dbconn = pg_connect("host=192.168.1.102 dbname=codeninja user=postgres password=srikar")
    or die('Could not connect: ' . pg_last_error());
?>