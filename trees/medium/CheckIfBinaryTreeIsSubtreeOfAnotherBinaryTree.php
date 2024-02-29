<?php

define('MAX',100);

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

function storeInorder($root,&$in,$index){
    if(!$root){
        $in[$index++] = '$';
        return;
    }
    storeInorder($root->left,$in,$index);
    $in[$index++] = $root->data;
    storeInorder($root->right,$in,$index);
}

function storePreorder($root,&$pre,$index){
    if(!$root){
        $pre[$index++] = '$';
        return;
    }
    $pre[$index++] = $root->data;
    storePreorder($root->left,$pre,$index);
    storePreorder($root->right,$pre,$index);
}

function isSubtree($tree1,$tree2){
    if(!$tree1){
        return true;
    }
    if(!$tree2){
        return true;
    }

    $inTree1 = array();
    storeInorder($tree1,$inTree1,0);
    $inTree2 = array();
    storeInorder($tree2,$inTree2,0);
    $strTr1 = implode('',$inTree1);
    $strTr2 = implode('',$inTree2);
    if(strstr($strTr1,$strTr2) == false){
        return false;
    }

    $preTree1 = array();
    storePreorder($tree1,$preTree1,0);
    $preTree2 = array();
    storePreorder($tree2,$preTree2,0);
    $strTr1 = implode('',$preTree1);
    $strTr2 = implode('',$preTree2);
    if(strstr($strTr1,$strTr2) == false){
        return false;
    }
    return true;
}

$T = new Node('a');
$T->left = new Node('b');
$T->right = new Node('d');
$T->left->left = new Node('c');
$T->right->right = new Node('e');

$S = new Node('a');
$S->left = new Node('b');
$S->left->left = new Node('c');
$S->right = new Node('d');

echo (isSubtree($T, $S)) ? "Yes: S is a subtree of T": "No: S is NOT a subtree of T";