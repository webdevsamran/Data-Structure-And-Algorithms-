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

function levelOrder($root){
    if(!$root){
        return;
    }
    $s1 = new SplStack;
    $s2 = new SplStack;
    $s1->push($root);
    while(!$s1->isEmpty() || !$s2->isEmpty()){
        while(!$s1->isEmpty()){
            $temp = $s1->pop();
            echo $temp->data . " ";
            if($temp->right){
                $s2->push($temp->right);
            }
            if($temp->left){
                $s2->push($temp->left);
            }
        }
        while(!$s2->isEmpty()){
            $temp = $s2->pop();
            echo $temp->data . " ";
            if($temp->left){
                $s1->push($temp->left);
            }
            if($temp->right){
                $s1->push($temp->right);
            }
        }
    }
}

$node = new Node(1);
$node->left = new Node(2);
$node->right = new Node(3);
$node->left->left = new Node(4);
$node->right->right = new Node(5);
$node->right->right->left = new Node(6);

levelOrder($node);