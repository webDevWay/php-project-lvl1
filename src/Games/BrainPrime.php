<?php

namespace BrainGames\BrainPrime;

use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\checkAnswer;

//-- Проверка на простое число
function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }

    if ($number == 2) {
        return true;
    }

    if ($number % 2 == 0) {
        return false;
    }

    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
