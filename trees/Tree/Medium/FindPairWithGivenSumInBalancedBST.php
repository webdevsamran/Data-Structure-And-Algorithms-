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

class BinarySearchTree{
    public $root;

    function __construct()
    {
        $this->root = NULL;
    }

    function inorderUtil($node){
        if(!$node){
            return;
        }
        $this->inorderUtil($node->left);
        echo $node->data . " ";
        $this->inorderUtil($node->right);
    }

    function inorder(){
        $this->inorderUtil($this->root);
    }

    function insertRec($root, $data){
        if(!$root){
            $root = new Node($data);
            return $root;
        }
        if($root->data > $data){
            $root->left = $this->insertRec($root->left,$data);
        }else if($root->data < $data){
            $root->right = $this->insertRec($root->right,$data);
        }
        return $root;
    }

    function insert($key){
        $this->root = $this->insertRec($this->root,$key);
    }

    function treeToList($node,&$list){
        if(!$node){
            return $list;
        }
        $this->treeToList($node->left,$list);
        array_push($list,$node->data);
        $this->treeToList($node->right,$list);
        return $list;
    }

    function isPairPresent($root,$sum){
        $a1 = array();
        $a2 = $this->treeToList($root, $a1);
        $start = 0;
        $end = sizeof($a2) - 1;
        while($start < $end){
            if($a2[$start] + $a2[$end] == $sum){
                echo "Pair Found: " . $a2[$start] . " + " . $a2[$end] . " = " . $sum . '<br/>';
                return true;
            }
            if($a2[$start] + $a2[$end] > $sum){
                $end--;
            }else{
                $start++;
            }
        }
        echo "No such values are found!<br/>";
        return false;
    }
}

$tree = new BinarySearchTree();
$tree->insert(15);
$tree->insert(10);
$tree->insert(20);
$tree->insert(8);
$tree->insert(12);
$tree->insert(16);
$tree->insert(25);
$tree->isPairPresent($tree->root, 33);