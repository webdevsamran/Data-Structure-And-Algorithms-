<?php

$temp = array();
$temp[0] = '';
function countDistinctSubsequence(array $input, string $output, array &$temp): void
{
    if (empty($input)) {
        if (!in_array($output, $temp)) {
            array_push($temp, $output);
        }
        return;
    }
    $first_el = $input[0];
    unset($input[0]);
    $input = array_values($input);
    countDistinctSubsequence($input, $output . $first_el, $temp);
    countDistinctSubsequence($input, $output, $temp);
}

$input = str_split("ggg");
$output = "";
countDistinctSubsequence($input, $output, $temp);
echo sizeof($temp);
