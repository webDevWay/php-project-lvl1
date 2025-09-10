<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

    //---Приветствуем пользователя, получаем имя
function getUserName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}
    //---Функция логики игры и проверки ответов
function startGame(array $gameParams)
{
    $name = getUserName();
    ["rules" => $rules,
    "expectedAnswer" => $expectedAnswer,
    "questions" => $questions] = $gameParams;
    line($rules);
    for ($i = 0; $i < count($questions); $i++) {
        $answer = prompt("Question: {$questions[$i]}");
        line("Your answer: {$answer}");
        if ($answer != $expectedAnswer[$i]) {
            wrongAnswer($name, $answer, $expectedAnswer[$i]);
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
    //---Функция для верного ответа (конец игры)
function trueAnswers(string $name)
{
    line("Congratulations, %s!", $name);
    return;
}
