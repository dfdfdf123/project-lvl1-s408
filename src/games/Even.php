<?php

namespace BrainGames\Games\Even;

use function \BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no"';

function isEven($num)
{
    return $num % 2 === 0;
}

function evenGame()
{
    $generateData = function () {
        $randomNumber = rand(1, 100);
        $correctAnswer = isEven($randomNumber) ? 'yes' : 'no';
        return [ 'question' => $randomNumber, 'correctAnswer' => $correctAnswer ];
    };

    return run($generateData, DESCRIPTION);
}
