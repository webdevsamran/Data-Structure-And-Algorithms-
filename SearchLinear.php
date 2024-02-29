<?php

/* 
Linear Search Complexities
Time Complexity: O(n)
Space Complexity: O(1)
*/

function linearSearch(Array $arr,$x) : int {
    $size = sizeof($arr);
    for($i = 0; $i < $size; $i++){
        if($arr[$i] == $x){
            return $i;
        }
    }
    return -1;
}

$arr = [1, 12, 9, 5, 6, 10];
$index = linearSearch($arr,12);
if($index != -1){
    echo "12 is present in array at index ".$index;
}else{
    echo "12 is not present in array";
}

/* 
// Linear Search in C++

#include <iostream>
using namespace std;

int search(int array[], int n, int x) {

  // Going through array sequencially
  for (int i = 0; i < n; i++)
    if (array[i] == x)
      return i;
  return -1;
}

int main() {
  int array[] = {2, 4, 0, 1, 9};
  int x = 1;
  int n = sizeof(array) / sizeof(array[0]);

  int result = search(array, n, x);

  (result == -1) ? cout << "Element not found" : cout << "Element found at index: " << result;
}
*/