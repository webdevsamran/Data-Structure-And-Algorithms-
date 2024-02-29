<?php

function shortestChainLen($start, $target, $D){
    if($start == $target){
        return 0;
    }
    if(!in_array($target,$D)){
        return 0;
    }
    $level = 0;
    $wordLength = strlen($start);
    $queue = new SplQueue;
    $queue->enqueue($start);
    while(!$queue->isEmpty()){
        ++$level;
        $size = $queue->count();
        for($i = 0; $i < $size; $i++){
            $word = $queue->dequeue();
            for($pos = 0; $pos < $wordLength; $pos++){
                $org_char = $word[$pos];
                for($c = ord('a'); $i <= ord('z'); $i++){
                    $word[$pos] = chr($c);
                    if($word == $target){
                        return $level + 1;
                    }
                    if(in_array($word,$D)){
                        unset($D[array_keys($D,$word)]);
                        $queue->enqueue($word);
                        break;
                    }
                }
                $word[$pos] = $org_char;
            }
        }
    }
    return 0;
}

$D = array();
array_push($D,"poon");
array_push($D,"plee");
array_push($D,"same");
array_push($D,"poie");
array_push($D,"plie");
array_push($D,"poin");
array_push($D,"plea");
$start = "toon";
$target = "plea";
echo "Length of shortest chain is: " . shortestChainLen($start, $target, $D);