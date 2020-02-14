<?php

/*
 * --- My Thought process in terms of refactoring code ---
 * My Objective:
 * Break down the PlayersObjective class into smaller classes that have similar or singular responsibility(Ideally)
 * Break down generalized interface into smaller, more specific interface based on the class
 *
 * Following the fundamentals of MVC:
 * Goal:
 * Model File: Have functions related to data handling in the model class
 * View File: Have the display function in the PlayerView file/class excluding any logic function/methods
 * Controller: File: Used to connect Model class with View class
 *
 * 3rd times the charm
 */

include_once 'PlayerModel.php';
include_once 'PlayerView.php';

$playersOne = new Display();
// Display on web using information from array
$playersOne->display(php_sapi_name() === 'cli', 'array');

$playerTwo = new Display();
// Display on web using information from json
$playerTwo->display(php_sapi_name() === 'cli', 'json');
