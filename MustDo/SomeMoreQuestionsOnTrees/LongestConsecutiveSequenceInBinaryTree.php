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

function longestConsecutiveUtil($root, $currLen, $expected, &$res){
    if(!$root){
        return;
    }
    if($root->data == $expected){
        $currLen++;
    }else{
        $currLen = 1;
    }
    $res = max($res, $currLen);
    longestConsecutiveUtil($root->left, $currLen, $root->data + 1, $res);
    longestConsecutiveUtil($root->right, $currLen, $root->data + 1, $res);
}

function longestConsecutive($root){
    if(!$root){
        return;
    }
    $res = 0;
    longestConsecutiveUtil($root, 0, $root->data, $res);
    return $res;
}

$root = new Node(6);
$root->right = new Node(9);
$root->right->left = new Node(7);
$root->right->right = new Node(10);
$root->right->right->right = new Node(11);

printf("%d<br/>", longestConsecutive($root));