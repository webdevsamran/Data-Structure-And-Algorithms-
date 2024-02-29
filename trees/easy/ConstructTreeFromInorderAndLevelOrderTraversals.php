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

function prePrint($arr)
{
    print_r($arr);
    echo "<br/>";
}

function search($in, $start, $end, $data)
{
    for ($i = $start; $i <= $end; $i++) {
        if ($in[$i] == $data) {
            return $i;
        }
    }
    return -1;
}

function extractKeys($in, $level, $startInIndex, $endInIndex, $len)
{
    $newLevel = array();
    for ($i = 0; $i < $len; $i++) {
        for ($j = $startInIndex; $j <= $endInIndex; $j++) {
            if ($in[$j] == $level[$i]) {
                array_push($newLevel, $level[$i]);
            }
        }
    }
    return $newLevel;
}

function buildTree($in, $level, $start, $end, $len)
{
    if ($start > $end) {
        return NULL;
    }
    $root = new Node($level[0]);
    if ($start == $end) {
        return $root;
    }
    $index = search($in, $start, $end, $root->data);
    $lLevel = extractKeys($in, $level, $start, $index - 1, $len);
    prePrint($lLevel);
    $rLevel = extractKeys($in, $level, $index + 1, $len - 1, $len);
    prePrint($rLevel);

    $root->left = buildTree($in, $lLevel, $start, $index - 1, $index - $start);
    $root->right = buildTree($in, $rLevel, $index + 1, $end, $end - $index);

    $lLevel = NULL;
    $rLevel = NULL;

    return $root;
}

function printInOrder($node): void
{
    if ($node == NULL) {
        return;
    }
    printInOrder($node->left);
    echo $node->data . " ";
    printInOrder($node->right);
}

$in = [4, 8, 10, 12, 14, 20, 22];
$level = [20, 8, 22, 4, 12, 10, 14];
$n = sizeof($in);
$root = buildTree($in, $level, 0, $n - 1, $n);
echo "Inorder traversal of the constructed tree is \n";
printInorder($root);
