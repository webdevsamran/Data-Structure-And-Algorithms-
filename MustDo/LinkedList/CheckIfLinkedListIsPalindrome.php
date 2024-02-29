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

function printNodes($node){
    while($node != NULL){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function getMiddle($Node){
    $slow = $Node;
    $fast = $Node;
    while($fast != NULL && $fast->next != NULL){
        $slow = $slow->next;
        $fast = $fast->next->next;
    }
    return $slow;
}

function reverseNode($node){
    $prev = NULL;
    $next = NULL;
    $curr = $node;
    while($curr){
        $next = $curr->next;
        $curr->next = $prev;
        $prev = $curr;
        $curr = $next;
    }
    return $prev;
}

function isPalindrome($node){
    if($node == NULL || $node->next == NULL){
        return true;
    }
    $middle = getMiddle($node);
    $temp = $middle->next;
    $middle->next = reverseNode($temp);
    $head1 = $node;
    $head2 = $middle->next;
    while($head2){
        if($head1->data != $head2->data){
            return false;
        }
        $head1 = $head1->next;
        $head2 = $head2->next;
    }
    return true;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(1);

echo isPalindrome($node);