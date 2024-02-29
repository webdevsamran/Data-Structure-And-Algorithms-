<?php

function isDivisibleBy7($num){
    if($num < 0){
        return isDivisibleBy7(-$num);
    }
    if($num == 0 || $num == 7){
        return 1;
    }
    if($num < 10){
        return 0;
    }
    return isDivisibleBy7((int)($num / 10) - 2 * ($num - (int)($num / 10) * 10 ));
}

$num = 616;
if(isDivisibleBy7($num))
    echo "Divisible";
else
    echo "Not Divisible";