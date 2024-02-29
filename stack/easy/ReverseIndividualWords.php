<?php

function reverseWords($string): void
{
    $stack = new SplStack;
    $size = strlen($string);
    for ($i = 0; $i < $size; $i++) {
        if ($string[$i] != ' ') {
            $stack->push($string[$i]);
        } else {
            while (!$stack->isEmpty()) {
                echo $stack->pop();
            }
            echo " ";
        }
    }
    while (!$stack->isEmpty()) {
        echo $stack->pop();
    }
}

$string = "Hello World";
reverseWords($string);
