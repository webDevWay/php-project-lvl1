<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\checkAnswer;

//-- Игра - "Калькулятор"
function brainCalcGame()
{
    $userName = getUserName();
    line('What is the result of the expression?');

    $num = random_int(1, 100);
    $num2 = random_int(1, 100);
    $operation = ["+", "-", "*"];
    $thisOperation = $operation[random_int(0, 2)];
    //-- Перебрать рандомные операторы --
    switch ($thisOperation) {
        case "*":
            $expectedAnswer = $num * $num2;
            break;

        case "+":
            $expectedAnswer = $num + $num2;
            break;

        case "-":
            $expectedAnswer = $num - $num2;
            break;
    }
    $answer = prompt("Question: {$num} {$thisOperation} {$num2}");
    $answer = is_string($answer) ? $answer : (int)$answer;
}
