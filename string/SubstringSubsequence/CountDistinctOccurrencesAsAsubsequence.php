<?php

$temp = array();
function countDistinctOccurences(array $input, string $output, array &$temp): void
{
    if (empty($input)) {
        array_push($temp, $output);
        return;
    }
    $first_el = $input[0];
    unset($input[0]);
    $input = array_values($input);
    countDistinctOccurences($input, $output . $first_el, $temp);
    countDistinctOccurences($input, $output, $temp);
}

$input = str_split("banana");
$pattern = "ban";
$output = "";
countDistinctOccurences($input, $output, $temp);
$count = 0;
echo "<pre>";
print_r($temp);
foreach ($temp as $val) {
    if ($val == $pattern) {
        $count++;
    }
}
echo $count;
