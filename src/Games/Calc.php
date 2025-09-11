<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\startGame;

//-- Игра - "Калькулятор"
function initGameSession(int $count = 3): void
{
    $gameParams = [];
    $gameParams["rules"] = 'What is the result of the expression?';
    $operations = ["+", "-", "*"];
    for ($counterAnswers = 0; $counterAnswers < $count; $counterAnswers++) {
        $num = random_int(1, 100);
        $num2 = random_int(1, 100);
        $thisOperation = $operations[random_int(0, 2)];
        $gameParams["expectedAnswer"][] = calculate($num, $num2, $thisOperation);
        $gameParams["questions"][] = "{$num} {$thisOperation} {$num2}";
    }

    startGame($gameParams);
}

function calculate(int $a, int $b, string $operator): int
{
    switch ($operator) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        default:
            $result = 0;
    }
    return $result;
}
