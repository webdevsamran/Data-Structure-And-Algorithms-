<?php

function isOperator($operator): int
{
    return ($operator == '+' || $operator == '-' || $operator == '*' || $operator == '/' || $operator == '^');
}

function prefixToInfix($string): string
{
    $size = strlen($string);
    $infix = NULL;
    $stack = new SplStack;
    for ($i = $size - 1; $i >= 0; $i--) {
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
    return $infix;
}

$prefix = "*+AB-CD";
echo prefixToInfix($prefix);
