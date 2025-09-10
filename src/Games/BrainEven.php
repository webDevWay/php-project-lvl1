<?php

namespace BrainGames\BrainEven;

use function BrainGames\Engine\checkAnswer;

//-- Игра - "Проверка на чётность"
function brainEvenGame(int $count = 3): void
{    
    $gameParams = [];
    $gameParams["rules"] = 'Answer "yes" if the number is even, otherwise answer "no".';
          
    for ($counterAnswers = 0; $counterAnswers < $count; $counterAnswers++) {
        $num = random_int(1, 100);
        $gameParams["expectedAnswer"][] = isEven($num) ? "yes" : "no";
        $gameParams["questions"][] = $num;
    }
    //--Функция проверки ответов
    $counterAnswers = checkAnswer($gameParams);
}
    //--- Функция проверки на чётность
function isEven(int $num) : string
{
    return $num % 2 === 0;
}
