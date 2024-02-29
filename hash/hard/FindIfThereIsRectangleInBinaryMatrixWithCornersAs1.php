<?php

function isRectangle($mat){
    $rows = sizeof($mat);
    if($rows == 0){
        return false;
    }
    $columns = sizeof($mat[0]);
    $table = array();
    for($i = 0; $i < $rows; $i++){
        for($j = 0; $j < $columns; $j++){
            for($k = $j+1; $k < $columns; $k++){
                if($mat[$i][$j] == 1 && $mat[$i][$k] == 1){
                    if(array_key_exists($j,$table) && in_array($k,$table[$j])){
                        return true;
                    }
                    $table[$j][] = $k;
                }
            }
        }
    }
    return false;
}

$mat = [ 
    [ 1, 0, 0, 1, 0 ],
    [ 0, 1, 1, 1, 1 ],
    [ 0, 0, 0, 1, 0 ],
    [ 1, 1, 1, 1, 0 ]
];
if (isRectangle($mat))
    echo "Yes";
else
    echo "No";