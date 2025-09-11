<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startGame(array $gameParams): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    ["rules" => $rules, "expectedAnswer" => $expectedAnswer, "questions" => $questions] = $gameParams;
    line($rules);
    for ($i = 0; $i < count($questions); $i++) {
        $answer = prompt("Question: {$questions[$i]}");
        line("Your answer: {$answer}");
        if ($answer !== (string)$expectedAnswer[$i]) {
            line("{$answer} is wrong answer ;(. Correct answer was '{$expectedAnswer[$i]}'.");
            line("Let's try again, %s!", $name);
            return;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
    return;
}
