<?php

function checkSparse($n){
    if($n & ($n >> 1)){
        return 0;
    }
    return 1;
}

echo checkSparse(72) . "<br/>";
echo checkSparse(12) . "<br/>";
echo checkSparse(2) . "<br/>";
echo checkSparse(3) . "<br/>";