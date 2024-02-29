<?php

define("SIZE", 6);

function BFS($rGraph, $s, $t, $parent): bool
{
    $visited = array();
    for ($i = 0; $i < SIZE; $i++) {
        $visited[$i] = false;
    }
    $visited[$s] = true;
    $parent[$s] = -1;
    $queue = new SplQueue();
    $queue->enqueue($s);
    while (!$queue->isEmpty()) {
        $u = $queue->dequeue();
        for ($v = 0; $v < SIZE; $v++) {
            if ($visited[$v] == false && $rGraph[$u][$v] > 0) {
                $visited[$v] = true;
                $parent[$v] = $u;
                $queue->enqueue($v);
            }
        }
    }
    return ($visited[$t] == true);
}

function FordFulkerson($graph, $s, $t): int
{
    $rGraph = array();
    for ($i = 0; $i < SIZE; $i++) {
        for ($j = 0; $j < SIZE; $j++) {
            $rGraph[$i][$j] = $graph[$i][$j];
        }
    }
    $parent = new SplFixedArray(SIZE);
    $max_flow = 0;
    while (BFS($rGraph, $s, $t, $parent)) {
        $path_flow = PHP_INT_MAX;
        for ($v = $t; $v != $s; $v = $parent[$v]) {
            $u = $parent[$v];
            $path_flow = min($path_flow, $rGraph[$u][$v]);
        }
        for ($v = $t; $v != $s; $v = $parent[$v]) {
            $u = $parent[$v];
            $rGraph[$u][$v] -= $path_flow;
            $rGraph[$v][$u] += $path_flow;
        }
        $max_flow += $path_flow;
    }
    echo "<pre>";
    print_r($rGraph);
    echo "</pre>";
    return $max_flow;
}

$graph = [[0, 8, 0, 0, 3, 0], [0, 0, 9, 0, 0, 0], [0, 0, 0, 0, 7, 2], [0, 0, 0, 0, 0, 5], [0, 0, 7, 4, 0, 0], [0, 0, 0, 0, 0, 0]];
echo "Max Flow: " . FordFulkerson($graph, 0, 5) . "\n";

/* 
// Ford-Fulkerson algorith in C++

#include <limits.h>
#include <string.h>

#include <iostream>
#include <queue>
using namespace std;

#define V 6

// Using BFS as a searching algorithm
bool bfs(int rGraph[V][V], int s, int t, int parent[]) {
  bool visited[V];
  memset(visited, 0, sizeof(visited));

  queue<int> q;
  q.push(s);
  visited[s] = true;
  parent[s] = -1;

  while (!q.empty()) {
    int u = q.front();
    q.pop();

    for (int v = 0; v < V; v++) {
      if (visited[v] == false && rGraph[u][v] > 0) {
        q.push(v);
        parent[v] = u;
        visited[v] = true;
      }
    }
  }

  return (visited[t] == true);
}

// Applying fordfulkerson algorithm
int fordFulkerson(int graph[V][V], int s, int t) {
  int u, v;

  int rGraph[V][V];
  for (u = 0; u < V; u++)
    for (v = 0; v < V; v++)
      rGraph[u][v] = graph[u][v];

  int parent[V];
  int max_flow = 0;

  // Updating the residual values of edges
  while (bfs(rGraph, s, t, parent)) {
    int path_flow = INT_MAX;
    for (v = t; v != s; v = parent[v]) {
      u = parent[v];
      path_flow = min(path_flow, rGraph[u][v]);
    }

    for (v = t; v != s; v = parent[v]) {
      u = parent[v];
      rGraph[u][v] -= path_flow;
      rGraph[v][u] += path_flow;
    }

    // Adding the path flows
    max_flow += path_flow;
  }

  return max_flow;
}

int main() {
  int graph[V][V] = {{0, 8, 0, 0, 3, 0},
             {0, 0, 9, 0, 0, 0},
             {0, 0, 0, 0, 7, 2},
             {0, 0, 0, 0, 0, 5},
             {0, 0, 7, 4, 0, 0},
             {0, 0, 0, 0, 0, 0}};

  cout << "Max Flow: " << fordFulkerson(graph, 0, 5) << endl;
}
*/