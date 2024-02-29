<?php

$a = str_split("1235421415454545454545454544");
$b = str_split("1714546546546545454544548544544545");
if ($a == "0" || $b == "0"){
    echo 0 . "<br/>";
    return 0;
}
$m = sizeof($a) - 1;
$n = sizeof($b) - 1;
$carry = 0;
$product;
for ($i=0; $i <= $m + $n || $carry; ++$i) {
    for ($j=max(0, $i - $n); $j<=min($i, $m); ++$j)
        $carry += ($a[$m - $j]) * ($b[$n - $i + $j]);
    $product .= $carry % 10;
    $carry /= 10;
}
strrev($product);
echo "The Product is: " . $product;