<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\getUserName;
use function BrainGames\Engine\checkAnswer;
//функция проверки чётности
function isEven(int $num) : string 
{
    return $num % 2 === 0 ? "yes" : "no";
}
//-- Игра - "Проверка на чётность"
function brainEvenGame(int $count = 3): void
{    
    //получим имя пользователя
    $userName = getUserName();
    line('Answer "yes" if the number is even, otherwise answer "no".');
      
    $counterAnswers = 0;

    while ($counterAnswers < $count) {
        $num = random_int(1, 100);
        $answer = prompt("Question: {$num}");
        $expectedAnswer = isEven($num);
        //--Функция проверки ответов
        $counterAnswers = checkAnswer($counterAnswers, $userName, $answer, $expectedAnswer);
    }
}
