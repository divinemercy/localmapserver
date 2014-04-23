<?php

echo "test <br>";

function check_conn_timeout() {
  $status = connection_status();
  if (($status & CONNECTION_TIMEOUT) == CONNECTION_TIMEOUT) {
    echo 'Got timeout';
  }
}

//while(1) { 
//  check_conn_timeout();
//  sleep(1);
//}

echo "Connection Time out = " . CONNECTION_TIMEOUT.'<br>';


