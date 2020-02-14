<?php

include_once 'PlayerController.php';

//interface just for the display function
interface IdisplayPlayers{
    function display($isCLI, $course, $filename = null);
}

/*
 * Ideally I would want to break-up the Display Class into two classes, where isCLI is true in one class, and the other
 * class that would contain the HTML code. Both the classes would implement the IdisplayPlayers interface.
 *
 * I initially did try to break it up, but for the sake of getting the program to run and with the time I had, I left it as is.
 */

class Display extends ReadPlayer  implements IdisplayPlayers {
    function __construct()
    {
        //empty for now, included the constructor to avoid errors
    }

    function display($isCLI, $source, $filename = null) {
        $players = $this->readPlayers($source, $filename);

        if ($isCLI) {
            echo "Current Players: \n";
            foreach ($players as $player) {

                echo "\tName: $player->name\n";
                echo "\tAge: $player->age\n";
                echo "\tSalary: $player->salary\n";
                echo "\tJob: $player->job\n\n";
            }
        } else {

            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    li {
                        list-style-type: none;
                        margin-bottom: 1em;
                    }
                    span {
                        display: block;
                    }
                </style>
            </head>
            <body>
            <div>
                <span class="title">Current Players</span>
                <ul>
                    <?php foreach($players as $player) { ?>
                        <li>
                            <div>
                                <span class="player-name">Name: <?= $player->name ?></span>
                                <span class="player-age">Age: <?= $player->age ?></span>
                                <span class="player-salary">Salary: <?= $player->salary ?></span>
                                <span class="player-job">Job: <?= $player->job ?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </body>
            </html>
            <?php
        }
    }
}