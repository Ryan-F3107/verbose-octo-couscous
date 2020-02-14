<?php

/*  Code Refactored by Ryan Fernandes

 * --- My Thought process in terms of refactoring code ---
 * My Objective:
 * Break down the PlayersObjective class into smaller classes that have similar or singular responsibility(Ideally)
 * Break down generalized interface into smaller, more specific interface based on the class
 * Try and find ways to be open for extension but close for modification.
 *
 * Following the fundamentals of MVC:
 * Goal:
 * Model File: Have functions related to data handling in the model class
 * View File: Have the display function in the PlayerView file/class excluding any logic function/methods
 * Controller: File: Used to connect Model class with View class
 */

include_once 'PlayerView.php';

// Checked to see if the information could be displayed from an array, json and file

$playersOne = new Display();
// Display on web using information from array
$playersOne->display(php_sapi_name() === 'cli', 'array');

$playerTwo = new Display();
// Display on web using information from json
$playerTwo->display(php_sapi_name() === 'cli', 'json');

$playersThree = new Display();
// Display on web using information from json file
$playersThree->display(php_sapi_name() === 'cli', 'file','playerdata.json');
