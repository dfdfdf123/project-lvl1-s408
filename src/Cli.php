<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const MAX_ATTEMPTS = 3;

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
    for ($i = 0; $i < MAX_ATTEMPTS; $i += 1) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $game();
        line("Question: %s", $question);
        $answer = prompt('Your answer: ');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}");
}
