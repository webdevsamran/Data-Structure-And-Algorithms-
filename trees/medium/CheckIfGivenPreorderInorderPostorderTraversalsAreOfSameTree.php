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

function search($inOrder,$inStart,$inEnd,$data){
    for($i = $inStart; $i <= $inEnd; $i++){
        if($inOrder[$i] == $data){
            return $i;
        }
    }
}

function buildTree($inOrder,$preOrder,$inStart,$inEnd){
    static $preIndex = 0;
    if($inStart > $inEnd){
        return NULL;
    }
    $tNode = new Node($preOrder[$preIndex++]);
    if($inStart==$inEnd){
        return $tNode;
    }
    $inIndex = search($inOrder,$inStart,$inEnd,$tNode->data);
    $tNode->left = buildTree($inOrder,$preIndex,$inStart,$inIndex-1);
    $tNode->right = buildTree($inOrder,$preIndex,$inIndex+1,$inEnd);
    return $tNode;
}

function checkPostorder($root,$postOrder,$index){
    if($root == NULL){
        return $index;
    }
    $index = checkPostorder($root->left,$postOrder,$index);
    $index = checkPostorder($root->right,$postOrder,$index);
    if($root->data == $postOrder[$index]){
        $index++;
    }else{
        return -1;
    }
    return $index;
}

$inOrder = [4, 2, 5, 1, 3];
$preOrder = [1, 2, 4, 5, 3];
$postOrder = [4, 5, 2, 3, 1];

$len = sizeof($inOrder);

$root = buildTree($inOrder, $preOrder, 0, $len - 1);

$index = checkPostorder($root,$postOrder,0);

echo ($index == $len) ? "Yes" : "No";