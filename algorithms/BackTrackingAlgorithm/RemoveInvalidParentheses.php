<?php

function isParenthesis($char){
    return ($char == '(' || $char == ')');
}

function isValidStr($str){
    $cnt = 0;
    for($i = 0; $i < strlen($str); $i++){
        if($str[$i] == '('){
            $cnt++;
        }else if($str[$i] == ')'){
            $cnt--;
        }
        if($cnt < 0){
            return false;
        }
    }
    return $cnt == 0;
}

function removeInvalidParenthesis($expression){
    if(empty($expression)){
        return;
    }
    $visit = array();
    $queue = new SplQueue;
    $level = NULL;
    array_push($visit,$expression);
    $queue->enqueue($expression);

    while(!$queue->isEmpty()){
        $str = $queue->dequeue();
        if(isValidStr($str)){
            echo $str."<br/>";
            $level = true;
        }
        if($level){
            continue;
        }
        for($i = 0; $i < strlen($str); $i++){
            if(!isParenthesis($str[$i])){
                continue;
            }
            $temp = substr($str,0,$i) . substr($str,$i+1);
            if(!in_array($temp,$visit)){
                $queue->enqueue($temp);
                array_push($visit,$temp);
            }
        }
    }

    // echo "<pre>";
    // print_r($visit);
}

$expression = "()())()";
removeInvalidParenthesis($expression);

$expression = "()v)";
removeInvalidParenthesis($expression);