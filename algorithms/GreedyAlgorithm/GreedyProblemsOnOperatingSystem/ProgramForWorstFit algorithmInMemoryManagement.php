<?php

function bestFit($blockSize, $m, $processSize, $n): void
{
    $allocation = array_fill(0, $n, -1);
    for ($i = 0; $i < $n; $i++) {
        $best_ind = -1;
        for ($j = 0; $j < $m; $j++) {
            if ($blockSize[$j] >= $processSize[$i]) {
                if ($best_ind == -1) {
                    $best_ind = $j;
                } else if ($blockSize[$best_ind] < $blockSize[$j]) {
                    $best_ind = $j;
                }
            }
        }
        if ($best_ind != -1) {
            $allocation[$i] = $best_ind;
            $blockSize[$best_ind] -= $processSize[$i];
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

bestFit($blockSize, $m, $processSize, $n);
