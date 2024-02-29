<?php

function isOperator($operator): int
{
    return ($operator == '+' || $operator == '-' || $operator == '*' || $operator == '/' || $operator == '^');
}

function postFixToInfix($string): string
{
    $size = strlen($string);
    $infix = NULL;
    $stack = new SplStack;
    for ($i = 0; $i < $size; $i++) {
        if (ctype_alnum($string[$i])) {
            $stack->push($string[$i]);
        } else if (isOperator($string[$i])) {
            $st1 = $stack->pop();
            $st2 = $stack->pop();
            $temp = "(" . $st1 . $string[$i] . $st2 . ")";
            $stack->push($temp);
        }
    }
    while (!$stack->isEmpty()) {
        $infix .= $stack->pop();
    }
    $infix = strrev($infix);
    for ($i = 0; $i < strlen($infix); $i++) {
        if ($infix[$i] == '(') {
            $infix[$i] = ')';
        } else if ($infix[$i] == ')') {
            $infix[$i] = '(';
        }
    }
    return $infix;
}

$postfix = "abc++";
echo postFixToInfix($postfix);
