<?php

namespace BrainGames\Games\Calc;

use function \BrainGames\Cli\run;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function getRandomOperator($operators)
{
    return $operators[rand(0, count($operators) - 1)];
}

function calcGame()
{
    $genData = function () {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operator = getRandomOperator(OPERATORS);
        $question = "{$firstNumber} {$operator} {$secondNumber}";
        switch ($operator) {
            case '+':
                $correctAnswer = $firstNumber + $secondNumber;
                break;
            case '-':
                $correctAnswer = $firstNumber - $secondNumber;
                break;
            case '*':
                $correctAnswer = $firstNumber * $secondNumber;
                break;
        }
        return [ 'question' => $question, 'correctAnswer' => "{$correctAnswer}" ];
    };
    return run($genData, DESCRIPTION);
}
