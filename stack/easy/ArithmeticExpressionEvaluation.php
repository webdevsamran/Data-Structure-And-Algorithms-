<?php

function precedence($operator): int
{
    switch ($operator) {
        case '+':
        case '-':
            return 1;
        case '*':
        case '/':
            return 2;
        case '^':
            return 3;
        default:
            return -1;
    }
}

function isOperator($operator): int
{
    return ($operator == '+' || $operator == '-' || $operator == '*' || $operator == '/' || $operator == '^');
}

function infixToPostFix($string): string
{
    $string = "(" . $string . ")";
    $stack = new SplStack;
    $postfix = NULL;
    $size = strlen($string);
    for ($i = 0; $i < $size; $i++) {
        if ($string[$i] == ' ') {
            continue;
        } else if ($string[$i] == '(') {
            $stack->push($string[$i]);
        } else if ($string[$i] == ')') {
            while (!$stack->isEmpty() && $stack->top() != '(') {
                $postfix .= $stack->pop();
            }
            $stack->pop();
        } else if (isOperator($string[$i])) {
            while (!$stack->isEmpty() && precedence($string[$i]) <= precedence($stack->top())) {
                $postfix .= $stack->pop();
            }
            $stack->push($string[$i]);
        } else if (ctype_alnum($string[$i])) {
            $postfix .= $string[$i];
        }
    }
    while (!$stack->isEmpty()) {
        if ($stack->top() == '(') {
            return "Expression is Wrong";
        }
        $postfix .= $stack->pop();
    }
    return $postfix;
}

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

function expEvalution($string): string
{
    $postFix = infixToPostFix($string);
    echo $postFix . "<br/>\n";
    $stack = new SplStack;
    $result = 0;
    $size = strlen($postFix);
    for ($i = 0; $i < $size; $i++) {
        echo $postFix[$i] . "<br/>\n";
        if (ctype_alnum($postFix[$i])) {
            $stack->push($postFix[$i]);
        } else if (isOperator($postFix[$i])) {
            $op1 = $stack->pop();
            $op2 = $stack->pop();
            $temp = solve($op1, $op2, $postFix[$i]);
            $stack->push($temp);
        }
    }
    while (!$stack->isEmpty()) {
        $result .= $stack->pop();
    }
    return ltrim($result, '\0');
}

$infix = "(2+4) * (4+6)";
echo expEvalution($infix);
