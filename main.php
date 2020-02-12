<?php
require_once 'PlayerView.php';

$playersObjectOne = new DisplayPlayer();
$playersObjectOne->display(php_sapi_name() === 'cli', 'array');
// Takes in information from the JSON file
$playersObjectTwo = new DisplayPlayer();
$playersObjectTwo->display(php_sapi_name() === 'cli', 'json');