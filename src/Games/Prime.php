<?php

namespace BrainGames\Games\Prime;

use function \BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function primeGame()
{
    $generateData = function () {
        $randomNumber = rand(1, 100);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        return [ 'question' => $randomNumber, 'correctAnswer' => $correctAnswer ];
    };

    return run($generateData, DESCRIPTION);
}
