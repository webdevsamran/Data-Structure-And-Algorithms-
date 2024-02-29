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

function constructTreeUtil($pre,&$preIndex,$key,$min,$max,$n){
    if($preIndex >= $n){
        return NULL;
    }
    $root = NULL;
    if($key > $min && $key < $max){
        $root = new Node($key);
        $preIndex++;
        if($preIndex < $n){
            $root->left = constructTreeUtil($pre, $preIndex, $pre[$preIndex], $min, $key, $n);
        }
        if($preIndex < $n){
            $root->right = constructTreeUtil($pre, $preIndex, $pre[$preIndex], $key, $max, $n);
        }
    }
    return $root;
}

function constructTree($pre,$n){
    $preIndex = 0;
    return constructTreeUtil($pre,$preIndex,$pre[0],PHP_INT_MIN,PHP_INT_MAX,$n);
}

function printInorder($node)
{
    if ($node == NULL)
        return;
    printInorder($node->left);
    echo $node->data . " ";
    printInorder($node->right);
}

$pre = [ 10, 5, 1, 7, 40, 50 ];
$size = sizeof($pre);
$root = constructTree($pre, $size);
printInorder($root);