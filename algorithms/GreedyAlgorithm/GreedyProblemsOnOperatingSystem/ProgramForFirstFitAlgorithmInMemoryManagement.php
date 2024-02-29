<?php

function firstFit($blockSize, $m, $processSize, $n): void
{
    $allocation = array_fill(0, $n, -1);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($blockSize[$j] >= $processSize[$i]) {
                $allocation[$i] = $j;
                $blockSize[$j] -= $processSize[$i];
                break;
            }
        }
    }
    echo "<br/>Process No.\tProcess Size\tBlock no.<br/>";
    for ($i = 0; $i < $n; $i++) {
        echo " " . $i + 1 . "\t\t" . $processSize[$i] . "\t\t";
        if ($allocation[$i] != -1)
            echo $allocation[$i] + 1;
        else
            echo "Not Allocated";
        echo "<br/>";
    }
}

$blockSize = [100, 500, 200, 300, 600];
$processSize = [212, 417, 112, 426];
$m = sizeof($blockSize);
$n = sizeof($processSize);

firstFit($blockSize, $m, $processSize, $n);
