<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function greeting()
{
    line("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello {$name}");
}

function run($game, $description)
{
    line('Welcome to the Brain Game!');
    line("{$description}\n");
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
