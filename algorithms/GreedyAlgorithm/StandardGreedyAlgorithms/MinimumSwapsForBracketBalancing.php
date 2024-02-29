<?php

function swapCount($s): int
{
    $countLeft = 0;
    $countRight = 0;
    $imbalance = 0;
    $swap = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] == '[') {
            $countLeft++;
            if ($imbalance > 0) {
                $swap += $imbalance;
                $imbalance--;
            }
        } else if ($s[$i] == ']') {
            $countRight++;
            $imbalance = ($countRight - $countLeft);
        }
    }
    return $swap;
}

$s = "[]][][";
echo swapCount($s) . "<br/>";
