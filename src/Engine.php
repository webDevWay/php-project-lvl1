<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

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
    //---Функция проверки ответов
function checkAnswer(array $gameParams)
{
    $name = getUserName();
    ["rules" => $rules, 
    "expectedAnswer" => $expectedAnswer,
    "questions" => $questions] = $gameParams;
    line($rules);
    for($i = 0; $i < count($questions); $i++) {
        $answer = prompt("Question: {$questions[$i]}");
        line("Your answer: {$answer}");
        if ($answer != $expectedAnswer[$i]) {
            wrongAnswer($name, $answer[$i], $expectedAnswer[$i]);
            return;
        } else {
            line("Correct!");
        }
    }
    trueAnswers($name);
}
    //---Функция для неверного ответа
function wrongAnswer(string $name, mixed $answer, mixed $expectedAnswer)
{
    line("{$answer} is wrong answer ;(. Correct answer was '{$expectedAnswer}'.");
    line("Let's try again, %s!", $name);
    return;
}
    //---Функция для верного ответа
function trueAnswers(string $name)
{
    line("Congratulations, %s!", $name);
    return;
}
