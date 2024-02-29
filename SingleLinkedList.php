<?php

class Node{
    public $data;
    public $next;
}

class singleLinkedList{
    public $head;

    function __construct(){
        $this->head = NULL;
    }

    public function insertBeginning($data){
        $node = new Node;
        $node->data = $data;
        $node->next = $this->head;
        $this->head = $node;
    }

    public function insertAfter($position,$data){
        if($position == NULL){
            echo "Node Can't be NULL\n";
            return;
        }
        $node = new Node;
        $node->data = $data;
        $node->next = $position->next;
        $position->next = $node;
    }

    public function insertEnd($data){
        $node = new Node;
        $node->data = $data;
        $node->next = NULL;
        $last = $this->head;
        if($last == NULL){
            $last = $node;
            return;
        }
        while($last->next != NULL){
            $last = $last->next;
        }
        $last->next = $node;
    }

    public function deleteNode($data){
        $temp = new Node;
        $temp = $this->head;
        $prev = NULL;

        if($temp != NULL && $temp->data == $data){
            $this->head = $temp->next;
            $temp = NULL;
            return;
        }

        while($temp != NULL && $temp->data != $data){
            $prev = $temp;
            $temp = $temp->next;
        }

        if($temp == NULL){
            return;
        }

        $prev->next = $temp->next;
        $temp = NULL;
    }

    public function searchNode($data){
        $temp = new Node;
        $temp = $this->head;

        while($temp != NULL){
            if($temp->data == $data){
                echo "It is Present<br/>\n";
                break;
            }
            $temp = $temp->next;
        }
    }

    public function sortLinkedList(){
        $current = $this->head;

        if($current == NULL){
            return;
        }
        while($current != NULL){
            $curr = $current->next;
            while($curr != NULL){
                if($current->data > $curr->data){
                    $temp = $current->data;
                    $current->data = $curr->data;
                    $curr->data = $temp;
                }
                $curr = $curr->next;
            }
            $current = $current->next;
        }
    }

    public function print_list(){
        $temp = new Node;
        $temp = $this->head;
        if($temp == NULL){
            echo "Single Linked List is Empty";
        }else{
            echo "Linked List Contains: ";
            while($temp != NULL){
                echo $temp->data." ";
                $temp = $temp->next;
            }
            echo "<br/>";
        }
    }
}

$my_list = new singleLinkedList();
$my_list->insertBeginning(1);
$my_list->insertBeginning(2);
$my_list->insertEnd(3);
$my_list->insertAfter($my_list->head->next,4);
$my_list->print_list();
// $my_list->deleteNode(1);
// $my_list->print_list();
$my_list->searchNode(2);
$my_list->sortLinkedList();
$my_list->print_list();

/* 
// Linked list operations in C++

#include <stdlib.h>

#include <iostream>
using namespace std;

// Create a node
struct Node {
  int data;
  struct Node* next;
};

void insertAtBeginning(struct Node** head_ref, int new_data) {
  // Allocate memory to a node
  struct Node* new_node = (struct Node*)malloc(sizeof(struct Node));

  // insert the data
  new_node->data = new_data;
  new_node->next = (*head_ref);

  // Move head to new node
  (*head_ref) = new_node;
}

// Insert a node after a node
void insertAfter(struct Node* prev_node, int new_data) {
  if (prev_node == NULL) {
  cout << "the given previous node cannot be NULL";
  return;
  }

  struct Node* new_node = (struct Node*)malloc(sizeof(struct Node));
  new_node->data = new_data;
  new_node->next = prev_node->next;
  prev_node->next = new_node;
}

// Insert at the end
void insertAtEnd(struct Node** head_ref, int new_data) {
  struct Node* new_node = (struct Node*)malloc(sizeof(struct Node));
  struct Node* last = *head_ref; // used in step 5

  new_node->data = new_data;
  new_node->next = NULL;

  if (*head_ref == NULL) {
  *head_ref = new_node;
  return;
  }

  while (last->next != NULL) last = last->next;

  last->next = new_node;
  return;
}

// Delete a node
void deleteNode(struct Node** head_ref, int key) {
  struct Node *temp = *head_ref, *prev;

  if (temp != NULL && temp->data == key) {
  *head_ref = temp->next;
  free(temp);
  return;
  }
  // Find the key to be deleted
  while (temp != NULL && temp->data != key) {
  prev = temp;
  temp = temp->next;
  }

  // If the key is not present
  if (temp == NULL) return;

  // Remove the node
  prev->next = temp->next;

  free(temp);
}

// Search a node
bool searchNode(struct Node** head_ref, int key) {
  struct Node* current = *head_ref;

  while (current != NULL) {
  if (current->data == key) return true;
  current = current->next;
  }
  return false;
}

// Sort the linked list
void sortLinkedList(struct Node** head_ref) {
  struct Node *current = *head_ref, *index = NULL;
  int temp;

  if (head_ref == NULL) {
  return;
  } else {
  while (current != NULL) {
    // index points to the node next to current
    index = current->next;

    while (index != NULL) {
    if (current->data > index->data) {
      temp = current->data;
      current->data = index->data;
      index->data = temp;
    }
    index = index->next;
    }
    current = current->next;
  }
  }
}

// Print the linked list
void printList(struct Node* node) {
  while (node != NULL) {
  cout << node->data << " ";
  node = node->next;
  }
}

// Driver program
int main() {
  struct Node* head = NULL;

  insertAtEnd(&head, 1);
  insertAtBeginning(&head, 2);
  insertAtBeginning(&head, 3);
  insertAtEnd(&head, 4);
  insertAfter(head->next, 5);

  cout << "Linked list: ";
  printList(head);

  cout << "\nAfter deleting an element: ";
  deleteNode(&head, 3);
  printList(head);

  int item_to_find = 3;
  if (searchNode(&head, item_to_find)) {
  cout << endl << item_to_find << " is found";
  } else {
  cout << endl << item_to_find << " is not found";
  }

  sortLinkedList(&head);
  cout << "\nSorted List: ";
  printList(head);
}
*/