<?php

/* 
Time Complexity: O(n)
Auxiliary Space: O(1)
*/

function reverseArray(array &$arr): void
{
    $size = sizeof($arr);
    $low = 0;
    $high = $size - 1;
    while ($low < $high) {
        $temp = $arr[$low];
        $arr[$low] = $arr[$high];
        $arr[$high] = $temp;
        $low++;
        $high--;
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7];
reverseArray($arr);
print_r($arr);

/* 
// Iterative C++ program to reverse an array
#include <bits/stdc++.h>
using namespace std;

void rvereseArray(int arr[], int start, int end)
{
	while (start < end)
	{
		int temp = arr[start];
		arr[start] = arr[end];
		arr[end] = temp;
		start++;
		end--;
	}
}	

void printArray(int arr[], int size)
{
for (int i = 0; i < size; i++)
cout << arr[i] << " ";

cout << endl;
}

int main()
{
	int arr[] = {1, 2, 3, 4, 5, 6};
	
	int n = sizeof(arr) / sizeof(arr[0]);

	// To print original array
	printArray(arr, n);
	
	// Function calling
	rvereseArray(arr, 0, n-1);
	
	cout << "Reversed array is" << endl;
	
	// To print the Reversed array
	printArray(arr, n);
	
	return 0;
}

*/
