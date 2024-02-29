<?php

function populateResultUtil($key,$mngrMap,&$result){
    $count = 0;
    if(!array_key_exists($key,$mngrMap)){
        return;
    }else{
        $list = $mngrMap[$key];
        $count = sizeof($list);
        for($i = 0; $i < $count; $i++){
            $count += populateResultUtil($list[$i],$mngrMap,$result);
        }
        $result[$key] = $count;
    }
    return $count;
}

function populateResult($dataset){
    $result = array();
    $mngrMap = array();

    foreach($dataset as $emp => $mng){
        if($emp != $mng){
            $mngrMap[$mng][] = $emp;
        }
    }
    foreach($dataset as $emp => $val){
        populateResultUtil($emp,$mngrMap,$result);
    }

    echo "<pre>";
    print_r($result);
}

$dataset = array();
$dataset["A"] = "C";
$dataset["B"] = "C";
$dataset["C"] = "F";
$dataset["D"] = "E";
$dataset["E"] = "F";
$dataset["F"] = "F";

populateResult($dataset);