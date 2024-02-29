<?php

class Node
{
    public $key;
    public $list;

    function __construct($key)
    {
        $this->key = $key;
    }
}

function printGraph($startNode, &$visited): void
{
    if (sizeof($startNode->list) > 0) {
        foreach ($startNode->list as $val) {
            if (!$visited[$startNode->key]) {
                echo "Edge " . (int)$startNode . "-" . $val . ":" . $startNode->key . "-" . $val->key . "<br/>";
                if (!$visited[$val->key]) {
                    printGraph($val, $visited);
                    $visited[$val->key] = true;
                }
            }
        }
    }
}

$n0 = new Node(0);
$n1 = new Node(1);
$n2 = new Node(2);
$n3 = new Node(3);
$n4 = new Node(4);

$n0->list[] = $n1;
$n0->list[] = $n2;
$n1->list[] = $n2;
$n1->list[] = $n3;
$n1->list[] = $n4;
$n2->list[] = $n3;
$n3->list[] = $n4;

$visited = array_fill(0, 5, 0);
print_r($visited);

echo "Graph Before Cloning:-\n";
printGraph($n0, $visited);
$visited = [false, false, false, false, false];
