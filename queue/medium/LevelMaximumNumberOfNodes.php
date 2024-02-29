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

function dfs($root,&$map,$depth){
    if($root == NULL){
        return;
    }
    if(!array_key_exists($depth,$map)){
        $map[$depth] = 0;
    }
    $map[$depth]++;
    dfs($root->left,$map,$depth+1);
    dfs($root->right,$map,$depth+1);
}

function maxNodeLevel($root){
    $map = array();
    dfs($root,$map,0);
    $min = PHP_INT_MIN;
    $result = NULL;

    foreach($map as $key => $val){
        if($val > $min){
            $min = $val;
            $result = $key;
        }else if($val == $min){
            $result = min($result,$key);
        }
    }
    return $result;
}

$root = new Node(2);      /*        2      */
$root->left = new Node(1);      /*      /   \    */
$root->right = new Node(3);      /*     1     3      */
$root->left->left = new Node(4);      /*   /   \    \  */
$root->left->right = new Node(6);      /*  4     6    8 */
$root->right->right = new Node(8);    /*       /       */
$root->left->right->left = new Node(5);/*      5        */

printf("Level having maximum number of Nodes : %d",maxNodeLevel($root));