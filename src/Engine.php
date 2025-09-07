<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
//---Приветствуем пользователя, получаем имя
function getUserName()
{
    //Приветствуем пользователя
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    //Вернуть полученное имя
    return $name;
}
//---Функция проверки ответов
function checkAnswer($count, $name, $path) {
    //---Узнать какой файл обратился (для дальнейшей логики)
    $filepath = $path;
    $num = random_int(1, 100);
    $num2 = random_int(1, 10);
    
    //---Логика игр    
    //Подлючим логику в зависимости от игры
    switch ($filepath) {
        case "even": line('Answer "yes" if the number is even, otherwise answer "no".');
                    $answer = prompt("Question:", $num);    
                    $isEven = $num % 2 === 0 ? true : false;
                    $expectedAnswer = $isEven ? 'yes' : 'no';
                    break;
        case "calc": line('What is the result of the expression?');
                    $operation = ["+", "-", "*"];
                    $thisOperation = $operation[random_int(0, 2)];
                        //Перебрать рандомные операторы
                        switch ($thisOperation) {
                            case "*": $expectedAnswer = $num * $num2; 
                                    break;
                            case "+": $expectedAnswer = $num + $num2; 
                                    break;
                            case "-": $expectedAnswer = $num - $num2; 
                                    break;
                        }
                    $answer = prompt("Question:", "{$num} {$thisOperation} {$num2}");
                    $answer = is_string($answer) ? $answer : (int)$answer;
                    break;
        case "": return line("This Game is still in production :)");
        default: return line("This Game is still in production :)");
    }
    //Показать пользователю его ответ
    line("Your answer: {$answer}");

    if ($answer != $expectedAnswer) {
        line("{$answer} is wrong answer ;(. Correct answer was '{$expectedAnswer}'.");
        return line("Let's try again, %s!", $name);
    }
    else {
        line("Correct!");
        $count--;
        if ($count <= 0) {
            return line("Congratulations, %s!", $name);
        }
        checkAnswer($count, $name, $path);
    }
}


