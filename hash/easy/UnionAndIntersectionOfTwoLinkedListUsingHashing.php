<?php

class Node
{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

function push(&$node, $data): void
{
    $newNode = new Node($data);
    $newNode->next = $node;
    $node = $newNode;
}

function printList($node): void
{
    echo "List is: ";
    while ($node != NULL) {
        echo $node->data . " ";
        $node = $node->next;
    }
    echo "<br/>";
}

function getIntersection($node1, $node2)
{
    $temp = array();
    $result = NULL;
    $p = $node1;
    while ($p != NULL) {
        $temp[$p->data] = 1;
        $p = $p->next;
    }
    $p = $node2;
    while ($p != NULL) {
        if (array_key_exists($p->data, $temp)) {
            push($result, $p->data);
        }
        $p = $p->next;
    }
    return $result;
}

function getUnion($node1, $node2)
{
    $temp = array();
    $result = NULL;
    $p = $node1;
    while ($p != NULL) {
        push($result, $p->data);
        $temp[$p->data] = 1;
        $p = $p->next;
    }
    $p = $node2;
    while ($p != NULL) {
        if (array_key_exists($p->data, $temp)) {
            $p = $p->next;
            continue;
        }
        push($result, $p->data);
        $p = $p->next;
    }
    return $result;
}

function printUnionIntersection($node1, $node2): void
{
    $Intersection = getIntersection($node1, $node2);
    $Union = getUnion($node1, $node2);

    echo "Intersection is: ";
    printList($Intersection);
    echo "<br/>";

    echo "Union is: ";
    printList($Union);
    echo "<br/>";
}

$node1 = NULL;
$node2 = NULL;

// Push in Node1
push($node1, 1);
push($node1, 2);
push($node1, 3);
push($node1, 4);
push($node1, 5);
push($node1, 6);

// Push in Node2
push($node2, 0);
push($node2, 3);
push($node2, 6);
push($node2, 7);
push($node2, 8);
push($node2, 9);

// Printing Both Nodes
printList($node1);
printList($node2);
printUnionIntersection($node1, $node2);
