<?php

function isBalanced($string): void
{
    $size = strlen($string);
    $stack = new SplStack;
    for ($i = 0; $i < $size; $i++) {
        if ($string[$i] == '(' || $string[$i] == '[' || $string[$i] == '{') {
            $stack->push($string[$i]);
        } else {
            if ($string[$i] == ')' && $stack->top() == '(') {
                $stack->pop();
            } else if ($string[$i] == '}' && $stack->top() == '{') {
                $stack->pop();
            } else if ($string[$i] == ']' && $stack->top() == '[') {
                $stack->pop();
            } else {
                echo "Parenthesis are Unbalanced <br/>\n";
                return;
            }
        }
    }
    if (!$stack->isEmpty()) {
        echo "Parenthesis are Unbalanced <br/>\n";
        return;
    } else {
        echo "Parenthesis are Balanced <br/>\n";
        return;
    }
}

$exp1 = "[()]{}{[()()]()}";
isBalanced($exp1);
$exp2 = "[(])";
isBalanced($exp2);
