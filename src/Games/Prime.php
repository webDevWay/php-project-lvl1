<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\startGame;

//-- Игра - "Простое ли число?"
function initGameSession(int $count = 3): void
{
    $gameParams = [];
    $gameParams["rules"] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    for ($counterAnswers = 0; $counterAnswers < $count; $counterAnswers++) {
        $num = random_int(1, 100);
        $gameParams["expectedAnswer"][] = isPrime($num) ? 'yes' : 'no';
        $gameParams["questions"][] = $num;
    }

    startGame($gameParams);
}
function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }

    if ($number === 2) {
        return true;
    }

    if ($number % 2 === 0) {
        return false;
    }

    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
