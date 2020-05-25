<?php

if (!empty($_REQUEST['name'])) {
    $text = $_REQUEST['name'];
    $is_english = preg_match('/^[A-Za-z]+$/i', $text);
    $strlen = strlen($text);
    if ($is_english and $strlen > 3) echo "success";
}
