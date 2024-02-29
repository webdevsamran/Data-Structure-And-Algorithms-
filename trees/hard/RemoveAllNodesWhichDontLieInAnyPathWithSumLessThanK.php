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

function printT($root)
{
    if ($root != NULL)
    {
        printT($root->left);
        echo $root->data . " ";
        printT($root->right);
    }
}

function prune($root,$k){
    if($root == NULL){
        return NULL;
    }
    $root->left = prune($root->left,$k-$root->data);
    $root->right = prune($root->right,$k-$root->data);
    if(!$root->left && !$root->right){
        if($root->data < $k){
            $root = NULL;
            return NULL;
        }
    }
    return $root;
}

$k = 45;
$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->left->left->left = new Node(8);
$root->left->left->right = new Node(9);
$root->left->right->left = new Node(12);
$root->right->right->left = new Node(10);
$root->right->right->left->right = new Node(11);
$root->left->left->right->left = new Node(13);
$root->left->left->right->right = new Node(14);
$root->left->left->right->right->left = new Node(15);

echo "Tree before truncation<br/>";
printT($root);
$root = prune($root, $k);
echo "<br/><br/>Tree after truncation<br/>";
printT($root);