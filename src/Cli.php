<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function isEven($num)
{
    return $num % 2 === 0;
}

function run($game)
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no"');
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $tries = 0;
    while ($tries < 3) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $game();
        line("Question: %s", $question);
        $answer = prompt('Your answer: ');
        if ($answer === $correctAnswer) {
            line('Correct!');
            $tries += 1;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}");
}

function evenGame()
{
    $genData = function () {
        $randomNumber = rand(1, 100);
        $correctAnswer = isEven($randomNumber) ? 'yes' : 'no';
        return [ 'question' => $randomNumber, 'correctAnswer' => $correctAnswer ];
    };

    return run($genData);
}
