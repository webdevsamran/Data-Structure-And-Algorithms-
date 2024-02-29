<?php

/* 
	 
Best	O(n)
Worst	O(n2)
Average	O(n2)
Space Complexity	O(1)
Stability	Yes
*/

function bubbleSort(Array &$arr) : void {
    $size = sizeof($arr);
    for($step = 0; $step < $size - 1; $step++){
        $swapped = 0;
        for($i = 0; $i < ($size - $step - 1); $i++){
            if($arr[$i] > $arr[$i+1]){
                $temp = $arr[$i];
                $arr[$i] = $arr[$i+1];
                $arr[$i+1] = $temp;
                $swapped = 1;
            }
        }
        if($swapped == 0){
            break;
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

$arr = [10,15,5,4,2,8,9,12];
printArr($arr);
bubbleSort($arr);
printArr($arr);

/* 
// Optimized bubble sort in C++

#include <iostream>
using namespace std;

// perform bubble sort
void bubbleSort(int array[], int size) {
    
  // loop to access each array element
  for (int step = 0; step < (size-1); ++step) {
      
    // check if swapping occurs
    int swapped = 0;
    
    // loop to compare two elements
    for (int i = 0; i < (size-step-1); ++i) {
        
      // compare two array elements
      // change > to < to sort in descending order
      if (array[i] > array[i + 1]) {

        // swapping occurs if elements
        // are not in intended order 
        int temp = array[i];
        array[i] = array[i + 1];
        array[i + 1] = temp;
        
        swapped = 1;
      }
    }

    // no swapping means the array is already sorted
    // so no need of further comparison
    if (swapped == 0)
      break;
  }
}

// print an array
void printArray(int array[], int size) {
  for (int i = 0; i < size; ++i) {
    cout << "  " << array[i];
  }
  cout << "\n";
}

int main() {
  int data[] = {-2, 45, 0, 11, -9};
  
  // find the array's length
  int size = sizeof(data) / sizeof(data[0]);
  
  bubbleSort(data, size);
  
  cout << "Sorted Array in Ascending Order:\n";
  printArray(data, size);
}
*/