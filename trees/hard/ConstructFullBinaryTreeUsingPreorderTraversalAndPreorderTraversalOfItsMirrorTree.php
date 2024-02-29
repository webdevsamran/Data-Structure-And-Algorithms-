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

function printInorder($node){
    if($node == NULL){
        return;
    }
    printInorder($node->left);
    echo $node->data . " ";
    printInorder($node->right);
}

function constructBinaryTreeUtil($pre,$preM,&$preIndex,$l,$h,$size){
    if($preIndex >= $size || $l > $h){
        return NULL;
    }
    $root = new Node($pre[$preIndex]);
    $prrII = $preIndex;
    ++$preIndex;
    if($l == $h){
        return $root;
    }
    for($i = $l; $i <= $h; ++$i){
        if($pre[$prrII] == $preM[$i]){
            break;
        }
    }
    if($i <= $h){
        $root->left = constructBinaryTreeUtil($pre,$preM,$preIndex,$i,$h,$size);
        $root->right = constructBinaryTreeUtil($pre,$preM,$preIndex,$l+1,$h-1,$size);
    }
    return $root;
}

function constructBinaryTree(&$root,$preOrder,$preOrderMirror,$n){
    $preIdx = 0;
    $root = constructBinaryTreeUtil($preOrder,$preOrderMirror,$preIdx,0,$n-1,$n);
    printInorder($root);
}

$preOrder = [1,2,4,5,3,6,7];
$preOrderMirror = [1,3,7,6,2,5,4];
$size = sizeof($preOrder);
$root = new Node;
constructBinaryTree($root,$preOrder,$preOrderMirror,$size);