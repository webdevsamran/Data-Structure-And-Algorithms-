<?php

class Graph
{
    public $vertices;
    public $visited;
    public $size;

    function __construct($size)
    {
        $this->size = $size;
        $this->vertices = array();
        $this->visited = array();
    }

    public function addEdge($vertice, $edge): void
    {
        $this->vertices[$vertice][] = $edge;
    }

    public function dfsRecursive($startAtVertex): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            $this->visited[$i] = false;
        }
        $this->DFS($startAtVertex);
    }

    public function DFS($startAtVertex): void
    {
        $this->visited[$startAtVertex] = true;
        echo $startAtVertex . " ";
        if (!array_key_exists($startAtVertex, $this->vertices)) {
            return;
        }
        $vertice = $this->vertices[$startAtVertex];
        foreach ($vertice as $ver) {
            if (!$this->visited[$ver]) {
                $this->DFS($ver);
            }
        }
    }
}

$graph = new Graph(5);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(0, 3);
$graph->addEdge(1, 0);
$graph->addEdge(1, 2);
$graph->addEdge(2, 0);
$graph->addEdge(2, 1);
$graph->addEdge(2, 4);
$graph->addEdge(3, 0);
$graph->dfsRecursive(0);

/* 
// DFS algorithm in C++

#include <iostream>
#include <list>
using namespace std;

class Graph {
  int numVertices;
  list<int> *adjLists;
  bool *visited;

   public:
  Graph(int V);
  void addEdge(int src, int dest);
  void DFS(int vertex);
};

// Initialize graph
Graph::Graph(int vertices) {
  numVertices = vertices;
  adjLists = new list<int>[vertices];
  visited = new bool[vertices];
}

// Add edges
void Graph::addEdge(int src, int dest) {
  adjLists[src].push_front(dest);
}

// DFS algorithm
void Graph::DFS(int vertex) {
  visited[vertex] = true;
  list<int> adjList = adjLists[vertex];

  cout << vertex << " ";

  list<int>::iterator i;
  for (i = adjList.begin(); i != adjList.end(); ++i)
    if (!visited[*i])
      DFS(*i);
}

int main() {
  Graph g(4);
  g.addEdge(0, 1);
  g.addEdge(0, 2);
  g.addEdge(1, 2);
  g.addEdge(2, 3);

  g.DFS(2);

  return 0;
}
*/