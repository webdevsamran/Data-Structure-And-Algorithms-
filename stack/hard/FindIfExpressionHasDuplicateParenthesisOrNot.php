<?php

function findDuplicateparenthesis($str){
    $stack = new SplStack;
    $str = str_split($str);
    foreach($str as $chr){
        if($chr == ')'){
            $top = $stack->pop();
            $ele_inside = 0;
            while($top != '('){
                $ele_inside++;
                $top = $stack->pop();
            }
            if($ele_inside < 1){
                return 1;
            }
        }else{
            $stack->push($chr);
        }
    }
    return false;
}

$str = "(((a+(b))+(c+d)))";
if (findDuplicateparenthesis($str))
    echo "Duplicate Found";
else
    echo "No Duplicates Found";