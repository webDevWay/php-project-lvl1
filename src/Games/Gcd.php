<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\startGame;

//-- Игра - Общий делитель -- "НОД"
function initGameData(): void
{
    $gameParams = [];
    $gameParams["rules"] = 'Find the greatest common divisor of given numbers.';
    $count = 3;
    for ($counterAnswers = 0; $counterAnswers < $count; $counterAnswers++) {
        $num = random_int(1, 100);
        $num2 = random_int(1, 100);
        $gameParams["expectedAnswer"][] = getGcd($num, $num2);
        $gameParams["questions"][] = "{$num} {$num2}";
    }

    startGame($gameParams);
}

//-- Проверка на общий делитель
function getGcd(int $num1, int $num2): int
{
    $a = $num1;
    $b = $num2;
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return abs($a);
}
