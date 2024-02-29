<?php

function addEdge(&$list, $i, $j): void
{
    $list[$i][] = $j;
}

function printList($list): void
{
    foreach ($list as $key => $val) {
        echo $key . "=>";
        print_r($val);
        echo "<br/>";
    }
}

$list = array();
addEdge($list, 0, 1);
addEdge($list, 0, 2);
addEdge($list, 0, 3);
addEdge($list, 1, 0);
addEdge($list, 1, 2);
addEdge($list, 2, 0);
addEdge($list, 2, 1);
addEdge($list, 2, 4);
addEdge($list, 3, 0);
printList($list);
