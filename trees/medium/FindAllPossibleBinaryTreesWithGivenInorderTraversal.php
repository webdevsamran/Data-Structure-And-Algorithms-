<?php

class Node{
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

function getTrees($in,$start,$end){
    $trees = array();
    if($start > $end){
        array_push($trees,NULL);
        return $trees;
    }
    for($i = $start; $i <= $end; $i++){
        $ltrees = getTrees($in,$start,$i-1);
        $rtrees = getTrees($in,$i+1,$end);
        for($j = 0; $j < sizeof($ltrees); $j++){
            for($k = 0; $k < sizeof($rtrees); $k++){
                $node = new Node($in[$i]);
                $node->left = $ltrees[$j];
                $node->right = $rtrees[$k];
                array_push($trees,$node);
            }
        }
    }
    return $trees;
}

function preorder($root)
{
    if ($root != NULL)
    {
        printf("%d ", $root->data);
        preorder($root->left);
        preorder($root->right);
    }
}

$in = [4, 5, 7];
$n = sizeof($in);

$trees = getTrees($in, 0, $n-1);

echo "Preorder traversals of different possible Binary Trees are: <br/>";
for ($i = 0; $i < sizeof($trees); $i++)
{
    preorder($trees[$i]);
    printf("<br/>");
}