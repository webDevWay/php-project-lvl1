<?php

namespace BrainGames\BrainProgression;

//-- Генерируем прогрессию
function generateProgression(int $length = 10, int $minStep = 2, int $maxStep = 5, int $minStart = 1, int $maxStart = 20): array
{
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
