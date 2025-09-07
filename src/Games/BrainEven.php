<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

function getUserName()
{
    //Приветствуем пользователя
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    //Инициализируем счётчик
        $count = 0;
    //--Функция проверки ответов
    function checkAnswer($count, $name)
    {
        $num = random_int(1, 100);
        $isEven = $num % 2 === 0 ? true : false;
        $answer = prompt("Question:", $num);
        line("Your answer: {$answer}");
        $expectedAnswer = $isEven ? 'yes' : 'no';
        if ($answer !== $expectedAnswer) {
            line("{$answer} is wrong answer ;(. Correct answer was '{$expectedAnswer}'.");
            return line("Let's try again, %s!", $name);
        } else {
            line("Correct!");
            $count++;
            if ($count === 3) {
                return line("Congratulations, %s!", $name);
            }
            checkAnswer($count, $name);
        }
    }
    checkAnswer($count, $name);
}
