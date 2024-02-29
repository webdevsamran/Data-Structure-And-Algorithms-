<?php

/* 
Floyd Warshall Algorithm Complexity
Time Complexity
There are three loops. Each loop has constant complexities. So, the time complexity of the Floyd-Warshall algorithm is O(n3).

Space Complexity
The space complexity of the Floyd-Warshall algorithm is O(n2).
*/

define("INF", 999);

function FloydWarshall($graph)
{
    $size = sizeof($graph);
    $matrix = array(array());
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $matrix[$i][$j] = $graph[$i][$j];
        }
    }
    for ($k = 0; $k < $size; $k++) {
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                if ($matrix[$i][$j] > $matrix[$i][$k] + $matrix[$k][$j]) {
                    $matrix[$i][$j] = $matrix[$i][$k] + $matrix[$k][$j];
                }
            }
        }
    }
    printMatrix($matrix);
}

function printMatrix($matrix)
{
    $size = sizeof($matrix);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($matrix[$i][$j] == INF) {
                echo "INF ";
            } else {
                echo $matrix[$i][$j] . " ";
            }
        }
        echo "<br/>\n";
    }
}

$graph = [[0, 3, INF, 5], [2, 0, INF, 4], [INF, 1, 0, INF], [INF, INF, 2, 0]];
FloydWarshall($graph);

/* 
// Floyd-Warshall Algorithm in C++

#include <iostream>
using namespace std;

// defining the number of vertices
#define nV 4

#define INF 999

void printMatrix(int matrix[][nV]);

// Implementing floyd warshall algorithm
void floydWarshall(int graph[][nV]) {
  int matrix[nV][nV], i, j, k;

  for (i = 0; i < nV; i++)
    for (j = 0; j < nV; j++)
      matrix[i][j] = graph[i][j];

  // Adding vertices individually
  for (k = 0; k < nV; k++) {
    for (i = 0; i < nV; i++) {
      for (j = 0; j < nV; j++) {
        if (matrix[i][k] + matrix[k][j] < matrix[i][j])
          matrix[i][j] = matrix[i][k] + matrix[k][j];
      }
    }
  }
  printMatrix(matrix);
}

void printMatrix(int matrix[][nV]) {
  for (int i = 0; i < nV; i++) {
    for (int j = 0; j < nV; j++) {
      if (matrix[i][j] == INF)
        printf("%4s", "INF");
      else
        printf("%4d", matrix[i][j]);
    }
    printf("\n");
  }
}

int main() {
  int graph[nV][nV] = {{0, 3, INF, 5},
             {2, 0, INF, 4},
             {INF, 1, 0, INF},
             {INF, INF, 2, 0}};
  floydWarshall(graph);
}
*/