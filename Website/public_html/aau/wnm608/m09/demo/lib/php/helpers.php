<?php

function print_p($v) {
	echo "<pre>",print_r($v),"</pre>";
}

function get_json($s) {
	return json_decode(file_get_contents($s));
}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}