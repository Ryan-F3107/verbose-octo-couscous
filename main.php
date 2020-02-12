<?php
require_once 'View.php';
$playersObjectOne = new DisplayPlayer();

$playersObjectOne->display(php_sapi_name() === 'cli', 'array');

$playersObjectTwo = new DisplayPlayer();

$playersObjectTwo->display(php_sapi_name() === 'cli', 'json');