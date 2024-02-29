<?php

function minMaxLengthWords($input,&$minWord,&$maxWord){
    $len = strlen($input);
    $si = $ei = 0;
    $min_len = $len;
    $min_start_index = 0;
    $max_len = 0;
    $max_start_index = 0;

    while($ei <= $len){
        if($ei < $len && $input[$ei] != ' '){
            $ei++;
        }else{
            $curr_len = $ei - $si;
            if($curr_len < $min_len){
                $min_len = $curr_len;
                $min_start_index = $si;
            }
            if($curr_len > $max_len){
                $max_len = $curr_len;
                $max_start_index = $si;
            }
            $ei++;
            $si = $ei;
        }
    }

    $minWord = substr($input,$min_start_index,$min_len);
    $maxWord = substr($input,$max_start_index,$max_len);
}

$a = "GeeksforGeeks A Computer Science portal for Geeks";
$minWord = '';
$maxWord = '';
minMaxLengthWords($a, $minWord, $maxWord);

echo "Minimum length word: " . $minWord ."<br/>";
echo  "Maximum length word: " . $maxWord ."<br/>";