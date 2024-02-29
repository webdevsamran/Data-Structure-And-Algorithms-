<?php

$numRay = [ 0, 4, 3, 2, 7, 8, 2, 3, 1 ];
$size = sizeof($numRay);
echo $size;

for($i = 0; $i < $size; $i++){
    $numRay[$numRay[$i] % $size] = $numRay[$numRay[$i] % $size] + $size;
}

echo "<pre>";
print_r($numRay);

for($i = 0; $i < $size; $i++){
    if($numRay[$i] >= $size * 2){
        echo $i . " ";
    }
}
