<?php

$result = array();
$adj = array();

function findthepath($S,$v){
    global $result;
    global $adj;

    array_push($result,$v);
    for($i = 1; $S[$i]; $i++){
        if($adj[$v][ord($S[$i]) - ord('A')] || $adj[ord($S[$i]) - ord('A')][$v]){
            $v = ord($S[$i]) - ord('A');
        }else if($adj[$v][ord($S[$i]) - ord('A') + 5] || $adj[ord($S[$i]) - ord('A') + 5][$v]){
            $v = ord($S[$i]) - ord('A') + 5;
        }else{
            return false;
        }
        array_push($result,$v);
    }
    return true;
}

$adj[0][1] = $adj[1][2] = $adj[2][3] = $adj[3][4] = $adj[4][0] = $adj[0][5] = $adj[1][6] = $adj[2][7] = $adj[3][8] = $adj[4][9] = $adj[5][7] = $adj[7][9] = $adj[9][6] = $adj[6][8] = $adj[8][5] = true;

$S = "ABB";
$S = str_split($S);
    
echo (findthepath($S, ord($S[0]) - ord('A')) || findthepath($S, ord($S[0]) - ord('A') + 5)) ? implode('',$result) : "-1";