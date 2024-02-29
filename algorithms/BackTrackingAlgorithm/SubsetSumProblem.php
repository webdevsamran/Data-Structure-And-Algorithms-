<?php

$total_nodes = 0;

function printSubset($A, $size)
{
    for ($i = 0; $i < $size; $i++) {
        echo " " . $A[$i];
    }
    echo "<br/>";
}

function comparator($a, $b)
{
    return $a > $b;
}

function subset_sum($s, &$tuplet, $s_size, $t_size, $sum, $ite, $target)
{
    global $total_nodes;
    $total_nodes++;

    if ($target == $sum) {
        printSubset($tuplet, $t_size);
        if ($ite + 1 < $s_size && $sum - $s[$ite] + $s[$ite + 1] <= $target) {
            subset_sum($s, $tuplet, $s_size, $t_size - 1, $sum - $s[$ite], $ite + 1, $target);
        }
        return;
    } else {
        if ($ite < $s_size && $sum + $s[$ite] <= $target) {
            for ($i = $ite; $i < $s_size; $i++) {
                $tuplet[$t_size] = $s[$i];
                if ($sum + $s[$i] <= $target) {
                    subset_sum($s, $tuplet, $s_size, $t_size + 1, $sum + $s[$i], $i + 1, $target);
                }
            }
        }
    }
}

function generateSubsets($s, $size, $target)
{
    $tuplet = array();
    $total = 0;
    usort($s, 'comparator');

    for ($i = 0; $i < $size; $i++) {
        $total += $s[$i];
    }

    if ($s[0] <= $target && $total >= $target) {
        subset_sum($s, $tuplet, $size, 0, 0, 0, $target);
    }
}

$weights = [15, 22, 14, 26, 32, 9, 16, 8];
$target = 53;
$size = sizeof($weights);
generateSubsets($weights, $size, $target);
echo "Nodes generated " . $total_nodes;
