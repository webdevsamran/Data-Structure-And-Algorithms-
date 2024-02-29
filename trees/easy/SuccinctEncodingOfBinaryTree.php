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

function EncodeSuccinct($root, &$struc, &$data): void
{
    if ($root == NULL) {
        array_push($struc, 0);
        return;
    }
    array_push($struc, 1);
    array_push($data, $root->data);
    EncodeSuccinct($root->left, $struc, $data);
    EncodeSuccinct($root->right, $struc, $data);
}

function DecodeSuccinct($struc, $data)
{
    if (sizeof($struc) <= 0) {
        return NULL;
    }
    $b = array_shift($struc);
    if ($b == 1) {
        $key = array_shift($data);
        $root = new Node($key);
        $root->left = DecodeSuccinct($struc, $data);
        $root->right = DecodeSuccinct($struc, $data);
        return $root;
    }
}

function preorder($root): void
{
    if ($root) {
        echo $root->data . " ";
        if ($root->left) {
            echo "| Left Child: " . $root->left->data . " ";
        }
        if ($root->right) {
            echo "| Right Child: " . $root->right->data . " ";
        }
        echo "<br/>";
        preorder($root->left);
        preorder($root->right);
    }
}

$root = new Node(10);
$root->left = new Node(20);
$root->right = new Node(30);
$root->left->left = new Node(40);
$root->left->right = new Node(50);
$root->right->right = new Node(70);

echo "Given Tree<br/>";
preorder($root);
$struc = array();
$data = array();;
EncodeSuccinct($root, $struc, $data);

echo "<br/>Encoded Tree<br/>";
echo "Structure List<br/>";
foreach ($struc as $val) {
    echo $val . " ";
}
echo "<br/>Data List<br/>";
foreach ($data as $val) {
    echo $val . " ";
}
echo "<br/>";

$newroot = DecodeSuccinct($struc, $data);
echo "<br/>Preorder traversal of decoded tree<br/>";
preorder($newroot);
