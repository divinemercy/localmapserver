<?php

function check_conn_timeout() {
    $status = connection_status();
    if (($status & CONNECTION_TIMEOUT) == CONNECTION_TIMEOUT) {
        return true;
    }
}

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float) $usec + (float) $sec);
}
