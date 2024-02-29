<?php

/* 
Time Complexity
Best Case Complexity: O(n*log n)

Worst Case Complexity: O(n*log n)

Average Case Complexity: O(n*log n)

Space Complexity
The space complexity of merge sort is O(n).
*/

function printArr(Array $arr) : void {
    $size = sizeof($arr);
    for($i = 0; $i < $size; $i++){
        echo $arr[$i]." ";
    }
    echo "<br/>\n";
}

function mergeSort(Array &$arr, $left, $right) : void {
    if($left < $right){
        $mid = (int)($left + ($right - $left) / 2);
        mergeSort($arr,$left,$mid);
        mergeSort($arr,$mid+1,$right);
        merge($arr,$left,$mid,$right);
    }
}

function merge(Array &$arr, $left, $mid, $right) : void {
    $n1 = $mid - $left + 1;
    $n2 = $right - $mid;
    $leftArr = new SplFixedArray($n1);
    $rightArr = new SplFixedArray($n2);

    for($i=0;$i<$n1;$i++){
        $leftArr[$i] = $arr[$left + $i];
    }
    for($i=0;$i<$n2;$i++){
        $rightArr[$i] = $arr[$mid + $i + 1];
    }

    $i = 0;
    $j = 0;
    $k = $left;
    while($i < $n1 && $j < $n2){
        if($leftArr[$i] <= $rightArr[$j]){
            $arr[$k] = $leftArr[$i];
            $i++;
        }else{
            $arr[$k] = $rightArr[$j];
            $j++;
        }
        $k++;
    }
    while($i < $n1){
        $arr[$k] = $leftArr[$i];
        $i++;
        $k++;
    }
    while($j < $n2){
        $arr[$k] = $rightArr[$j];
        $j++;
        $k++;
    }
}

$arr = [54,12,656,2,3,1,0,76,323];
$size = sizeof($arr);
printArr($arr);
mergeSort($arr,0,$size-1);
printArr($arr);

/* 
// Merge sort in C++

#include <iostream>
using namespace std;

// Merge two subarrays L and M into arr
void merge(int arr[], int p, int q, int r) {
  
  // Create L ← A[p..q] and M ← A[q+1..r]
  int n1 = q - p + 1;
  int n2 = r - q;

  int L[n1], M[n2];

  for (int i = 0; i < n1; i++)
    L[i] = arr[p + i];
  for (int j = 0; j < n2; j++)
    M[j] = arr[q + 1 + j];

  // Maintain current index of sub-arrays and main array
  int i, j, k;
  i = 0;
  j = 0;
  k = p;

  // Until we reach either end of either L or M, pick larger among
  // elements L and M and place them in the correct position at A[p..r]
  while (i < n1 && j < n2) {
    if (L[i] <= M[j]) {
      arr[k] = L[i];
      i++;
    } else {
      arr[k] = M[j];
      j++;
    }
    k++;
  }

  // When we run out of elements in either L or M,
  // pick up the remaining elements and put in A[p..r]
  while (i < n1) {
    arr[k] = L[i];
    i++;
    k++;
  }

  while (j < n2) {
    arr[k] = M[j];
    j++;
    k++;
  }
}

// Divide the array into two subarrays, sort them and merge them
void mergeSort(int arr[], int l, int r) {
  if (l < r) {
    // m is the point where the array is divided into two subarrays
    int m = l + (r - l) / 2;

    mergeSort(arr, l, m);
    mergeSort(arr, m + 1, r);

    // Merge the sorted subarrays
    merge(arr, l, m, r);
  }
}

// Print the array
void printArray(int arr[], int size) {
  for (int i = 0; i < size; i++)
    cout << arr[i] << " ";
  cout << endl;
}

// Driver program
int main() {
  int arr[] = {6, 5, 12, 10, 9, 1};
  int size = sizeof(arr) / sizeof(arr[0]);

  mergeSort(arr, 0, size - 1);

  cout << "Sorted array: \n";
  printArray(arr, size);
  return 0;
}
*/