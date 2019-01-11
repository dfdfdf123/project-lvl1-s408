<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\Cli\run;

const DESCRIPTION = 'What number is missing in the progression?';
const MAX_LENGTH = 10;

function generateProgression($start, $step)
{
    $result = [];
    for ($i = 0; $i < MAX_LENGTH; $i += 1) {
        $result[] = $start + $step * $i;
    }

    return $result;
}

function progressionGame()
{
    $generateData = function () {
        $start = rand(1, 10);
        $step = rand(1, 10);
        $progression = generateProgression($start, $step);
        $copyProgression = array_slice($progression, 0);
        $hiddenElementPosition = rand(0, count($progression) - 1);
        $copyProgression[$hiddenElementPosition] = '..';
        $question = implode(' ', $copyProgression);
        $correctAnswer = $progression[$hiddenElementPosition];
        return [ 'question' => $question, 'correctAnswer' => "{$correctAnswer}" ];
    };

    return run($generateData, DESCRIPTION);
}
