<?php

function solve($a, $b, $operator)
{
    switch ($operator) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            return $a / $b;
        case '^':
            return pow($a, $b);
        default:
            return 0;
    }
}

function isOperator($operator): int
{
    return ($operator == '+' || $operator == '-' || $operator == '*' || $operator == '/' || $operator == '^');
}

function expEvalution($string): string
{
    $stack = new SplStack;
    $result = 0;
    $size = strlen($string);
    for ($i = 0; $i < $size; $i++) {
        if (ctype_alnum($string[$i])) {
            $stack->push($string[$i]);
        } else if (isOperator($string[$i])) {
            $op1 = $stack->pop();
            $op2 = $stack->pop();
            $temp = solve($op2, $op1, $string[$i]);
            $stack->push($temp);
        }
    }
    while (!$stack->isEmpty()) {
        $result .= $stack->pop();
    }
    return ltrim($result, '\0');
}

$infix = "2 3 1 * + 9 -";
echo expEvalution($infix);
