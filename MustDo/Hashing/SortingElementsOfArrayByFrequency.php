<?php

function solve(&$vec){
    $map = array();
    $n = sizeof($vec);
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists($vec[$i],$map)){
            $map[$vec[$i]] = 1;
            continue;
        }
        $map[$vec[$i]]++;
    }
    class mySimpleHeap extends SplHeap{
        public function compare($a,$b){
            if($a[0] == $b[0]){
                return $b[1] - $a[1];
            }
            return $a[0] - $b[0];
        }
    }
    $heap = new mySimpleHeap;
    foreach($map as $el => $f){
        $heap->insert([$f,$el]);
    }
    echo "<pre>";
    print_r($heap);
    $vec = array();
    $ind = 0;
    while($heap->count() > 0){
        $item = $heap->extract();
        $freq = $item[0];
        $el = $item[1];
        while($freq--){
            $vec[$ind++] = $el;
        }
    }

}

$vec = [ 2, 5, 2, 8, 5, 6, 8, 8 ];
$n = sizeof($vec);
solve($vec);
print_r($vec);