<?php

define('size',6);
$M = array_fill(0,size,array_fill(0,size,0));

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

function printMatrix(){
    global $M;
    for($i=0;$i<size;$i++){
        for($j=0;$j<size;$j++)
            echo $M[$i][$j] . " ";
        echo "<br/>";
    }       
}

function MatrixUtil($root,$index){
    global $M;
    if($root == NULL){
        return;
    }
    $preData = $root->data;
    if($index == -1){
        $index = $preData;
    }else{
        $M[$index][$preData] = 1;
    }
    MatrixUtil($root->left,$preData);
    MatrixUtil($root->right,$preData);
}

function Matrix($root){
    global $M;
    MatrixUtil($root,-1);

    for($k = 0; $k < size; $k++){
        for($i = 0; $i < size; $i++){
            for($j = 0; $j < size; $j++){
                $M[$i][$j] = $M[$i][$j] || ($M[$i][$k] && $M[$k][$j]);
            }
        }
    }

    printMatrix();
}

$root = new Node(5);
$root->left = new Node(1);
$root->right = new Node(2);
$root->left->left = new Node(0);
$root->left->right = new Node(4);
$root->right->left = new Node(3);

Matrix($root);