<?php

$notes = [ 2000, 500, 200, 100, 50, 20, 10, 5, 1 ];

function countCurrency($amount){
    global $notes;
    $noteCounter = array_fill(0,9,0);

    for($i = 0; $i < 9; $i++){
        if($amount >= $notes[$i]){
            $noteCounter[$i] = (int)($amount / $notes[$i]);
            $amount = $amount % $notes[$i];
        }
    }

    echo "Currency Count ->" . "<br/>";
    for ($i = 0; $i < 9; $i++) {
        if ($noteCounter[$i] != 0) {
            echo $notes[$i] . " : " . $noteCounter[$i] . "<br/>";
        }
    }
}

$amount = 868;
countCurrency($amount);