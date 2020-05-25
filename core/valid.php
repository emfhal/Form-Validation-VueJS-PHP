<?php
$cols = array();
if (!empty($_REQUEST['name'])) {
    $text = $_REQUEST['name'];
    $is_english = preg_match('/^[A-Za-z]+$/i', $text);
    $strlen = strlen($text);
    if ($is_english and $strlen > 3){
        $cols['status'] = "success";
    } else{
        $cols['status'] = false;
    }
}

header('Content-type:application/json;charset=utf-8');
echo json_encode( $cols );
