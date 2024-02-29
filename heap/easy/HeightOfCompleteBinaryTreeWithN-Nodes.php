<?php

function height($nodes): int
{
    return floor(log($nodes, 2));
}

echo height(2) . "<br/>";
echo height(4) . "<br/>";
echo height(8) . "<br/>";
