<?php

class Node{
    public $key;
    public $child;

    function __construct($key)
    {
        $this->key = $key;
        $this->child = array();
    }
}

function BuildKaryTreeUtil($A, $n, $k, $h, &$ind)
{
    if ($n <= 0)
        return NULL;
    $nNode = new Node($A[$ind]);
    if ($nNode == NULL) {
        echo "Memory error <br/>";
        return NULL;
    }
    for ($i = 0; $i < $k; $i++) {
        if ($ind < $n - 1 && $h > 1) {
            $ind++;
            array_push($nNode->child,BuildKaryTree($A, $n, $k, $h - 1, $ind));
        } else {
            array_push($nNode->child,NULL);
        }
    }
    return $nNode;
}

function BuildKaryTree($A,$n,$k,$ind){
    $height = (int)ceil(log((double)$n * ($k - 1) + 1) / log((double)$k));
    return BuildKaryTreeUtil($A, $n, $k, $height, $ind);
}

function postord($root, $k)
{
    if ($root == NULL)
        return;
    for ($i = 0; $i < $k; $i++)
        postord($root->child[$i], $k);
    echo $root->key . " ";
}

$ind = 0;
$k = 3;
$n = 10;
$preorder = [ 1, 2, 5, 6, 7, 3, 8, 9, 10, 4 ];
$root = BuildKaryTree($preorder, $n, $k, $ind);
echo "Postorder traversal of constructed full k-ary tree is: ";
postord($root, $k);