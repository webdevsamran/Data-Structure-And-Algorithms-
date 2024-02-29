<?php

function isOperator($operator): int
{
    return ($operator == '+' || $operator == '-' || $operator == '*' || $operator == '/' || $operator == '^');
}

function postFixToPrefix($string): string
{
    $size = strlen($string);
    $prefix = NULL;
    $stack = new SplStack;
    for ($i = 0; $i < $size; $i++) {
        if (ctype_alnum($string[$i])) {
            $stack->push($string[$i]);
        } else if (isOperator($string[$i])) {
            $st1 = $stack->pop();
            $st2 = $stack->pop();
            $temp = $string[$i] . $st1 .  $st2;
            $stack->push($temp);
        }
    }
    while (!$stack->isEmpty()) {
        $prefix .= $stack->pop();
    }
    return $prefix;
}

$postfix = "AB+CD-*";
echo postFixToPrefix($postfix);
