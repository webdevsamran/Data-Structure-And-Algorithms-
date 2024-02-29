<?php

define('MAXN',11);
define('ver',2);

$hashtable = array();
$pos = array();

function initTable()
{
    global $hashtable;
    for ($j = 0; $j < MAXN; $j++)
        for ($i = 0; $i < ver; $i++)
            $hashtable[$i][$j] = PHP_INT_MIN;
}

function m_hash($function, $key)
{
    switch ($function)
    {
        case 1: return $key % MAXN;
        case 2: return (int)($key / MAXN) % MAXN;
    }
}

function place($key, $tableID, $cnt, $n)
{
    global $hashtable;
    if ($cnt == $n)
    {
        printf("%d unpositioned<br/>", $key);
        printf("Cycle present. REHASH.<br/>");
        return;
    }
    for ($i = 0; $i < ver; $i++)
    {
        $pos[$i] = m_hash($i+1, $key);
        if ($hashtable[$i][$pos[$i]] == $key)
           return;
    }
    if ($hashtable[$tableID][$pos[$tableID]] != PHP_INT_MIN)
    {
        $dis = $hashtable[$tableID][$pos[$tableID]];
        $hashtable[$tableID][$pos[$tableID]] = $key;
        place($dis, ($tableID+1)%ver, $cnt+1, $n);
    } else
       $hashtable[$tableID][$pos[$tableID]] = $key;
}

function printTable()
{
    global $hashtable;
    printf("Final hash tables:<br/>");
    for ($i = 0; $i < ver; $i++, printf("<br/>"))
        for ($j = 0; $j < MAXN; $j++)
            ($hashtable[$i][$j] == PHP_INT_MIN)? printf("- "): printf("%d ", $hashtable[$i][$j]); 
    printf("<br/>");
}

function cuckoo($keys, $n)
{
    initTable();
    for ($i = 0, $cnt = 0; $i < $n; $i++, $cnt=0)
        place($keys[$i], 0, $cnt, $n);
    printTable();
}

$keys_1 = [20, 50, 53, 75, 100, 67, 105, 3, 36, 39];
$n = sizeof($keys_1);
cuckoo($keys_1, $n);
$keys_2 = [20, 50, 53, 75, 100, 67, 105, 3, 36, 39, 6];
$m = sizeof($keys_2);
cuckoo($keys_2, $m);