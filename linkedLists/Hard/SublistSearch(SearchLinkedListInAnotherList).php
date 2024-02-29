<?php

class Node{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

function isSublist($list,$sublist){
    if($sublist == NULL){
        return true;
    }
    if($list == NULL){
        return false;
    }
    if($list->data == $sublist->data){
        return isSublist($list->next, $sublist->next);
    }else{
        return isSublist($list->next, $sublist);
    }
}

$list = new Node(1);
$list->next = new Node(2);
$list->next->next = new Node(1);
$list->next->next->next = new Node(2);
$list->next->next->next->next = new Node(3);
$list->next->next->next->next->next = new Node(4);

// Create the sublist
$sublist = new Node(1);
$sublist->next = new Node(2);
$sublist->next->next = new Node(3);
$sublist->next->next->next = new Node(4);

// Check if sublist is present in list
if (isSublist($list, $sublist)) {
    echo "LIST FOUND";
}
else {
    echo "LIST NOT FOUND";
}