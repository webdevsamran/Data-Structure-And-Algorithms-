<?php
error_reporting(0);

function PrintMinNumberForPattern($str){
    $len = strlen($str);
    $curr_max = 0;
    $last_entry = 0;

    for($i = 0; $i < $len; $i++){
        $noOfNextD = 0;
        switch($str[$i]){
            case 'I':
                $j = $i +1;
                while($str[$j] == 'D' && $j < $len){
                    $noOfNextD++;
                    $j++;
                }
                if($i == 0){
                    $curr_max = $noOfNextD + 2;
                    echo " ".++$last_entry;
                    echo " ".$curr_max;

                    $last_entry = $curr_max;
                }else{
                    $curr_max = $curr_max + $noOfNextD + 1;
                    $last_entry = $curr_max;
                    echo " ". $last_entry;
                }
                for($k = 0; $k < $noOfNextD; $k++){
                    echo " ". --$last_entry;
                    $i++;
                }
                break;
            case 'D':
                if($i == 0){
                    $j = $i + 1;
                    while($str[$j] == 'D' && $j < $len){
                        $noOfNextD++;
                        $j++;
                    }
                    $curr_max = $noOfNextD + 2;
                    echo " " . $curr_max . " " . $curr_max - 1;
                    $last_entry = $curr_max - 1;
                }else{
                    echo " " . $last_entry - 1;
                    $last_entry--;
                }
                break;
        }
    }
    echo "<br/>";
}

PrintMinNumberForPattern("IDID");
PrintMinNumberForPattern("I");
PrintMinNumberForPattern("DD");
PrintMinNumberForPattern("II");
PrintMinNumberForPattern("DIDI");
PrintMinNumberForPattern("IIDDD");
PrintMinNumberForPattern("DDIDDIID");