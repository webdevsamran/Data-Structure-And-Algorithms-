<?php

define('N',6);

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

function ancestorTree($mat){
    $parent = array_fill(0,N,0);
    $root = NULL;
    $mm = array();
    for($i = 0; $i < N; $i++){
        $sum = 0;
        for($j = 0; $j < N; $j++){
            $sum += $mat[$i][$j];
        }
        $mm[$i] = $sum;
    }
    $node = array(0,N,new Node);
    foreach($mm as $key => $val){
        $node[$key] = new Node($key);
        $root = $node[$key];
        if($val != 0){
            for($i = 0; $i < N; $i++){
                if(!$parent[$i] && $mat[$key][$i]){
                    if(!$node[$key]->left){
                        $node[$key]->left = $node[$i];
                    }else{
                        $node[$key]->right = $node[$i];
                    }
                    $parent[$i] = 1;
                }
            }
        }
    }
    return $root;
}

function printInorder($node){
    if($node == NULL){
        return;
    }
    printInorder($node->left);
    echo $node->data . " ";
    printInorder($node->right);
}

$mat = [
    [ 0, 0, 0, 0, 0, 0 ],
    [ 1, 0, 0, 0, 1, 0 ],
    [ 0, 0, 0, 1, 0, 0 ],
    [ 0, 0, 0, 0, 0, 0 ],
    [ 0, 0, 0, 0, 0, 0 ],
    [ 1, 1, 1, 1, 1, 0 ]
];

$root = ancestorTree($mat);
echo "Inorder traversal of tree is <br/>";
printInorder($root);