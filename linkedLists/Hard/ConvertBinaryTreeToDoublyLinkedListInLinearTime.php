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

function BToDLL($root,&$head){
    if($root == NULL){
        return;
    }
    BToDLL($root->right,$head);
    $root->right = $head;
    if($head != NULL){
        $head->left = $root;
    }
    $head = $root;
    BToDLL($root->left,$head);
}

function printList($head)
{
    printf("Extracted Double Linked list is:<br/>");
    while ($head) {
        printf("%d ", $head->data);
        $head = $head->right;
    }
    echo "<br/>";
}

$root = new Node(5);
$root->left = new Node(3);
$root->right = new Node(6);
$root->left->left = new Node(1);
$root->left->right = new Node(4);
$root->right->right = new Node(8);
$root->left->left->left = new Node(0);
$root->left->left->right = new Node(2);
$root->right->right->left = new Node(7);
$root->right->right->right = new Node(9);

$head = NULL;
BToDLL($root, $head);

printList($head);