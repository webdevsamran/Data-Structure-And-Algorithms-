<?php

/* 
Time Complexities

Best case complexity: O(1)
Average case complexity: O(log n)
Worst case complexity: O(log n)
Space Complexity

The space complexity of the binary search is O(1).
*/

function BinarySearch(Array $arr,$x) : int {
    $low = 0;
    $high = sizeof($arr)-1;
    while($low <= $high){
        $mid = (int)($low + ($high - $low) / 2);
        if($arr[$mid] == $x){
            return $mid;
        }else if($arr[$mid] > $x){
            $high = $mid - 1;
        }else if($arr[$mid] < $x){
            $low = $mid + 1;
        }
    }
    return -1;
}

$arr = [3, 4, 5, 6, 7, 8, 9];
$index = BinarySearch($arr,4);
if($index != -1){
    echo "4 is present in array at index ".$index;
}else{
    echo "4 is not present in array";
}

/* 
// Binary Search in C++

#include <iostream>
using namespace std;

int binarySearch(int array[], int x, int low, int high) {
  
	// Repeat until the pointers low and high meet each other
  while (low <= high) {
    int mid = low + (high - low) / 2;

    if (array[mid] == x)
      return mid;

    if (array[mid] < x)
      low = mid + 1;

    else
      high = mid - 1;
  }

  return -1;
}

int main(void) {
  int array[] = {3, 4, 5, 6, 7, 8, 9};
  int x = 4;
  int n = sizeof(array) / sizeof(array[0]);
  int result = binarySearch(array, x, 0, n - 1);
  if (result == -1)
    printf("Not found");
  else
    printf("Element is found at index %d", result);
}
*/

/* 
// Binary Search in C++

#include <iostream>
using namespace std;

int binarySearch(int array[], int x, int low, int high) {
  if (high >= low) {
    int mid = low + (high - low) / 2;

    // If found at mid, then return it
    if (array[mid] == x)
      return mid;

    // Search the left half
    if (array[mid] > x)
      return binarySearch(array, x, low, mid - 1);

    // Search the right half
    return binarySearch(array, x, mid + 1, high);
  }

  return -1;
}

int main(void) {
  int array[] = {3, 4, 5, 6, 7, 8, 9};
  int x = 4;
  int n = sizeof(array) / sizeof(array[0]);
  int result = binarySearch(array, x, 0, n - 1);
  if (result == -1)
    printf("Not found");
  else
    printf("Element is found at index %d", result);
}
*/