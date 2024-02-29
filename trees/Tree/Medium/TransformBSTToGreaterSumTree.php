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

function transformTreeUtil(&$root,&$sum){
    if(!$root){
        return;
    }
    transformTreeUtil($root->right,$sum);
    $sum = $sum + $root->data;
    $root->data = $sum - $root->data;
    transformTreeUtil($root->left,$sum);
}

function transformTree(&$root){
    $sum = 0;
    transformTreeUtil($root,$sum);
}

function printInorder($root)
{
    if ($root == NULL) return;
    printInorder($root->left);
    echo $root->data . " ";
    printInorder($root->right);
}

$root = new Node(11);
$root->left = new Node(2);
$root->right = new Node(29);
$root->left->left = new Node(1);
$root->left->right = new Node(7);
$root->right->left = new Node(15);
$root->right->right = new Node(40);
$root->right->right->left = new Node(35);
echo "Inorder Traversal of given tree<br/>";
printInorder($root);
transformTree($root);
echo "<br/><br/>Inorder Traversal of transformed tree<br/>";
printInorder($root);