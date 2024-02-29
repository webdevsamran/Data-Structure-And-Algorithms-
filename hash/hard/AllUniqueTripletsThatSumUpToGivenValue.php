<?php

class Triplet{
    public $first;
    public $second;
    public $third;
}

function findTriplets($nums,$n,$sum){
    $triplets = array();
    $uniqueTriplets = array();
    sort($nums);
    for($i = 0; $i < $n - 2; $i++){
        $j = $i + 1;
        $k = $n - 1;
        while($j < $k){
            if($nums[$i] + $nums[$j] + $nums[$k] == $sum){
                $temp = $nums[$i] . ":" . $nums[$j] . ":" . $nums[$k];
                if(!in_array($temp,$uniqueTriplets)){
                    $triplet = new Triplet;
                    $triplet->first = $nums[$i];
                    $triplet->second = $nums[$j];
                    $triplet->third = $nums[$k];
                    array_push($uniqueTriplets,$triplet);
                }
                $j++;
                $k--;
            }else if($nums[$i] + $nums[$j] + $nums[$k] > $sum){
                $k--;
            }else{
                $j++;
            }
        }
    }
    if(sizeof($uniqueTriplets) == 0){
        echo "Nothing Unique";
        return;
    }
    echo "<pre>";
    print_r($uniqueTriplets);
    return true;
}

$nums = [ 12, 3, 6, 1, 6, 9 ];
$n = sizeof($nums);
$sum = 24;

if (!findTriplets($nums, $n, $sum))
    echo "No triplets can be formed.";