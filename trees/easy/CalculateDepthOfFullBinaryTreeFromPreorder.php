<?php

function findDepthRec($tree, $index, $len): int
{
    if ($index >= $len || $tree[$index] == 'l') {
        return 0;
    }
    $index++;
    $left = findDepthRec($tree, $index, $len);

    $index++;
    $right = findDepthRec($tree, $index, $len);

    return max($left, $right) + 1;
}

function findDepth($tree): int
{
    $index = 0;
    $len = strlen($tree);
    return findDepthRec($tree, $index, $len);
}

$tree = "nlnnlll";
echo findDepth($tree);
