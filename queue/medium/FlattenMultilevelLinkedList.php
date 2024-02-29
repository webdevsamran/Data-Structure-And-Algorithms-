<?php

class Node{
    public $data;
    public $next;
    public $child;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
        $this->child = NULL;
    }
}

function create_list($arr,$size){
    $head = $p = new Node($arr[0]);
    $i = 1;

    while($i < $size){
        $p->next = new Node($arr[$i]);
        $p = $p->next;
        $i++;
    }

    return $head;
}

function printList($head){
    while($head != NULL){
        echo $head->data." ";
        $head = $head->next;
    }
    echo "<br/>";
}

function createList(){
    $arr1 = [10, 5, 12, 7, 11]; 
    $arr2 = [4, 20, 13]; 
    $arr3 = [17, 6]; 
    $arr4 = [9, 8]; 
    $arr5 = [19, 15]; 
    $arr6 = [2]; 
    $arr7 = [16]; 
    $arr8 = [3]; 
  
    /* create 8 linked lists */
    $head1 = create_list($arr1, sizeof($arr1)); 
    $head2 = create_list($arr2, sizeof($arr2)); 
    $head3 = create_list($arr3, sizeof($arr3)); 
    $head4 = create_list($arr4, sizeof($arr4)); 
    $head5 = create_list($arr5, sizeof($arr5)); 
    $head6 = create_list($arr6, sizeof($arr6)); 
    $head7 = create_list($arr7, sizeof($arr7)); 
    $head8 = create_list($arr8, sizeof($arr8)); 
  
  
    /* modify child pointers to 
    create the list shown above */
    $head1->child = $head2; 
    $head1->next->next->next->child = $head3; 
    $head3->child = $head4; 
    $head4->child = $head5; 
    $head2->next->child = $head6; 
    $head2->next->next->child = $head7; 
    $head7->child = $head8; 
  
  
    /* Return head pointer of first 
    linked list. Note that all nodes are 
    reachable from head1 */
    return $head1; 
}

function flattenList(&$head){
    if($head == NULL){
        return;
    }

    $tmp = NULL;
    $tail = $head;

    while($tail->next != NULL){
        $tail = $tail->next;
    }

    $cur = $head;
    
    while($cur != $tail){
        if($cur->child){
            $tail->next = $cur->child;

            $tmp = $cur->child;
            while($tmp->next){
                $tmp = $tmp->next;
            }

            $tail = $tmp;
        }
        $cur = $cur->next;
    }
}

$head = NULL; 
$head = createList(); 
flattenList($head); 
printList($head); 