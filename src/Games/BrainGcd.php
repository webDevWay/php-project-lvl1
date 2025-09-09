<?php

namespace BrainGames\BrainGcd;

//-- вычислим общий делитель
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
