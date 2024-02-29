<?php

class Node
{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function sumSubtreeUtil($root, &$cur_sum, $sum): bool
{
    if ($root == NULL) {
        $cur_sum = 0;
        return false;
    }
    $left_sum = 0;
    $right_sum = 0;
    return (sumSubtreeUtil($root->left, $left_sum, $sum) || sumSubtreeUtil($root->right, $right_sum, $sum) || (($cur_sum = $left_sum + $right_sum + $root->data) == $sum));
}

function sumSubtree($root, $sum): bool
{
    $cur_sum = 0;
    return sumSubtreeUtil($root, $cur_sum, $sum);
}

$root = new node(8);
$root->left    = new node(5);
$root->right   = new node(4);
$root->left->left = new node(9);
$root->left->right = new node(7);
$root->left->right->left = new node(1);
$root->left->right->right = new node(12);
$root->left->right->right->right = new node(2);
$root->right->right = new node(11);
$root->right->right->left = new node(3);
$sum = 22;

if (sumSubtree($root, $sum))
    echo "Yes";
else
    echo "No";
