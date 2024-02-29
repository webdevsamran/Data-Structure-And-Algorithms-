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

function findDiameter($root){
    $ans = 0;
    $curr = $root;
    while($curr){
        if(!$curr->left){
            $curr = $curr->right;
        }else{
            $pre = $curr->left;
            while($pre->right && $pre->right != $curr){
                $pre = $pre->right;
            }
            if($pre->right == NULL){
                $pre->right = $curr;
                $curr = $curr->left;
            }else{
                $pre->right = NULL;
                $leftHeight = $rightHeight = 0;
                $temp = $curr->left;
                while($temp){
                    $leftHeight++;
                    $temp = $temp->right;
                }
                $temp = $curr->right;
                while($temp){
                    $rightHeight++;
                    $temp = $temp->left;
                }
                $ans = max($ans, abs($leftHeight + $rightHeight + 1));
                $curr = $curr->right;
            }
        }
    }
    return $ans;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$diameter = findDiameter($root);
echo "The diameter of given binary tree is " . $diameter;