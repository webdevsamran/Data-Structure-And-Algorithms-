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

function findLCA($root,$first,$second){
    if(!$root){
        return NULL;
    }
    if($root->data == $first || $root->data == $second){
        return $root;
    }
    $left_lca = findLCA($root->left,$first,$second);
    $right_lca = findLCA($root->right,$first,$second);
    if($left_lca && $right_lca){
        return $root;
    }
    return ($left_lca != NULL) ? $left_lca : $right_lca;
}

function CountTurn($root,$key,$turn,&$count){
    if(!$root){
        return false;
    }
    if($root->data == $key){
        return true;
    }
    if($turn == true){
        if (CountTurn($root->left, $key, $turn, $count))
            return true;
        if (CountTurn($root->right, $key, !$turn, $count)) {
            $count += 1;
            return true;
        }
    }else{
        if (CountTurn($root->right, $key, $turn, $count))
            return true;
        if (CountTurn($root->left, $key, !$turn, $count)) {
            $count += 1;
            return true;
        }
    }
    return false;
}

function NumberOFTurn($root,$first,$second){
    $LCA = findLCA($root,$first,$second);
    if($LCA == NULL){
        return -1;
    }
    $count = 0;
    if($LCA->data != $first && $LCA->data != $second){
        if(CountTurn($LCA->right,$second,false,$count) || CountTurn($LCA->left,$second,true,$count)){
            ;
        }
        if(CountTurn($LCA->right,$first,false,$count) || CountTurn($LCA->left,$first,true,$count)){
            ;
        }
        return $count + 1;
    }
    if($LCA->data == $first){
        CountTurn($LCA->right, $second, false, $count);
        CountTurn($LCA->left, $second, true, $count);
        return $count;
    }else{
        CountTurn($LCA->right, $first, false, $count);
        CountTurn($LCA->left, $first, true, $count);
        return $count;
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->left->left->left = new Node(8);
$root->right->left->left = new Node(9);
$root->right->left->right = new Node(10);

$turn = 0;
if (($turn = NumberOFTurn($root, 5, 10)))
    echo $turn;
else
    echo "Not Possible";