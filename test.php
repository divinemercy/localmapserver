<?php

session_start();
echo "test <br>";

function check_conn_timeout() {
    $status = connection_status();
    if (($status & CONNECTION_TIMEOUT) == CONNECTION_TIMEOUT) {
        echo 'Got timeout <br>';
    }
}

$_SESSION['start_time'] = time();
for ($i = 0; $i < 100; $i++) {
    echo "val " . $i . "<br>";
    $exe_time = time() - $_SESSION['start_time'];
    echo "Exe Time = " . $exe_time . '<br><br>';
}
//while (1) {
//    check_conn_timeout();
//    $status = connection_status();
////    sleep(1);
//    $exe_time = time() - $_SESSION['start_time'];
////    echo "Connection status = " . $status . "<br>";
////    echo "Connection Time out = " . CONNECTION_TIMEOUT . '<br>';
//    echo "Exe Time = " . $exe_time . '<br>';
//}


