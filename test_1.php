<?php
session_start();
echo "Session content <br>";

$address = "yaounde-roadmap-scale1-";

//session_destroy();
echo "Address = " . $address ."<br>";
echo "<pre>";
print_r( $_SESSION[$address]);
echo "</pre>";








//$time_start = microtime_float();
//
//// Attend pendant un moment
//usleep(1000000);
//
//$time_end = microtime_float();
//$time = $time_end - $time_start;
//
//echo "Ne rien faire pendant $time secondes\n";





//while (1) {
//    check_conn_timeout();
//    $status = connection_status();
////    sleep(1);
//    $exe_time = time() - $_SESSION['start_time'];
////    echo "Connection status = " . $status . "<br>";
////    echo "Connection Time out = " . CONNECTION_TIMEOUT . '<br>';
//    echo "Exe Time = " . $exe_time . '<br>';
//}


