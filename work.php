<?php
    header('Access-Control-Allow-Origin: *');
 
 
    $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
    header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');
 
    // We don't need action for this tutorial, but in a complex code you need a way to determine Ajax action nature
    $action = $_GET['action'];
 
    // Decode parameters into readable PHP object
    parse_str($_GET['formData'], $output);

$myfile = fopen("log.txt", "w") or die("Unable to open file!");
$test="test=" . $output['username'] ;
fwrite($myfile, $test);
 
    // Get username
    $username = $output['username'];
    // Get password
    $password = $output['password'];
 
    // Let's say everything is in order
    $output = array('status' => true, 'massage' => $username);
    echo ($callback ? $callback . '(' : '') . json_encode($output) . ($callback ? ')' : '');
?>
