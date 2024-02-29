<?php

/* 
Heap Sort Complexity
Time Complexity	 
Best	O(nlog n)
Worst	O(nlog n)
Average	O(nlog n)
Space Complexity	O(1)
Stability	No
*/

function swap(&$a, &$b) : void {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function heapify(Array &$arr, $size, $i) : void {
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;

    if($left < $size && $arr[$left] > $arr[$largest]){
        $largest = $left;
    }
    if($right < $size && $arr[$right] > $arr[$largest]){
        $largest = $right;
    }
    if($largest != $i){
        swap($arr[$i],$arr[$largest]);
        heapify($arr,$size,$largest);
    }
}

function heapSort(Array &$arr, $size) : void {
    for($i = ($size/2)-1; $i >= 0; $i--){
        heapify($arr,$size,$i);
    }
    for($i = $size-1; $i >= 0; $i--){
        swap($arr[0],$arr[$i]);
        heapify($arr,$i,0);
    }
}

function printArr(Array $arr) : void {
    $size = sizeof($arr);
    for($i = 0; $i < $size; $i++){
        echo $arr[$i]." ";
    }
    echo "<br/>\n";
}

$arr = [1, 12, 9, 5, 6, 10];
$size = sizeof($arr);
printArr($arr);
heapSort($arr,$size);
printArr($arr);

/* 
// Heap Sort in C++
  
  #include <iostream>
  using namespace std;
  
  void heapify(int arr[], int n, int i) {
    // Find largest among root, left child and right child
    int largest = i;
    int left = 2 * i + 1;
    int right = 2 * i + 2;
  
    if (left < n && arr[left] > arr[largest])
      largest = left;
  
    if (right < n && arr[right] > arr[largest])
      largest = right;
  
    // Swap and continue heapifying if root is not largest
    if (largest != i) {
      swap(arr[i], arr[largest]);
      heapify(arr, n, largest);
    }
  }
  
  // main function to do heap sort
  void heapSort(int arr[], int n) {
    // Build max heap
    for (int i = n / 2 - 1; i >= 0; i--)
      heapify(arr, n, i);
  
    // Heap sort
    for (int i = n - 1; i >= 0; i--) {
      swap(arr[0], arr[i]);
  
      // Heapify root element to get highest element at root again
      heapify(arr, i, 0);
    }
  }
  
  // Print an array
  void printArray(int arr[], int n) {
    for (int i = 0; i < n; ++i)
      cout << arr[i] << " ";
    cout << "\n";
  }
  
  // Driver code
  int main() {
    int arr[] = {1, 12, 9, 5, 6, 10};
    int n = sizeof(arr) / sizeof(arr[0]);
    heapSort(arr, n);
  
    cout << "Sorted array is \n";
    printArray(arr, n);
  }
*/