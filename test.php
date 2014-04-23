<?php

echo "test <br>";

function check_conn_timeout() {
  $status = connection_status();
  if (($status & CONNECTION_TIMEOUT) == CONNECTION_TIMEOUT) {
    echo 'Got timeout <br>';
  }
}

while(1) { 
  check_conn_timeout();
$status = connection_status();
echo "Connection status = " .$status."<br>";
echo "Connection Time out = " . CONNECTION_TIMEOUT.'<br>';
  sleep(1);
}


