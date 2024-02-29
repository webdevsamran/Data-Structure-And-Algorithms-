<?php

function printCircuit($adj){
    if(!sizeof($adj)){
        return;
    }
    $edge_count = array();
    for($i = 0; $i < sizeof($adj); $i++){
        $edge_count[$i] = sizeof($adj[$i]);
    }
    $circuit = array();
    $curr_path = new SplStack;
    $curr_path->push(0);
    $curr_v = 0;

    while(!$curr_path->isEmpty()){
        if($edge_count[$curr_v]){
            $curr_path->push($curr_v);
            $next_v = array_pop($adj[$curr_v]);
            $edge_count[$curr_v]--;
            $curr_v = $next_v;
        }else{
            array_push($circuit,$curr_v);
            $curr_v = $curr_path->pop();
        }
    }
    for ($i = sizeof($circuit) - 1; $i >= 0; $i--)
    {
        echo $circuit[$i];
        if ($i)
           echo " -> ";
    }
}

$adj1 = array();
$adj2 = array();

$adj1[0][] = (1);
$adj1[1][] = (2);
$adj1[2][] = (0);
printCircuit($adj1);
echo "<br/>";

$adj2[0][] = (1);
$adj2[0][] = (6);
$adj2[1][] = (2);
$adj2[2][] = (0);
$adj2[2][] = (3);
$adj2[3][] = (4);
$adj2[4][] = (2);
$adj2[4][] = (5);
$adj2[5][] = (0);
$adj2[6][] = (4);
printCircuit($adj2);