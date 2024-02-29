<?php

function TOWUtil(&$arr, $n, &$curr_elements, $no_of_selected_elements, &$soln, &$min_diff, $sum, $curr_sum, $curr_position)
{
    if ($curr_position == $n)
        return;
    if (((int)($n/2) - $no_of_selected_elements) > ($n - $curr_position))
        return;
    TOWUtil($arr, $n, $curr_elements, $no_of_selected_elements, $soln, $min_diff, $sum, $curr_sum, $curr_position+1);
    $no_of_selected_elements++;
    $curr_sum = $curr_sum + $arr[$curr_position];
    $curr_elements[$curr_position] = true;

    if ($no_of_selected_elements == (int)($n/2))
    {
        if (abs((int)($sum/2) - $curr_sum) < $min_diff)
        {
            $min_diff = abs((int)($sum/2) - $curr_sum);
            for ($i = 0; $i<$n; $i++)
                $soln[$i] = $curr_elements[$i];
        }
    }
    else
    {
        TOWUtil($arr, $n, $curr_elements, $no_of_selected_elements, $soln, $min_diff, $sum, $curr_sum, $curr_position+1);
    }
    $curr_elements[$curr_position] = false;
}

function tugOfWar(&$arr, $n)
{
    $curr_elements = array();
    $soln = array();
    $min_diff = PHP_INT_MAX;
    $sum = 0;
    for($i=0; $i<$n; $i++)
    {
        $sum += $arr[$i];
        $curr_elements[$i] =  $soln[$i] = false;
    }
    TOWUtil($arr, $n, $curr_elements, 0, $soln, $min_diff, $sum, 0, 0);
    echo "The first subset is: <br/>";
    for ($i=0; $i<$n; $i++)
    {
        if ($soln[$i] == true)
            echo $arr[$i] . " ";
    }
    echo "<br/>The second subset is: <br/>";
    for ($i=0; $i<$n; $i++)
    {
        if ($soln[$i] == false)
            echo $arr[$i] . " ";
    }
}

$arr = [23, 45, -34, 12, 0, 98, -99, 4, 189, -1, 4];
$n = sizeof($arr);
tugOfWar($arr, $n);