<?php

/* 
Complexity
Time Complexity	 
Best	O(n+k)
Worst	O(n+k)
Average	O(n+k)
Space Complexity	O(max)
Stability	Yes
*/

function printArr(Array $arr) : void {
    $size = sizeof($arr);
    for($i = 0; $i < $size; $i++){
        echo $arr[$i]." ";
    }
    echo "<br/>\n";
}

function countingSort(Array &$arr) : void {
    $size = sizeof($arr);
    $max = 0;
    for($i = 0; $i < $size; $i++){
        if($arr[$i] > $max){
            $max = $arr[$i];
        }
    }
    $output = new SplFixedArray($size);
    $count = [];

    for($i = 0; $i <= $max; $i++){
        $count[$i] = 0;
    }
    for($i = 0; $i < $size; $i++){
        $count[$arr[$i]]++;
    }
    for($i = 1; $i <= $max; $i++){
        $count[$i] += $count[$i-1];
    }
    for($i = $size-1; $i >= 0; $i--){
        $output[$count[$arr[$i]]-1] = $arr[$i];
        $count[$arr[$i]]--;
    }
    for($i = 0; $i < $size; $i++){
        $arr[$i] = $output[$i];
    }
}

$arr = [4, 2, 2, 8, 3, 3, 1];
$size = sizeof($arr);
printArr($arr);
countingSort($arr);
printArr($arr);

/* 
// Counting sort in C++ programming

#include <iostream>
using namespace std;

void countSort(int array[], int size) {
  // The size of count must be at least the (max+1) but
  // we cannot assign declare it as int count(max+1) in C++ as
  // it does not support dynamic memory allocation.
  // So, its size is provided statically.
  int output[10];
  int count[10];
  int max = array[0];

  // Find the largest element of the array
  for (int i = 1; i < size; i++) {
    if (array[i] > max)
      max = array[i];
  }

  // Initialize count array with all zeros.
  for (int i = 0; i <= max; ++i) {
    count[i] = 0;
  }

  // Store the count of each element
  for (int i = 0; i < size; i++) {
    count[array[i]]++;
  }

  // Store the cummulative count of each array
  for (int i = 1; i <= max; i++) {
    count[i] += count[i - 1];
  }

  // Find the index of each element of the original array in count array, and
  // place the elements in output array
  for (int i = size - 1; i >= 0; i--) {
    output[count[array[i]] - 1] = array[i];
    count[array[i]]--;
  }

  // Copy the sorted elements into original array
  for (int i = 0; i < size; i++) {
    array[i] = output[i];
  }
}

// Function to print an array
void printArray(int array[], int size) {
  for (int i = 0; i < size; i++)
    cout << array[i] << " ";
  cout << endl;
}

// Driver code
int main() {
  int array[] = {4, 2, 2, 8, 3, 3, 1};
  int n = sizeof(array) / sizeof(array[0]);
  countSort(array, n);
  printArray(array, n);
}
*/