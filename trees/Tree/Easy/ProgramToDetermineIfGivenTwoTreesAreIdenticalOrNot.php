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

function identicalTrees($root1,$root2){
    if(!$root1 && !$root2){
        return 1;
    }
    if($root1 && $root2){
        return ($root1->data == $root2->data) && (identicalTrees($root1->left,$root2->left)) && (identicalTrees($root1->right,$root2->right));
    }
    return 0;
}

$root1 = new Node(1);
$root2 = new Node(1);
$root1->left = new Node(2);
$root1->right = new Node(3);
$root1->left->left = new Node(4);
$root1->left->right = new Node(5);

$root2->left = new Node(2);
$root2->right = new Node(3);
$root2->left->left = new Node(4);
$root2->left->right = new Node(5);

if (identicalTrees($root1, $root2))
    echo "Both trees are identical.";
else
    echo "Trees are not identical.";