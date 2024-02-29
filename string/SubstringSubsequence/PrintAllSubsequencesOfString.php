<?php

function printSubsequence(array $input, string $output): void
{
    if (empty($input)) {
        echo $output . "<br/>";
        return;
    }
    $first_el = $input[0];
    unset($input[0]);
    $input = array_values($input);
    printSubsequence($input, $output . $first_el);
    printSubsequence($input, $output);
}

$input = str_split("abcd");
$output = "";
printSubsequence($input, $output);
