<?php

function precedence($operator): int
{
    switch ($operator) {
        case '+':
        case '-':
            return 1;
            break;
        case '*':
        case '/':
            return 2;
            break;
        case '^':
            return 3;
            break;
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

$infix = "a+b*(c^d-e)^(f+g*h)-i";
echo infixToPostFix($infix);
