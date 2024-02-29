<?php

function minRotation($input,$unlock_code){
    $rotation = 0;
    $inputDigit = 0;
    $unlockDigit = 0;

    while($input || $unlock_code){
        $inputDigit = $input % 10;
        $unlockDigit = $unlock_code % 10;
        $rotation += min(abs($inputDigit - $unlockDigit), 10 - abs($inputDigit - $unlockDigit));
        $input /= 10;
        $unlock_code /= 10;
    }

    return $rotation;
}

$input = 28756;
$unlock_code = 98234;
echo "Minimum Rotation = " . minRotation($input, $unlock_code);