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

function createTree($parent,$n){
    $ref = array();
    for($i = 0; $i < $n; $i++){
        $temp = new Node($i);
        array_push($ref,$temp);
    }
    $root = NULL;
    for($i = 0; $i < $n; $i++){
        if($parent[$i] == -1){
            $root = $ref[$i];
        }else{
            if(!$ref[$parent[$i]]->left){
                $ref[$parent[$i]]->left = $ref[$i];
            }else{
                $ref[$parent[$i]]->right = $ref[$i];
            }
        }
    }
    return $root;
}

function inorder($root)
{
    if ($root != NULL) {
        inorder($root->left);
        echo $root->data . " ";
        inorder($root->right);
    }
}

$parent = [ -1, 0, 0, 1, 1, 3, 5 ];
$n = sizeof($parent);
$root = createTree($parent, $n);
echo "Inorder Traversal of constructed tree: ";
inorder($root);