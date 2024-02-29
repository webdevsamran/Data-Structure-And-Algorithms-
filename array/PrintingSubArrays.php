<?php

/* 
Time Complexity: O(2n)
Auxiliary Space: O(2n)
*/

function printingSubArrays(array $arr, int $start, int $end): void
{
    $size = sizeof($arr);
    if ($end >= $size) {
        return;
    }
    if ($start > $end) {
        printingSubArrays($arr, 0, $end + 1);
    } else {
        echo "[ ";
        for ($i = $start; $i < $end; $i++) {
            echo $arr[$i] . " , ";
        }
        echo $arr[$end] . " ] <br/>";
        printingSubArrays($arr, $start + 1, $end);
    }
    return;
}

$arr = [1, 2, 3];
printingSubArrays($arr, 0, 0);

/* 
// C++ code to print all possible subarrays for given array
// using recursion

#include <bits/stdc++.h>
using namespace std;

// Recursive function to print all possible subarrays for
// given array
void printSubArrays(vector<int> arr, int start, int end)
{
	// Stop if we have reached the end of the array
	if (end == arr.size())
		return;
	// Increment the end point and start from 0
	else if (start > end)
		printSubArrays(arr, 0, end + 1);
	// Print the subarray and increment the starting point
	else {
		cout << "[";
		for (int i = start; i < end; i++)
			cout << arr[i] << ", ";
		cout << arr[end] << "]" << endl;
		printSubArrays(arr, start + 1, end);
	}
	return;
}

int main()
{
	vector<int> arr = { 1, 2, 3 };
	printSubArrays(arr, 0, 0);
	return 0;
}

// This code is contributed by Sania Kumari Gupta

*/