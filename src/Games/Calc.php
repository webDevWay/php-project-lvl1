<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\startGame;

//-- Игра - "Калькулятор"
function initGameData(int $count = 3): void
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

function calculate(int $x, int $y, string $operator): int
{
        $operations = [
            '+' => fn($x, $y) => $x + $y,
            '-' => fn($x, $y) => $x - $y,
            '*' => fn($x, $y) => $x * $y,
        ];

        return $operations[$operator]($x, $y);
}
