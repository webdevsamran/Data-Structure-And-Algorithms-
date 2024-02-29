<?php

function egyptianFraction($numerator, $denominator): void
{
    if ($numerator == 0 || $denominator == 0) {
        return;
    }
    if ($denominator % $numerator == 0) {
        echo "1/" . (int)($denominator / $numerator);
        return;
    }
    if ($numerator % $denominator == 0) {
        echo (int)($numerator / $denominator);
        return;
    }
    if ($numerator > $denominator) {
        echo (int)($numerator / $denominator) / " + ";
        egyptianFraction($numerator % $denominator, $denominator);
        return;
    }
    $x = (int)($denominator / $numerator) + 1;
    echo "1/" . $x . " + ";
    egyptianFraction($numerator * $x - $denominator, $denominator * $x);
}

$numerator = 6;
$denominator = 14;
echo "Egyptian Fraction representation of " . $numerator . "/" . $denominator . " is <br/>";
egyptianFraction($numerator, $denominator);
