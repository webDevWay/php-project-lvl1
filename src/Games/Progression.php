<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\startGame;

 //-- Игра - "Арифметическая прогрессия"
function initGameData(int $count = 3): void
{
    $gameParams = [];
    $gameParams["rules"] = 'What number is missing in the progression?';
    for ($counterAnswers = 0; $counterAnswers < $count; $counterAnswers++) {
        $progression = generateProgression();
        $hiddenElement = hideElement($progression);
        $gameParams["expectedAnswer"][] = $hiddenElement["hidden_value"];
        $gameParams["questions"][] = implode(" ", $hiddenElement["progression"]);
    }

    startGame($gameParams);
}
//-- Генерируем прогрессию
function generateProgression(
    int $length = 10,
    int $minStep = 2,
    int $maxStep = 5,
    int $minStart = 1,
    int $maxStart = 20
): array {
    $start = rand($minStart, $maxStart);
    $step = rand($minStep, $maxStep);

    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    return $progression;
}
//-- Скрыть элемент
function hideElement(array $progression): array
{
    $hiddenIndex = rand(0, count($progression) - 1);
    $hiddenValue = $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';

    return [
        'progression' => $progression,
        'hidden_index' => $hiddenIndex,
        'hidden_value' => $hiddenValue
    ];
}
