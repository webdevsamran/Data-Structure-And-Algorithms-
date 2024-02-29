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

function getLevelUtil($root, $data, $level){
    if(!$root){
        return 0;
    }
    if($root->data == $data){
        return $level;
    }
    $downlevel = getLevelUtil($root->left, $data, $level + 1);
    if($downlevel != 0){
        return $downlevel;
    }
    $downlevel = getLevelUtil($root->right, $data, $level + 1);
    return $downlevel;
}

function getLevel($root,$data){
    return getLevelUtil($root, $data, 1);
}


$root = new Node(3);
$root->left = new Node(2);
$root->right = new Node(5);
$root->left->left = new Node(1);
$root->left->right = new Node(4);

for ($x = 1; $x <= 5; $x++) {
    $level = getLevel($root, $x);
    if ($level)
        echo "Level of " . $x . " is " . $level . "<br/>";
    else
        echo $x . "is not present in tree" . "<br/>";
}