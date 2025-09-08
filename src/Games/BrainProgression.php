<?php

namespace BrainGames\BrainProgression;

//-- Генерируем прогрессию
function generateProgression($length = 10, $minStep = 2, $maxStep = 5, $minStart = 1, $maxStart = 20)
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
function hideElement($progression)
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
