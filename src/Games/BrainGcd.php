<?php

namespace BrainGames\BrainGcd;

//-- вычислим общий делитель
function getGcd($num1, $num2)
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
