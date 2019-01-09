<?php

namespace BrainGames\Games\Gcd;

use function \BrainGames\Cli\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGreatestCommonDivisor($x, $y)
{
    if ($y) {
        return getGreatestCommonDivisor($y, $x % $y);
    }

    return $x;
}

function gcdGame()
{
    $genData = function () {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $question = "{$firstNumber} {$secondNumber}";
        $correctAnswer = getGreatestCommonDivisor($firstNumber, $secondNumber);
        return [ 'question' => $question, 'correctAnswer' => "{$correctAnswer}" ];
    };

    return run($genData, DESCRIPTION);
}
