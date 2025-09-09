<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\BrainEven\brainEvenGame;
use function BrainGames\BrainGcd\getGcd;
use function BrainGames\BrainProgression\generateProgression;
use function BrainGames\BrainProgression\hideElement;
use function BrainGames\BrainPrime\isPrime;

//---Приветствуем пользователя, получаем имя
function getUserName(): string
{
    //Приветствуем пользователя
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    //Вернуть полученное имя
    return $name;
}
    //---Функция для неверного ответа
function wrongAnswer(string $name, mixed $answer, mixed $expectedAnswer) {
    line("{$answer} is wrong answer ;(. Correct answer was '{$expectedAnswer}'.");
    line("Let's try again, %s!", $name);
    return;
}
    //---Функция для верного ответа
function trueAnswer(string $name) {
    line("Congratulations, %s!", $name);
    return;
}
    //---Функция проверки ответов
function checkAnswer(int $counterAnswers, string $name, mixed $answer, mixed $expectedAnswer)
{
    line("Your answer: {$answer}");
    if ($answer != $expectedAnswer) {
        wrongAnswer($name, $answer, $expectedAnswer);
        return $counterAnswers = 3;      
    } else {
        line("Correct!");
        $counterAnswers++;
        if ($counterAnswers == 3) {
            trueAnswer($name);
        }
    }
    return $counterAnswers;
}
