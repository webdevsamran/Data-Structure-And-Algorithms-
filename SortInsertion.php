<?php

/* 
Insertion Sort Complexity
Time Complexity	 
Best	O(n)
Worst	O(n2)
Average	O(n2)
Space Complexity	O(1)
Stability	Yes
*/

function insertionSort(Array &$arr) : void {
    $size = sizeof($arr);
    for($step = 1; $step < $size; $step++){
        $key = $arr[$step];
        $j = $step - 1;
        while($j >= 0 && $arr[$j] > $key){
            $arr[$j+1] = $arr[$j];
            --$j;
        }
        $arr[$j+1] = $key;
    }
}

function printArr(Array $arr) : void {
    $size = sizeof($arr);
    for($i = 0; $i < $size; $i++){
        echo $arr[$i]." ";
    }
    echo "<br/>\n";
}

$arr = [54,12,656,2,3,1,0,76,323];
printArr($arr);
insertionSort($arr);
printArr($arr);

/* 
// Insertion sort in C++

#include <iostream>
using namespace std;

// Function to print an array
void printArray(int array[], int size) {
  for (int i = 0; i < size; i++) {
    cout << array[i] << " ";
  }
  cout << endl;
}

void insertionSort(int array[], int size) {
  for (int step = 1; step < size; step++) {
    int key = array[step];
    int j = step - 1;

    // Compare key with each element on the left of it until an element smaller than
    // it is found.
    // For descending order, change key<array[j] to key>array[j].
    while (key < array[j] && j >= 0) {
      array[j + 1] = array[j];
      --j;
    }
    array[j + 1] = key;
  }
}

// Driver code
int main() {
  int data[] = {9, 5, 1, 4, 3};
  int size = sizeof(data) / sizeof(data[0]);
  insertionSort(data, size);
  cout << "Sorted array in ascending order:\n";
  printArray(data, size);
}
*/