<?php

class Node{
    public $data;
    public $left;
    public $right;
    public $parent;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = $this->parent = NULL;
    }
}

function insert($root,$data){
    if(!$root){
        return new Node($data);
    }else{
        $temp = NULL;
        if($data <= $root->data){
            $temp = insert($root->left,$data);
            $root->left = $temp;
            $temp->parent = $root;
        }else{
            $temp = insert($root->right,$data);
            $root->right = $temp;
            $temp->parent = $root;
        }
        return $root;
    }
}

function minValue($node){
    $current = $node;
    while($current->left){
        $current = $current->left;
    }
    return $current;
}

function inOrderSuccessor($root,$n){
    if($n->right != NULL){
        return minValue($n->right);
    }
    $succ = NULL;
    while($root->data != $n->data){
        if($n->data < $root->data){
            $succ = $root;
            $root = $root->left;
        }else{
            $root = $root->right;
        }
    }
    return $succ;
}

$root = $temp = $succ = $min = NULL;
$root = insert($root, 20);
$root = insert($root, 8);
$root = insert($root, 22);
$root = insert($root, 4);
$root = insert($root, 12);
$root = insert($root, 10);
$root = insert($root, 14);
$temp = $root->left->right->right;
$succ = inOrderSuccessor($root, $temp);
if ($succ != NULL)
    echo "<br/> Inorder Successor of " . $temp->data . " is " . $succ->data;
else
    echo"<br/> Inorder Successor doesn't exit";