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

function push(&$root,$data){
    $node = new Node($data);
    $node->next = $root;
    $root = $node;
}

function getTail($root){
    while($root != NULL && $root->next != NULL){
        $root = $root->next;
    }
    return $root;
}

function partition($root,$end,&$newRoot,&$newEnd){
    $pivot = $end;
    $prev = NULL;
    $curr = $root;
    $tail = $pivot;

    while($curr != $pivot){
        if($curr->data < $pivot->data){
            if($newRoot == NULL){
                $newRoot = $curr;
            }
            $prev = $curr;
            $curr = $curr->next;
        }else{
            if($prev){
                $prev->next = $curr->next;
            }
            $next = $curr->next;
            $curr->next = NULL;
            $tail->next = $curr;
            $tail = $curr;
            $curr = $next;
        }
    }
    
    if($newRoot == NULL){
        $newRoot = $pivot;
    }
    $newEnd = $tail;
    return $pivot;
}

function quickSortUtil($root,$end){
    if(!$root || $root == $end){
        return $root;
    }
    $newRoot = NULL;
    $newEnd = NULL;
    $pivot = partition($root,$end,$newRoot,$newEnd);
    if($newRoot != $pivot){
        $tmp = $newRoot;
        while($tmp->next != $pivot){
            $tmp = $tmp->next;
        }
        $tmp->next = NULL;
        $newRoot = quickSortUtil($newRoot,$tmp);
        $tmp = getTail($newRoot);
        $tmp->next = $pivot;
    }
    $pivot->next = quickSortUtil($pivot->next, $newEnd);
  
    return $newRoot;
}

function quickSort(&$root){
    $root = quickSortUtil($root,getTail($root));
    return;
}

function printList($root){
    $node = $root;
    while($node != NULL){
        echo $node->data." ";
        $node = $node->next;
    }
    echo "<br/>";
}

$a = NULL;
push($a, 5);
push($a, 20);
push($a, 4);
push($a, 3);
push($a, 30);
  
echo "Linked List before sorting <br/>";
printList($a);

// Function call
quickSort($a);

echo "Linked List after sorting <br/>";
printList($a);