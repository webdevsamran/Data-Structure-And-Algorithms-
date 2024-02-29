<?php

class Node{
    public $data;
    public $next;
    public $arbit;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = $this->arbit = NULL;
    }
}

function cloneLinkedList($head){
    $mp = array();
    $temp = $head;
    $nhead = new Node($temp->data);
    $mp[serialize($temp)] = $nhead;

    while($temp->next != NULL) {
        $nhead->next = new Node($temp->next->data);
        $temp = $temp->next;
        $nhead = $nhead->next;
        $mp[serialize($temp)] = $nhead;
    }
    $temp = $head;
    while($temp != NULL) {
        if(!array_key_exists(serialize($temp),$mp)){
            $temp = $temp->next;
            continue;
        }
        $mp[serialize($temp)]->arbit = $mp[$temp->arbit];
        $temp = $temp->next;
    }
    return $mp[serialize($temp)];
}

function printList($head)
{
    echo $head->data . "(" . $head->arbit->data . ")";
    $head = $head->next;
    while($head != NULL) {
        echo " -> " . $head->data . "(" . $head->arbit->data . ")";
        $head = $head->next;
    }
    echo "<br/>";
}

$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(4);
$head->next->next->next->next
    = new Node(5);
$head->arbit = $head->next->next;
$head->next->arbit = $head;
$head->next->next->arbit
    = $head->next->next->next->next;
$head->next->next->next->arbit
    = $head->next->next;
$head->next->next->next->next->arbit
    = $head->next;

// Print the original list
echo "The original linked list:<br/>";
printList($head);

// Function call
$sol = cloneLinkedList($head);

echo "The cloned linked list:<br/>";
printList($sol);