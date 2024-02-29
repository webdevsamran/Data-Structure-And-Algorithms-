<?php

function printItinerary($dataSet){
    $rmap = array();
    foreach($dataSet as $key => $val){
        $rmap[$val] = $key;
    }
    $start = '';
    foreach($dataSet as $key => $val){
        if(!array_key_exists($key,$rmap)){
            $start = $key;
            break;
        }
    }
    if(empty($start)){
        echo "NULL";
        return;
    }
    $it = $dataSet[$start];
    while($it){
        echo $start . " -> ". $it . " ";
        $start = $it;
        $it = $dataSet[$start];
    }
}

$dataSet = array();
$dataSet["Chennai"] = "Banglore";
$dataSet["Bombay"] = "Delhi";
$dataSet["Goa"] = "Chennai";
$dataSet["Delhi"] = "Goa";

printItinerary($dataSet);