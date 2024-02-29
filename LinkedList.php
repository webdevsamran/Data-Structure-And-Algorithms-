<?php

class Node{
    public $data;
    public $next;
}

class LinkedList{
    public $head;

    function __construct(){
        $this->head = NULL;
    }

    public function print_list(){
        $temp = new Node;
        $temp = $this->head;

        if($temp == NULL){
            echo "The List is Empty\n";
        }else{
            echo "The List contains: \n";
            while($temp != NULL){
                echo $temp->data." ";
                $temp = $temp->next;
            }
        }
    }
}

$my_list = new LinkedList();

$first = new Node;
$first->data = 1;
$first->next = NULL;

$second = new Node;
$second->data = 2;
$second->next = NULL;

$third = new Node;
$third->data = 3;
$third->next = NULL;

$my_list->head = $first;
$first->next = $second;
$second->next = $third;

$my_list->print_list();

/* 
// Linked list implementation in C++

#include <bits/stdc++.h>
#include <iostream>
using namespace std;

// Creating a node
class Node {
   public:
  int value;
  Node* next;
};

int main() {
  Node* head;
  Node* one = NULL;
  Node* two = NULL;
  Node* three = NULL;

  // allocate 3 nodes in the heap
  one = new Node();
  two = new Node();
  three = new Node();

  // Assign value values
  one->value = 1;
  two->value = 2;
  three->value = 3;

  // Connect nodes
  one->next = two;
  two->next = three;
  three->next = NULL;

  // print the linked list value
  head = one;
  while (head != NULL) {
    cout << head->value;
    head = head->next;
  }
}
*/