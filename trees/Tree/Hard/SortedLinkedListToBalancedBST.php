<?php

class LNode{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

class TNode{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function printList($node){
    while($node != NULL){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function preOrder($root){
    if($root == NULL){
        return;
    }
    echo $root->data . " ";
    preOrder($root->left);
    preOrder($root->right);
}

function sortedListToBSTRecur($vec, $start, $end){
    if($start > $end){
        return NULL;
    }
    $mid = $start + (int)(($end - $start)/2);
    if(($end - $start) % 2 != 0){
        $mid = $mid + 1;
    }
    $root = new TNode($vec[$mid]);
    $root->left = sortedListToBSTRecur($vec,$start,$mid-1);
    $root->right = sortedListToBSTRecur($vec,$mid + 1, $end);
    return $root;
}

function sortedListToBST($head){
    $vec = array();
    $temp = $head;
    while($temp != NULL){
        array_push($vec,$temp->data);
        $temp = $temp->next;
    }
    return sortedListToBSTRecur($vec, 0, sizeof($vec) - 1);
}

$head = new LNode(1);
$head->next = new LNode(2);
$head->next->next = new LNode(3);
$head->next->next->next = new LNode(4);
$head->next->next->next->next = new LNode(5);
$head->next->next->next->next->next = new LNode(6);
$head->next->next->next->next->next->next = new LNode(7);
    
echo "Given Linked List: <br/>";
printList($head);
echo "<br/>";
$root = sortedListToBST($head);
echo "Peorder Traversal of constructed BST: <br/>";
preOrder($root);