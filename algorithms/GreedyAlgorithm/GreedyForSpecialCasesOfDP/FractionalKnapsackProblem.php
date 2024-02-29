<?php

class Item
{
    public $profit;
    public $weight;

    function __construct($_profit, $_weight)
    {
        $this->profit = $_profit;
        $this->weight = $_weight;
    }
}

function cmp($a, $b)
{
    $r1 = (int)($a->profit / $a->weight);
    $r2 = (int)($b->profit / $b->weight);
    return $r2 > $r1;
}

function fractionalKnapsack($weight, $arr, $size): int
{
    usort($arr, "cmp");
    $final_val = 0;
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i]->weight <= $weight) {
            $weight -= $arr[$i]->weight;
            $final_val += $arr[$i]->profit;
        } else {
            $final_val += $arr[$i]->profit * ((float)$weight / (float)$arr[$i]->weight);
            break;
        }
    }
    return $final_val;
}

$W = 50;
$arr = [new Item(60, 10), new Item(100, 20), new Item(120, 30)];
$size = sizeof($arr);
echo fractionalKnapsack($W, $arr, $size);
