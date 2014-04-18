<?php

include_once './localmap.php';

$action = $_REQUEST["action"];

$result = null;
switch ($action) {
    case "getLocalmap":
        $result = getLocalmap();
        break;

    default:
        break;
}

if (empty($result)) {
    $result = array(
        success => false
    );
}

$resultStr = json_encode($result);
echo $_REQUEST['callback']."(".json_encode($result).");";

