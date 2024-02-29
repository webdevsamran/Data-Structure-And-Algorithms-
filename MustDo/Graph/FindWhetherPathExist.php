<?php

function findPath($grid){
    
}

$grid = [
    [3,0,3,0,0],
    [3,0,0,0,3],
    [3,3,3,3,3],
    [0,2,3,0,0],
    [3,0,0,1,3]
];

echo findPath($grid) == true ? "Yes": "No";