<?php

function reverseString($string): void
{
    $stack = new SplStack;
    $size = strlen($string);
    for ($i = 0; $i < $size; $i++) {
        $stack->push($string[$i]);
    }
    while (!$stack->isEmpty()) {
        echo $stack->pop();
    }
}

$string = "MuhammadSamranAsif";
reverseString($string);
