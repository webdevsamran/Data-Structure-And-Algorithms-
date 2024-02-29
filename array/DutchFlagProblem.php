<?php

/* 
Time Complexity: O(n), Only one traversal of the array is needed.
Space Complexity: O(1), No extra space is required.
*/

function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function dutchFlagProblem(array &$arr): void
{
    $size = sizeof($arr);
    $low = 0;
    $mid = 0;
    $high = $size - 1;
    while ($mid <= $high) {
        if ($arr[$mid] == 0) {
            swap($arr[$low], $arr[$mid]);
            $low++;
            $mid++;
        } else if ($arr[$mid] == 1) {
            $mid++;
        } else if ($arr[$mid] == 2) {
            swap($arr[$mid], $arr[$high]);
            $high--;
        }
    }
}

$arr = [0, 1, 2, 0, 1, 2];
dutchFlagProblem($arr);
print_r($arr);

/* 
// C++ program to sort an array
// with 0, 1 and 2 in a single pass
#include <bits/stdc++.h>
using namespace std;

// Function to sort the input array,
// the array is assumed
// to have values in {0, 1, 2}
void sort012(int a[], int arr_size)
{
	int lo = 0;
	int hi = arr_size - 1;
	int mid = 0;

	// Iterate till all the elements
	// are sorted
	while (mid <= hi) {
		switch (a[mid]) {

		// If the element is 0
		case 0:
			swap(a[lo++], a[mid++]);
			break;

		// If the element is 1 .
		case 1:
			mid++;
			break;

		// If the element is 2
		case 2:
			swap(a[mid], a[hi--]);
			break;
		}
	}
}

// Function to print array arr[]
void printArray(int arr[], int arr_size)
{
	// Iterate and print every element
	for (int i = 0; i < arr_size; i++)
		cout << arr[i] << " ";
}

// Driver Code
int main()
{
	int arr[] = { 0, 1, 1, 0, 1, 2, 1, 2, 0, 0, 0, 1 };
	int n = sizeof(arr) / sizeof(arr[0]);

	sort012(arr, n);

	printArray(arr, n);

	return 0;
}

// This code is contributed by Shivi_Aggarwal

*/