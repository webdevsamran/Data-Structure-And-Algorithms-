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

function findLCA($root,$n1,$n2){
    if(!$root){
        return NULL;
    }
    if($root->data == $n1 || $root->data == $n2){
        return $root;
    }
    $left_lca = findLCA($root->left,$n1,$n2);
    $right_lca = findLCA($root->right,$n1,$n2);
    if($left_lca && $right_lca){
        return $root;
    }
    return ($left_lca) ? $left_lca : $right_lca;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
echo "LCA(4, 5) = " . findLCA($root, 4, 5)->data;
echo "<br/>LCA(4, 6) = " . findLCA($root, 4, 6)->data;
echo "<br/>LCA(3, 4) = " . findLCA($root, 3, 4)->data;
echo "<br/>LCA(2, 4) = " . findLCA($root, 2, 4)->data;