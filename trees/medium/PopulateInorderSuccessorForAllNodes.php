<?php

class Node{
    public $key;
    public $left;
    public $right;
    public $next;

    function __construct($key)
    {
        $this->key = $key;
        $this->left = NULL;
        $this->right = NULL;
        $this->next = NULL;
    }
}

function populateNext(&$root){
    $next = NULL;
    if($root){
        populateNext($root->right);
        $root->next = $next;
        $next = $root;
        populateNext($root->left);
    }
}

$root = new Node(10);
$root->left = new Node(8);
$root->right = new Node(12);
$root->left->left = new Node(3);

populateNext($root);

$ptr = $root->left->left;
while ($ptr) {
    echo "Next of " . $ptr->key . " is " . ($ptr->next ? $ptr->next->key : -1) . "<br/>";
    $ptr = $ptr->next;
}