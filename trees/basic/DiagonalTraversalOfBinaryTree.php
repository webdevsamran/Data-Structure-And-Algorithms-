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

function diagonalPrintUtil($root, $d, &$diagonalFreq): void
{
    if ($root == NULL) {
        return;
    }
    $diagonalFreq[$d][] = $root->data;
    diagonalPrintUtil($root->left, $d + 1, $diagonalFreq);
    diagonalPrintUtil($root->right, $d, $diagonalFreq);
}

function diagonalPrint($root): void
{
    if ($root == NULL) {
        return;
    }
    $diagonalFreq = array();
    diagonalPrintUtil($root, 0, $diagonalFreq);
    foreach ($diagonalFreq as $arr) {
        foreach ($arr as $val) {
            echo $val . " ";
        }
        echo "<br/>";
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Diagonal Print: ";
diagonalPrint($root);
echo "<br/>";
