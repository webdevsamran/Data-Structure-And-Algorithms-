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

function KthLargestUsingMorrisTraversal($root, $k){
    $curr = $root;
    $kLargest = NULL;
    $count = 0;
    while($curr){
        if(!$curr->right){
            if(++$count == $k){
                $kLargest = $curr;
            }
            $curr = $curr->left;
        }else{
            $succ = $curr->right;
            while($succ->left && $succ->left != $curr){
                $succ = $succ->left;
            }
            if(!$succ->left){
                $succ->left = $curr;
                $curr = $curr->right;
            }else{
                $succ->left = NULL;
                if(++$count == $k){
                    $kLargest = $curr;
                }
                $curr = $curr->left;
            }
        }
    }
    return $kLargest;
}

$root = new Node(4);
$root->left = new Node(2);
$root->right = new Node(7);
$root->left->left = new Node(1);
$root->left->right = new Node(3);
$root->right->left = new Node(6);
$root->right->right = new Node(10);
echo "Finding K-th largest Node in BST : " . KthLargestUsingMorrisTraversal($root, 2)->data;