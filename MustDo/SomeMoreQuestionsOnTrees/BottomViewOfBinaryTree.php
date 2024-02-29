<?php

class Node{
    public $data;
    public $left;
    public $right;
    public $hd;

    function __construct($data)
    {
        $this->data = $data;
        $this->hd = PHP_INT_MAX;
        $this->left = $this->right = NULL;
    }
}

function printBottomViewUtil($root, $curr, $hd, &$map){
    if(!$root){
        return;
    }
    if(!array_key_exists($hd,$map)){
        $map[$hd] = [$root->data,$curr];
    }else{
        $p = $map[$hd];
        if($p[1] <= $curr){
            $map[$hd][0] = $root->data;
            $map[$hd][1] = $curr;
        }
    }
    printBottomViewUtil($root->left, $curr + 1, $hd - 1, $map);
    printBottomViewUtil($root->right, $curr + 1, $hd + 1, $map);
}

function printBottomView($root){
    $map = array();
    printBottomViewUtil($root, 0, 0, $map);
    echo "<pre>";
    ksort($map);
    foreach($map as $key => $val){
        $p = $val;
        echo $p[0] . " ";
    }
}

$root = new Node(20);
$root -> left = new Node(8);
$root -> right = new Node(22);
$root -> left -> left = new Node(5);
$root -> left -> right = new Node(3);
$root -> right -> left = new Node(4);
$root -> right -> right = new Node(25);
$root -> left -> right -> left = new Node(10);
$root -> left -> right -> right = new Node(14);
echo "Bottom view of the given binary tree :<br/>";
printBottomView($root);