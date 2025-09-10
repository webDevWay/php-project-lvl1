<?php

namespace BrainGames\Even;

use function BrainGames\Engine\startGame;

//-- Игра - "Проверка на чётность"
function initGameData(int $count = 3): void
{
    $gameParams = [];
    $gameParams["rules"] = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($counterAnswers = 0; $counterAnswers < $count; $counterAnswers++) {
        $num = random_int(1, 100);
        $gameParams["expectedAnswer"][] = isEven($num) ? "yes" : "no";
        $gameParams["questions"][] = $num;
    }

    startGame($gameParams);
}
    //--- Функция проверки на чётность
function isEven(int $num): bool
{
    return $num % 2 === 0;
}
