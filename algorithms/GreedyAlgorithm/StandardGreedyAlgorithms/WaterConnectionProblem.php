<?php

$number_of_houses = 9;
$number_of_pipes = 6;
$ans = NULL;

$starting_vertex_of_pipes = array_fill(0, 1000, 0);
$ending_vertex_of_pipes = array_fill(0, 1000, 0);
$diameter_between_two_pipes = array_fill(0, 1000, 0);

$a = array();
$b = array();
$c = array();

function dfs($w): int
{
    global $starting_vertex_of_pipes;
    global $diameter_between_two_pipes;
    global $ans;

    if ($starting_vertex_of_pipes[$w] == 0) {
        return $w;
    } else if ($diameter_between_two_pipes[$w] < $ans) {
        $ans = $diameter_between_two_pipes[$w];
    }
    return dfs($starting_vertex_of_pipes[$w]);
}

function solve($arr): void
{
    global $number_of_houses;
    global $number_of_pipes;
    global $ans;

    for ($i = 0; $i < $number_of_pipes; $i++) {
        $h1 = $arr[$i][0];
        $h2 = $arr[$i][1];
        $d = $arr[$i][2];

        $starting_vertex_of_pipes[$h1] = $h2;
        $ending_vertex_of_pipes[$h2] = $h1;
        $diameter_between_two_pipes[$h1] = $d;
    }

    $a = array();
    $b = array();
    $c = array();

    for ($j = 1; $j < $number_of_houses; ++$j) {
        if ($ending_vertex_of_pipes[$j] == 0 && $starting_vertex_of_pipes) {
            $ans = 1000000000;
            $w = dfs($j);
            $a[] = $j;
            $b[] = $w;
            $c[] = $ans;
        }
    }
    echo sizeof($a) . "<br/>";
    for ($i = 0; $i < sizeof($a); $i++) {
        echo $a[$i] . " " . $b[$i] . " " . $c[$i] . "<br/>";
    }
}

$arr = [
    [7, 4, 98],
    [5, 9, 72],
    [4, 6, 10],
    [2, 8, 22],
    [9, 7, 17],
    [3, 1, 66]
];

solve($arr);
