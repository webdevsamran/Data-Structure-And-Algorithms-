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

function buildTree($in, $pre, $inStart, $inEnd, &$map){
    static $preIndex = 0;
    if($inStart > $inEnd){
        return NULL;
    }
    $curr = $pre[$preIndex++];
    $tNode = new Node($curr);
    if($inStart == $inEnd){
        return $tNode;
    }
    $inIndex = $map[$curr];
    $tNode->left = buildTree($in, $pre, $inStart, $inIndex - 1, $map);
    $tNode->right = buildTree($in, $pre, $inIndex + 1, $inEnd, $map);
 
    return $tNode;
}

function buldTreeWrap($in,$pre,$len){
    $map = array();
    for($i = 0; $i < $len; $i++){
        $map[$in[$i]] = $i;
    }
    return buildTree($in, $pre, 0, $len - 1, $map);
}

function printInorder($node)
{
    if ($node == NULL)
        return;
    printInorder($node->left);
    echo $node->data . " ";
    printInorder($node->right);
}

$in = [ 'D', 'B', 'E', 'A', 'F', 'C' ];
$pre = [ 'A', 'B', 'D', 'E', 'C', 'F' ];
$len = sizeof($in);
$root = buldTreeWrap($in, $pre, $len);
printf("Inorder traversal of the constructed tree is : ");
printInorder($root);