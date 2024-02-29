<?php

/* 
Kruskal's Algorithm Complexity
The time complexity Of Kruskal's Algorithm is: O(E log E).
*/

class Edge
{
    public $Source;
    public $Destination;
    public $Weight;
};

class Graph
{
    public $verticesCount;
    public $edgesCount;
    public $edge = array();

    function __construct($verticesCount, $edgesCount)
    {
        $this->verticesCount = $verticesCount;
        $this->edgesCount = $edgesCount;
        $this->edge = array();

        for ($i = 0; $i < $edgesCount; $i++) {
            $this->edge[$i] = new Edge();
        }
    }
};

class Subset
{
    public $parent;
    public $rank;
};

function prePrint($arr): void
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function createGraph($verticesCount, $edgesCount)
{
    $graph = new Graph($verticesCount, $edgesCount);
    return $graph;
}

function find($subset, $i)
{
    if ($subset[$i]->parent != $i) {
        $subset[$i]->parent = find($subset, $subset[$i]->parent);
    }
    return $subset[$i]->parent;
}

function union($subset, $x, $y)
{
    $xroot = find($subset, $x);
    $yroot = find($subset, $y);

    if ($subset[$xroot]->rank < $subset[$yroot]->rank) {
        $subset[$xroot]->parent = $yroot;
    } else if ($subset[$xroot]->rank > $subset[$yroot]->rank) {
        $subset[$yroot]->parent = $xroot;
    } else {
        $subset[$yroot]->parent = $xroot;
        ++$subset[$xroot]->rank;
    }
}

function compareEdges($a, $b)
{
    return $a->Weight > $b->Weight;
}

function printResult($result, $e)
{
    for ($i = 0; $i < $e; $i++) {
        echo $result[$i]->Source . " -- " . $result[$i]->Destination . " --> " . $result[$i]->Weight . "<br/>";
    }
}

function Krushkal($graph)
{
    $verticesCount = $graph->verticesCount;
    $result = array();
    $subset = array();
    $i = 0;
    $e = 0;

    usort($graph->edge, "compareEdges");
    // prePrint($graph->edge);

    for ($v = 0; $v < $verticesCount; $v++) {
        $subset[$v] = new Subset();
        $subset[$v]->parent = $v;
        $subset[$v]->rank = 0;
    }

    while ($e < $verticesCount - 1) {
        $nextEdge = $graph->edge[$i++];
        $x = find($subset, $nextEdge->Source);
        $y = find($subset, $nextEdge->Destination);

        if ($x != $y) {
            $result[$e++] = $nextEdge;
            union($subset, $x, $y);
        }
    }
    printResult($result, $e);
}

$verticesCount = 4;
$edgesCount = 5;
$graph = CreateGraph($verticesCount, $edgesCount);

// Edge 0-1
$graph->edge[0]->Source = 0;
$graph->edge[0]->Destination = 1;
$graph->edge[0]->Weight = 10;

// Edge 0-2
$graph->edge[1]->Source = 0;
$graph->edge[1]->Destination = 2;
$graph->edge[1]->Weight = 6;

// Edge 0-3
$graph->edge[2]->Source = 0;
$graph->edge[2]->Destination = 3;
$graph->edge[2]->Weight = 5;

// Edge 1-3
$graph->edge[3]->Source = 1;
$graph->edge[3]->Destination = 3;
$graph->edge[3]->Weight = 15;

// Edge 2-3
$graph->edge[4]->Source = 2;
$graph->edge[4]->Destination = 3;
$graph->edge[4]->Weight = 4;

Krushkal($graph);

/* 
// Kruskal's algorithm in C++

#include <algorithm>
#include <iostream>
#include <vector>
using namespace std;

#define edge pair<int, int>

class Graph {
   private:
  vector<pair<int, edge> > G;  // graph
  vector<pair<int, edge> > T;  // mst
  int *parent;
  int V;  // number of vertices/nodes in graph
   public:
  Graph(int V);
  void AddWeightedEdge(int u, int v, int w);
  int find_set(int i);
  void union_set(int u, int v);
  void kruskal();
  void print();
};
Graph::Graph(int V) {
  parent = new int[V];

  //i 0 1 2 3 4 5
  //parent[i] 0 1 2 3 4 5
  for (int i = 0; i < V; i++)
    parent[i] = i;

  G.clear();
  T.clear();
}
void Graph::AddWeightedEdge(int u, int v, int w) {
  G.push_back(make_pair(w, edge(u, v)));
}
int Graph::find_set(int i) {
  // If i is the parent of itself
  if (i == parent[i])
    return i;
  else
    // Else if i is not the parent of itself
    // Then i is not the representative of his set,
    // so we recursively call Find on its parent
    return find_set(parent[i]);
}

void Graph::union_set(int u, int v) {
  parent[u] = parent[v];
}
void Graph::kruskal() {
  int i, uRep, vRep;
  sort(G.begin(), G.end());  // increasing weight
  for (i = 0; i < G.size(); i++) {
    uRep = find_set(G[i].second.first);
    vRep = find_set(G[i].second.second);
    if (uRep != vRep) {
      T.push_back(G[i]);  // add to tree
      union_set(uRep, vRep);
    }
  }
}
void Graph::print() {
  cout << "Edge :"
     << " Weight" << endl;
  for (int i = 0; i < T.size(); i++) {
    cout << T[i].second.first << " - " << T[i].second.second << " : "
       << T[i].first;
    cout << endl;
  }
}
int main() {
  Graph g(6);
  g.AddWeightedEdge(0, 1, 4);
  g.AddWeightedEdge(0, 2, 4);
  g.AddWeightedEdge(1, 2, 2);
  g.AddWeightedEdge(1, 0, 4);
  g.AddWeightedEdge(2, 0, 4);
  g.AddWeightedEdge(2, 1, 2);
  g.AddWeightedEdge(2, 3, 3);
  g.AddWeightedEdge(2, 5, 2);
  g.AddWeightedEdge(2, 4, 4);
  g.AddWeightedEdge(3, 2, 3);
  g.AddWeightedEdge(3, 4, 3);
  g.AddWeightedEdge(4, 2, 4);
  g.AddWeightedEdge(4, 3, 3);
  g.AddWeightedEdge(5, 2, 2);
  g.AddWeightedEdge(5, 4, 3);
  g.kruskal();
  g.print();
  return 0;
}
*/