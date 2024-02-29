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

function postOrderIterative($root){
    $postOrderList = array();
    if($root == NULL){
        return $postOrderList;
    }
    $stack = new SplStack;
    $stack->push($root);
    $prev = NULL;
    while(!$stack->isEmpty()){
        $curr = $stack->top();
        if($prev == NULL || $prev->left == $curr || $prev->right == $curr){
            if($curr->left){
                $stack->push($curr->left);
            }else if($curr->right){
                $stack->push($curr->right);
            }else{
                $stack->pop();
                array_push($postOrderList,$curr->data);
            }
        }else if($curr->left == $prev){
            if($curr->right){
                $stack->push($curr->right);
            }else{
                $stack->pop();
                array_push($postOrderList,$curr->data);
            }
        }else if($curr->right == $prev){
            $stack->pop();
            array_push($postOrderList,$curr->data);
        }
        $prev = $curr;
    }
    return $postOrderList;
}

$root = NULL;
$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
printf("Post order traversal of binary tree is :<br/>");
printf("[");
$postOrderList = postOrderIterative($root);
foreach ($postOrderList as $it)
    echo $it . " ";
printf("]");