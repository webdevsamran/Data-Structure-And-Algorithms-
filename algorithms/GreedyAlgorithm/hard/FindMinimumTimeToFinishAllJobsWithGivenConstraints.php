<?php

function getMax($job,$n){
    $result = $job[0];
    for($i = 1; $i < $n; $i++){
        if($job[$i] > $result){
            $result = $job[$i];
        }
    }
    return $result;
}

function isPossible($time,$k,$job,$n){
    $cnt = 1;
    $curr_time = 0; 
    for ($i = 0; $i < $n;)
    {
        if ($curr_time + $job[$i] > $time) {
            $curr_time = 0;
            $cnt++;
        } else {
            $curr_time += $job[$i];
            $i++;
        }
    }
    return ($cnt <= $k);
}

function findMinTime($k,$t,$job,$n){
    $start = 0;
    $end = 0;
    for($i = 0; $i < $n; $i++){
        $end += $job[$i];
    }
    $ans = $end;
    $job_max = getMax($job,$n);
    while($start <= $end){
        $mid = (int)(($start+$end)/2);
        if($mid >= $job_max && isPossible($mid,$k,$job,$n)){
            $ans = min($ans,$mid);
            $end = $mid - 1;
        }else{
            $start = $mid + 1;
        }
    }
    return ($ans * $t);
}

$job =  [10, 7, 8, 12, 6, 8];
$n = sizeof($job);
$k = 4;
$T = 5;
echo findMinTime($k, $T, $job, $n);