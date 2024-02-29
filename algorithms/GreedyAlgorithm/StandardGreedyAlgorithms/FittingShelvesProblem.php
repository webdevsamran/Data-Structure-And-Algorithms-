<?php

function minSpacePreferLarge($wall, $m, $n): void
{
    $p = (int)($wall / $m);
    $q = 0;
    $rem = (int)($wall % $m);

    $num_m = $p;
    $num_n = $q;
    $min_empty = $rem;

    while ($wall >= $n) {
        $q += 1;
        $wall = $wall - $n;

        $p = (int)($wall / $m);
        $rem = (int)($wall % $m);

        if ($min_empty >= $rem) {
            $min_empty = $rem;
            $num_m = $p;
            $num_n = $q;
        }
    }
    echo $num_m . " " . $num_n . " " . $min_empty . "<br/>";
}

$wall = 29;
$m = 3;
$n = 9;
minSpacePreferLarge($wall, $m, $n);
