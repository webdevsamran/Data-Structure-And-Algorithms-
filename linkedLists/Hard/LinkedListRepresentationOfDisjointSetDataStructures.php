<?php

class Item{
    public $hd;
    public $tl;

    function __construct()
    {
        $this->hd = NULL;
        $this->tl = NULL;
    }
}

class Node{
    public $val;
    public $next;
    public $itemPtr;

    function __construct()
    {
         $this->val = $this->next = $this->itemPtr = NULL;
    }
}

class ListSet{
    private $nodeAddress;

    function __construct()
    {
        $this->nodeAddress = array();
    }

    function makeset($a){
        $newSet = new Item;
        $newSet->hd = new Node;
        $newSet->tl = $newSet->hd;
        $this->nodeAddress[$a] = $newSet->hd;
        $newSet->hd->val = $a;
        $newSet->hd->itemPtr = $newSet;
        $newSet->hd->next = NULL;
    }

    function find($key){
        $ptr = $this->nodeAddress[$key];
        return $ptr->itemPtr;
    }

    function union(&$set1,&$set2){
        $cur = $set2->hd;
        while ($cur != 0)
        {
            $cur->itemPtr = $set1;
            $cur = $cur->next;
        }
        $set1->tl->next = $set2->hd;
        $set1->tl = $set2->tl;
        $set2 = NULL;
    }
}

$a = new ListSet;
$a->makeset(13); //a new set is made with one object only
$a->makeset(25);
$a->makeset(45);
$a->makeset(65);

echo "find(13): " . $a->find(13) . "<br/>";
echo "find(25): "
    . $a->find(25) . "<br/>";
echo "find(65): "
    . $a->find(65) . "<br/>";
echo "find(45): "
    . $a->find(45) . "<br/>" . "<br/>";
echo "Union(find(65), find(45)) \n";

$a->Union($a->find(65), $a->find(45));

echo "find(65]): "
    . $a->find(65) . "<br/>";
echo "find(45]): "
    . $a->find(45) . "<br/>";