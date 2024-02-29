<?php

/* 
Dijkstra's Algorithm Complexity
Time Complexity: O(E Log V)

where, E is the number of edges and V is the number of vertices.

Space Complexity: O(V)


*/

function prePrint($arr): void
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function Dijkstras($graph, $n, $start): void
{
    $cost = array(array());
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($graph[$i][$j] == 0) {
                $cost[$i][$j] = PHP_INT_MAX;
            } else {
                $cost[$i][$j] = $graph[$i][$j];
            }
        }
    }

    $distance = array();
    $visited = array();

    for ($i = 0; $i < $n; $i++) {
        $distance[$i] = $cost[$start][$i];
        $visited[$i] = false;
    }

    // prePrint($distance);

    $distance[$start] = 0;
    $visited[$start] = true;
    $count = 1;
    $next_node = NULL;

    while ($count < $n - 1) {
        $min_distance = PHP_INT_MAX;
        for ($i = 0; $i < $n; $i++) {
            if ($distance[$i] < $min_distance && !$visited[$i]) {
                $min_distance = $distance[$i];
                $next_node = $i;
            }
        }
        $visited[$next_node] = true;
        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                if ($min_distance + $cost[$next_node][$i] < $distance[$i]) {
                    $distance[$i] = $min_distance + $cost[$next_node][$i];
                }
            }
        }
        prePrint($distance);
        $count++;
    }

    for ($i = 0; $i < $n; $i++) {
        if ($i != $start) {
            echo "Distnace from source to " . $i . " : " . $distance[$i] . " <br/>\n";
        }
    }
}

$graph = array(array());
$graph[0][0] = 0;
$graph[0][1] = 0;
$graph[0][2] = 1;
$graph[0][3] = 2;
$graph[0][4] = 0;
$graph[0][5] = 0;
$graph[0][6] = 0;

$graph[1][0] = 0;
$graph[1][1] = 0;
$graph[1][2] = 2;
$graph[1][3] = 0;
$graph[1][4] = 0;
$graph[1][5] = 3;
$graph[1][6] = 0;

$graph[2][0] = 1;
$graph[2][1] = 2;
$graph[2][2] = 0;
$graph[2][3] = 1;
$graph[2][4] = 3;
$graph[2][5] = 0;
$graph[2][6] = 0;

$graph[3][0] = 2;
$graph[3][1] = 0;
$graph[3][2] = 1;
$graph[3][3] = 0;
$graph[3][4] = 0;
$graph[3][5] = 0;
$graph[3][6] = 1;

$graph[4][0] = 0;
$graph[4][1] = 0;
$graph[4][2] = 3;
$graph[4][3] = 0;
$graph[4][4] = 0;
$graph[4][5] = 2;
$graph[4][6] = 0;

$graph[5][0] = 0;
$graph[5][1] = 3;
$graph[5][2] = 0;
$graph[5][3] = 0;
$graph[5][4] = 2;
$graph[5][5] = 0;
$graph[5][6] = 1;

$graph[6][0] = 0;
$graph[6][1] = 0;
$graph[6][2] = 0;
$graph[6][3] = 1;
$graph[6][4] = 0;
$graph[6][5] = 1;
$graph[6][6] = 0;

Dijkstras($graph, 7, 0);

/* 
// Dijkstra's Algorithm in C

#include <stdio.h>
#define INFINITY 9999
#define MAX 10

void Dijkstra(int Graph[MAX][MAX], int n, int start);

void Dijkstra(int Graph[MAX][MAX], int n, int start) {
  int cost[MAX][MAX], distance[MAX], pred[MAX];
  int visited[MAX], count, mindistance, nextnode, i, j;

  // Creating cost matrix
  for (i = 0; i < n; i++)
    for (j = 0; j < n; j++)
      if (Graph[i][j] == 0)
        cost[i][j] = INFINITY;
      else
        cost[i][j] = Graph[i][j];

  for (i = 0; i < n; i++) {
    distance[i] = cost[start][i];
    pred[i] = start;
    visited[i] = 0;
  }

  distance[start] = 0;
  visited[start] = 1;
  count = 1;

  while (count < n - 1) {
    mindistance = INFINITY;

    for (i = 0; i < n; i++)
      if (distance[i] < mindistance && !visited[i]) {
        mindistance = distance[i];
        nextnode = i;
      }

    visited[nextnode] = 1;
    for (i = 0; i < n; i++)
      if (!visited[i])
        if (mindistance + cost[nextnode][i] < distance[i]) {
          distance[i] = mindistance + cost[nextnode][i];
          pred[i] = nextnode;
        }
    count++;
  }

  // Printing the distance
  for (i = 0; i < n; i++)
    if (i != start) {
      printf("\nDistance from source to %d: %d", i, distance[i]);
    }
}
int main() {
  int Graph[MAX][MAX], i, j, n, u;
  n = 7;

  Graph[0][0] = 0;
  Graph[0][1] = 0;
  Graph[0][2] = 1;
  Graph[0][3] = 2;
  Graph[0][4] = 0;
  Graph[0][5] = 0;
  Graph[0][6] = 0;

  Graph[1][0] = 0;
  Graph[1][1] = 0;
  Graph[1][2] = 2;
  Graph[1][3] = 0;
  Graph[1][4] = 0;
  Graph[1][5] = 3;
  Graph[1][6] = 0;

  Graph[2][0] = 1;
  Graph[2][1] = 2;
  Graph[2][2] = 0;
  Graph[2][3] = 1;
  Graph[2][4] = 3;
  Graph[2][5] = 0;
  Graph[2][6] = 0;

  Graph[3][0] = 2;
  Graph[3][1] = 0;
  Graph[3][2] = 1;
  Graph[3][3] = 0;
  Graph[3][4] = 0;
  Graph[3][5] = 0;
  Graph[3][6] = 1;

  Graph[4][0] = 0;
  Graph[4][1] = 0;
  Graph[4][2] = 3;
  Graph[4][3] = 0;
  Graph[4][4] = 0;
  Graph[4][5] = 2;
  Graph[4][6] = 0;

  Graph[5][0] = 0;
  Graph[5][1] = 3;
  Graph[5][2] = 0;
  Graph[5][3] = 0;
  Graph[5][4] = 2;
  Graph[5][5] = 0;
  Graph[5][6] = 1;

  Graph[6][0] = 0;
  Graph[6][1] = 0;
  Graph[6][2] = 0;
  Graph[6][3] = 1;
  Graph[6][4] = 0;
  Graph[6][5] = 1;
  Graph[6][6] = 0;

  u = 0;
  Dijkstra(Graph, n, u);

  return 0;
}
*/