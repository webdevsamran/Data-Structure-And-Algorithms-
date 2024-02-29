<?php

/* 
Selection Sort Complexity
Time Complexity	 
Best	O(n2)
Worst	O(n2)
Average	O(n2)
Space Complexity	O(1)
Stability	No
*/

function swap(&$a, &$b) : void {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function selectionSort(Array &$arr) : void {
    $size = sizeof($arr);
    for($step = 0; $step < $size - 1; $step++){
        $idx = $step;
        for($i = $step + 1; $i < $size; $i++){
            if($arr[$i] < $arr[$idx]){
                $idx = $i;
            }
        }
        if($idx != $step){
            swap($arr[$idx],$arr[$step]);
        }
    }
}

function printArr(Array $arr) : void {
    $size = sizeof($arr);
    for($i = 0; $i < $size; $i++){
        echo $arr[$i]." ";
    }
    echo "<br/>\n";
}

$arr = [12,34,6,7,1,2,90,76,56,76];
printArr($arr);
selectionSort($arr);
printArr($arr);

/* 
// Selection sort in C++

#include <iostream>
using namespace std;

// function to swap the the position of two elements
void swap(int *a, int *b) {
  int temp = *a;
  *a = *b;
  *b = temp;
}

// function to print an array
void printArray(int array[], int size) {
  for (int i = 0; i < size; i++) {
    cout << array[i] << " ";
  }
  cout << endl;
}

void selectionSort(int array[], int size) {
  for (int step = 0; step < size - 1; step++) {
    int min_idx = step;
    for (int i = step + 1; i < size; i++) {

      // To sort in descending order, change > to < in this line.
      // Select the minimum element in each loop.
      if (array[i] < array[min_idx])
        min_idx = i;
    }

    // put min at the correct position
    swap(&array[min_idx], &array[step]);
  }
}

// driver code
int main() {
  int data[] = {20, 12, 10, 15, 2};
  int size = sizeof(data) / sizeof(data[0]);
  selectionSort(data, size);
  cout << "Sorted array in Acsending Order:\n";
  printArray(data, size);
}
*/