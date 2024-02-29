<?php

class PriorityQueue{
    public $queue = array();

    public function swap(&$a, &$b){
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    public function heapify($i){
        $largest = $i;
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;
        $size = sizeof($this->queue);

        if($left < $size && $this->queue[$left] > $this->queue[$largest]){
            $largest = $left;
        }
        if($right < $size && $this->queue[$right] > $this->queue[$largest]){
            $largest = $right;
        }

        if($largest != $i){
            $this->swap($this->queue[$largest],$this->queue[$i]);
            $this->heapify($largest);
        }
    }

    public function insert($x){
        $size = sizeof($this->queue);
        if($size == 0){
            array_push($this->queue,$x);
        }else{
            array_push($this->queue,$x);
            for($i = ($size/2)-1; $i >= 0; $i--){
                $this->heapify($i);
            }
        }
    }

    public function delete($x){
        $size = sizeof($this->queue);
        $index = NULL;
        if($size == 0){
            echo "Priority Queue is Empty";
        }else{
            for($index = 0; $index < $size; $index++){
                if($this->queue[$index] == $x){
                    break;
                }
            }
        }
        $this->swap($this->queue[$index],$this->queue[$size-1]);
        array_pop($this->queue);
        for($i = ($size/2)-1; $i >= 0; $i--){
            $this->heapify($i);
        }
    }

    public function print_PQ(){
        echo "Priority Queue Elements are: \n";
        for($i = 0; $i < sizeof($this->queue); $i++){
            echo $this->queue[$i]." ";
        }
        echo "\n";
    }
}

$MyPQ = new PriorityQueue();
$MyPQ->insert(3);
$MyPQ->insert(4);
$MyPQ->insert(5);
$MyPQ->insert(9);
$MyPQ->insert(2);

$MyPQ->print_PQ();

$MyPQ->delete(4);
$MyPQ->print_PQ();

/* 
// Priority Queue implementation in C++

#include <iostream>
#include <vector>
using namespace std;

// Function to swap position of two elements
void swap(int *a, int *b) {
  int temp = *b;
  *b = *a;
  *a = temp;
}

// Function to heapify the tree
void heapify(vector<int> &hT, int i) {
  int size = hT.size();
  
  // Find the largest among root, left child and right child
  int largest = i;
  int l = 2 * i + 1;
  int r = 2 * i + 2;
  if (l < size && hT[l] > hT[largest])
    largest = l;
  if (r < size && hT[r] > hT[largest])
    largest = r;

  // Swap and continue heapifying if root is not largest
  if (largest != i) {
    swap(&hT[i], &hT[largest]);
    heapify(hT, largest);
  }
}

// Function to insert an element into the tree
void insert(vector<int> &hT, int newNum) {
  int size = hT.size();
  if (size == 0) {
    hT.push_back(newNum);
  } else {
    hT.push_back(newNum);
    for (int i = size / 2 - 1; i >= 0; i--) {
      heapify(hT, i);
    }
  }
}

// Function to delete an element from the tree
void deleteNode(vector<int> &hT, int num) {
  int size = hT.size();
  int i;
  for (i = 0; i < size; i++) {
    if (num == hT[i])
      break;
  }
  swap(&hT[i], &hT[size - 1]);

  hT.pop_back();
  for (int i = size / 2 - 1; i >= 0; i--) {
    heapify(hT, i);
  }
}

// Print the tree
void printArray(vector<int> &hT) {
  for (int i = 0; i < hT.size(); ++i)
    cout << hT[i] << " ";
  cout << "\n";
}

// Driver code
int main() {
  vector<int> heapTree;

  insert(heapTree, 3);
  insert(heapTree, 4);
  insert(heapTree, 9);
  insert(heapTree, 5);
  insert(heapTree, 2);

  cout << "Max-Heap array: ";
  printArray(heapTree);

  deleteNode(heapTree, 4);

  cout << "After deleting an element: ";

  printArray(heapTree);
}
*/