<?php

function addEdge(&$list, $i, $j): void
{
    $list[$i][] = $j;
}

function print_list(&$list): void
{
    foreach ($list as $key => $li) {
        echo $key . " => ";
        print_r($li);
        echo "<br/>";
    }
}

$list = array();
addEdge($list, 0, 1);
addEdge($list, 0, 2);
addEdge($list, 0, 3);
addEdge($list, 1, 0);
addEdge($list, 1, 2);
addEdge($list, 2, 0);
addEdge($list, 2, 1);
addEdge($list, 2, 4);
addEdge($list, 3, 0);
print_list($list);

/* 
// Adjascency List representation in C++

#include <bits/stdc++.h>
using namespace std;

// Add edge
void addEdge(vector<int> adj[], int s, int d) {
  adj[s].push_back(d);
  adj[d].push_back(s);
}

// Print the graph
void printGraph(vector<int> adj[], int V) {
  for (int d = 0; d < V; ++d) {
    cout << "\n Vertex "
       << d << ":";
    for (auto x : adj[d])
      cout << "-> " << x;
    printf("\n");
  }
}

int main() {
  int V = 5;

  // Create a graph
  vector<int> adj[V];

  // Add edges
  addEdge(adj, 0, 1);
  addEdge(adj, 0, 2);
  addEdge(adj, 0, 3);
  addEdge(adj, 1, 2);
  printGraph(adj, V);
}
*/