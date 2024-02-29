<?php

function is_valid_ip($str){
    $n = strlen($str);
    if($n < 7){
        return false;
    }
    $v = array();
    $arr = explode('.',$str);
    foreach($arr as $val){
        array_push($v,$val);
    }
    if(sizeof($v) != 4){
        return false;
    }
    echo "<pre>";
    print_r($arr);
    for($i = 0; $i < sizeof($v); $i++){
        $temp = str_split($v[$i]);
        if(sizeof($temp) > 1){
            if($temp[0] == 0){
                return false;
            }
        }
        for($j = 0; $j < sizeof($temp); $j++){
            if(!is_numeric($temp[$j])){
                return false;
            }
        }
        if((int)implode('',$temp) > 255){
            return false;
        }
    }
    return true;
}

$s1 = "128.0.0.1";
$s2 = "125.16.100.1";
$s3 = "125.512.100.1";
$s4 = "125.512.100.abc";
echo is_valid_ip($s1) ? "Valid<br/>" : "Not valid<br/>";
echo is_valid_ip($s2) ? "Valid<br/>" : "Not valid<br/>";
echo is_valid_ip($s3) ? "Valid<br/>" : "Not valid<br/>";
echo is_valid_ip($s4) ? "Valid<br/>" : "Not valid<br/>";