<?php

class Node{
    public $data;
    public $left;
    public $right;
    public $nextRight;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = $this->nextRight = NULL;
    }
}

function connect(&$root){
    if($root == NULL){
        return;
    }
    $queue = new SplQueue;
    $queue->enqueue($root);
    while(!$queue->isEmpty()){
        $size = $queue->count();
        $prev = NULL;
        while($size--){
            $temp = $queue->dequeue();
            if($temp->left){
                $queue->enqueue($temp->left);
            }
            if($temp->right){
                $queue->enqueue($temp->right);
            }
            if($prev != NULL){
                $prev->nextRight = $temp;
            }
            $prev = $temp;
        }
    }
}

$root = new Node(10);
$root->left = new Node(8);
$root->right = new Node(2);
$root->left->left = new Node(3);
connect($root);
echo "Following are populated nextRight pointers in the tree (-1 is printed if there is no nextRight)<br/>";
echo "nextRight of " . $root->data . " is " . ($root->nextRight ? $root->nextRight->data : -1) . "<br/>";
echo "nextRight of " . $root->left->data . " is " . ($root->left->nextRight ? $root->left->nextRight->data: -1) . "<br/>";
echo "nextRight of " . $root->right->data . " is " . ($root->right->nextRight ? $root->right->nextRight->data : -1) . "<br/>";
echo "nextRight of " . $root->left->left->data . " is " . ($root->left->left->nextRight ? $root->left->left->nextRight->data : -1) . "<br/>";