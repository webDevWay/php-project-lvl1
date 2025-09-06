<?php

namespace BrainGames\Cli;

// Use Composer's autoloader:
use function cli\line;
use function cli\prompt;

/* Greeting user  */
function getName()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
