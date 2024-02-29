<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function printList($head){
    while($head){
        echo $head->data . " ";
        $head = $head->right;
    }
}

function BinaryTree2DoubleLinkedList($root, &$head){
    if(!$root){
        return;
    }
    static $prev = NULL;
    BinaryTree2DoubleLinkedList($root->left,$head);
    if($prev == NULL){
        $head = $root;
    }else{
        $root->left = $prev;
        $prev->right = $root;
    }
    $prev = $root;
    BinaryTree2DoubleLinkedList($root->right,$head);
}

$root = new Node(10);
$root->left = new Node(12);
$root->right = new Node(15);
$root->left->left = new Node(25);
$root->left->right = new Node(30);
$root->right->left = new Node(36);

$head = NULL;
BinaryTree2DoubleLinkedList($root, $head);
printList($head);