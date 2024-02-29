<?php

function printMaxActivities($start, $finish, $size): void
{
    echo "Following Activites are Selected: " . $start[0] . " ";
    $j = 0;
    for ($i = 1; $i < $size; $i++) {
        if ($start[$i] >= $finish[$j]) {
            echo $start[$i] . " ";
            $j = $i;
        }
    }
    echo "<br/>";
}

$s = [1, 3, 0, 5, 8, 5];
$f = [2, 4, 6, 7, 9, 9];
$n = sizeof($s);

// Function call
printMaxActivities($s, $f, $n);
