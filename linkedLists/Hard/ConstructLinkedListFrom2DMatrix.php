<?php

/* define('MAXN',100);

class Node{
    public $data;
    public $next;

    function __construct()
    {
        $this->data = $this->next = NULL;
    }
}

$nodes = array_fill(0,MAXN,new Node);
$nodeCounter = 0;

function constructLinkedList($matrix,$rows,$cols){
    global $nodes;
    global $nodeCounter;

    $sentinel = $current = $nodes[$nodeCounter++];
 
    for ($i = 0; $i < $rows; $i++)
    {
        for ($j = 0; $j < $cols; $j++)
        {
            $newNode = $nodes[$nodeCounter++];
            $newNode->data = $matrix[$i][$j];
 
            $current->next = $newNode;
            $current = $current->next;
        }
    }
 
    return $sentinel->next;
}

function printLinkedList($head)
{
    while ($head != NULL)
    {
        echo $head->data . " ";
        $head = $head->next;
    }
    echo "<br/>";
}

$matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12]
];
 
$head = constructLinkedList($matrix, 3, 4);
printLinkedList($head); */

class Node{
    public $data;
    public $right;
    public $down;

    function __construct()
    {
        $this->data = $this->right = $this->down = NULL;
    }
}

function construct($arr, $i, $j, $m, $n, &$visited)
{
    if ($i > $m - 1 || $j > $n - 1)
        return NULL;
    if ($visited[$i][$j]) {
        return $visited[$i][$j];
    }
    $temp = new Node();
    $visited[$i][$j] = $temp;
    $temp->data = $arr[$i][$j];
    $temp->right = construct($arr, $i, $j + 1, $m, $n, $visited);
    $temp->down = construct($arr, $i + 1, $j, $m, $n, $visited);
    return $temp;
}

function display($head)
{
    $Rp = NULL;
    $Dp = $head;
    while ($Dp) {
        $Rp = $Dp;
        while ($Rp) {
            echo $Rp->data . " ";
            $Rp = $Rp->right;
        }
        echo "<br/>";
        $Dp = $Dp->down;
    }
}

$arr = [ 
    [ 1, 2, 3, 0 ],
    [ 4, 5, 6, 1 ],
    [ 7, 8, 9, 2 ],
    [ 7, 8, 9, 2 ]
];
$m = 4;
$n = 4;
$visited = array_fill(0,$m,array_fill(0,$n,0));
$head = construct($arr, 0, 0, $m, $n, $visited);
display($head);