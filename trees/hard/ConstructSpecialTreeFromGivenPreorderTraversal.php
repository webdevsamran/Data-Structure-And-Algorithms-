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

function constructTreeUtil($pre,$preLN,&$index,$n){
    $ind = $index;
    if ($ind == $n)
        return NULL;
    $temp = new Node ( $pre[$ind] );
    $index++;
    if ($preLN[$ind] == 'N')
    {
      $temp->left  = constructTreeUtil($pre, $preLN, $index, $n);
      $temp->right = constructTreeUtil($pre, $preLN, $index, $n);
    }
 
    return $temp;
}

function constructTree($pre,$preLN,$n){
    $index = 0;
    return constructTreeUtil($pre,$preLN,$index,$n);
}

function printInorder($node){
    if($node == NULL){
        return;
    }
    printInorder($node->left);
    echo $node->data . " ";
    printInorder($node->right);
}

$root = NULL;
$pre = [10, 30, 20, 5, 15];
$preLN = ['N', 'N', 'L', 'L', 'L'];
$n = sizeof($pre);
$root = constructTree($pre, $preLN, $n);
printf("Inorder Traversal of the Constructed Binary Tree: <br/>");
printInorder($root);