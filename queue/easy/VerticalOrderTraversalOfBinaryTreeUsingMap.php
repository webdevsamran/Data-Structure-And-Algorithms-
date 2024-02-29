<?php

class Node
{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
}

function getVerticalOrder($root, $hd, &$m): void
{
    if ($root == NULL) {
        return;
    }
    $m[$hd][] = $root->data;
    getVerticalOrder($root->left, $hd - 1, $m);
    getVerticalOrder($root->right, $hd + 1, $m);
}

function printVerticalOrder($root): void
{
    $hd = 0;
    $m = array();
    getVerticalOrder($root, $hd, $m);
    ksort($m);
    echo "<pre>";
    print_r($m);
    echo "</pre>";
    foreach ($m as $arr) {
        foreach ($arr as $val) {
            echo $val . " ";
        }
        echo "<br/>\n";
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->right->left->right = new Node(8);
$root->right->right->right = new Node(9);

printVerticalOrder($root);
