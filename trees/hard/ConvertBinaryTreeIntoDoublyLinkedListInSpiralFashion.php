<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data = NULL)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function push(&$head,$node){
    $node->right = $head;
    $node->left = NULL;
    if($head != NULL){
        $head->left = $node;
    }
    $head = $node;
}

function printList($node){
    while($node){
        echo $node->data . " ";
        $node = $node->right;
    }
}

function spiralLevelOrder($root){
    if($root == NULL){
        return;
    }
    $queue = new SplQueue;
    $queue->enqueue($root);
    $stack = new SplStack;
    $level = 0;
    while(!$queue->isEmpty()){
        $nodeCount = $queue->count();
        if($level&1){
            while($nodeCount > 0){
                $node = $queue->dequeue();
                $stack->push($node);
                if($node->left){
                    $queue->push($node->left);
                }
                if($node->right){
                    $queue->push($node->right);
                }
                $nodeCount--;
            }
        }else{
            while($nodeCount > 0){
                $node = $queue->pop();
                $stack->push($node);
                if($node->left){
                    $queue->enqueue($node->left);
                }
                if($node->right){
                    $queue->enqueue($node->right);
                }
                $nodeCount--;
            }
        }
        $level++;
    }
    $head = NULL;
    while (!$stack->isEmpty())
    {
        push($head, $stack->top());
        $stack->pop();
    }
    echo "Created DLL is:<br/>";
    printList($head);
}

$root =  new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->left->left->left  = new Node(8);
$root->left->left->right  = new Node(9);
$root->left->right->left  = new Node(10);
$root->left->right->right  = new Node(11);
$root->right->left->right  = new Node(13);
$root->right->right->left  = new Node(14);

spiralLevelOrder($root);