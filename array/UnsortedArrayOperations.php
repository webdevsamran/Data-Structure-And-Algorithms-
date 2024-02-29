<?php

function findElement(array $arr, $element): int
{
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] == $element) {
            echo "Element is Found At Position " . $i;
            return $i;
        }
    }
    return -1;
}

function insertEnd(array &$arr, $element): void
{
    array_push($arr, $element);
}

function insertBetween(array &$arr, $element, $position): void
{
    $size = sizeof($arr);
    $k = $size;
    while ($k >= $position) {
        $arr[$k] = $arr[$k - 1];
        $k--;
    }
    $arr[$position] = $element;
}

function delete(array &$arr, $element): void
{
    $size = sizeof($arr);
    $index = findElement($arr, $element);
    if ($index != -1) {
        while ($index < $size - 1) {
            $arr[$index] = $arr[$index + 1];
            $index++;
        }
    }
    unset($arr[$size - 1]);
}

$arr = [1, 2, 3];
insertEnd($arr, 4);
insertBetween($arr, 5, 2);
insertBetween($arr, 6, 1);
print_r($arr);
delete($arr, 1);
print_r($arr);

/* 
// Function to insert element at a specific position
void insertElement(List<int> arr, int n, int x, int pos) {
// shift elements to the right which are on the right side of pos
for (int i = n - 1; i >= pos; i--) {
	arr[i + 1] = arr[i];
}

// insert the new element at the specified position
arr[pos] = x;
}

// Driver's code
void main() {
List<int> arr = [2, 4, 1, 8, 5];
int n = 5;

print("Before insertion : ${arr.join(" ")}");

int x = 10;
int pos = 2;

// Function call
insertElement(arr, n, x, pos);
n++;

print("After insertion : ${arr.join(" ")}");
}

*/

/* 
// C Program to Insert an element
// at a specific position in an Array

#include <bits/stdc++.h>
using namespace std;

// Function to insert element
// at a specific position
void insertElement(int arr[], int n, int x, int pos)
{
	// shift elements to the right
	// which are on the right side of pos
	for (int i = n - 1; i >= pos; i--)
		arr[i + 1] = arr[i];

	arr[pos] = x;
}

// Driver's code
int main()
{
	int arr[15] = { 2, 4, 1, 8, 5 };
	int n = 5;

	cout<<"Before insertion : ";
	for (int i = 0; i < n; i++)
		cout<<arr[i]<<" ";

	cout<<endl;

	int x = 10, pos = 2;

	// Function call
	insertElement(arr, n, x, pos);
	n++;

	cout<<"After insertion : ";
	for (int i = 0; i < n; i++)
		cout<<arr[i]<<" ";

	return 0;
}

*/

/* 
// C++ program to implement delete operation in a
// unsorted array
#include <iostream>
using namespace std;

// To search a key to be deleted
int findElement(int arr[], int n, int key);

// Function to delete an element
int deleteElement(int arr[], int n, int key)
{
	// Find position of element to be deleted
	int pos = findElement(arr, n, key);

	if (pos == -1) {
		cout << "Element not found";
		return n;
	}

	// Deleting element
	int i;
	for (i = pos; i < n - 1; i++)
		arr[i] = arr[i + 1];

	return n - 1;
}

// Function to implement search operation
int findElement(int arr[], int n, int key)
{
	int i;
	for (i = 0; i < n; i++)
		if (arr[i] == key)
			return i;

	return -1;
}

// Driver's code
int main()
{
	int i;
	int arr[] = { 10, 50, 30, 40, 20 };

	int n = sizeof(arr) / sizeof(arr[0]);
	int key = 30;

	cout << "Array before deletion\n";
	for (i = 0; i < n; i++)
		cout << arr[i] << " ";
	

	// Function call
	n = deleteElement(arr, n, key);

	cout << "\n\nArray after deletion\n";
	for (i = 0; i < n; i++)
		cout << arr[i] << " ";

	return 0;
}

// This code is contributed by shubhamsingh10

*/