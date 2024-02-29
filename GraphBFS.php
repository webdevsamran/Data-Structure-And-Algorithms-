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

    public function BFS($startVertex): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            $this->visited[$i] = false;
        }
        $this->visited[$startVertex] = true;
        $queue = new SplQueue();
        $queue->enqueue($startVertex);
        while (!$queue->isEmpty()) {
            $ele = $queue->dequeue();
            echo $ele . " ";
            if (!array_key_exists($ele, $this->vertices)) {
                continue;
            }
            $vertice = $this->vertices[$ele];
            foreach ($vertice as $ver) {
                if (!$this->visited[$ver]) {
                    $this->visited[$ver] = true;
                    $queue->enqueue($ver);
                }
            }
        }
        echo "<br/>";
    }

    public function DFS($startVertex): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            $this->visited[$i] = false;
        }
        $this->visited[$startVertex] = true;
        $stack = new SplStack();
        $stack->push($startVertex);
        while (!$stack->isEmpty()) {
            $ele = $stack->top();
            $stack->pop();
            echo $ele . " ";
            if (!array_key_exists($ele, $this->vertices)) {
                continue;
            }
            $vertice = $this->vertices[$ele];
            foreach ($vertice as $ver) {
                if (!$this->visited[$ver]) {
                    $this->visited[$ver] = true;
                    $stack->push($ver);
                }
            }
        }
        echo "<br/>";
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
$graph->BFS(0);
$graph->DFS(0);

/* 
// BFS algorithm in C++

#include <iostream>
#include <list>

using namespace std;

class Graph {
  int numVertices;
  list<int>* adjLists;
  bool* visited;

   public:
  Graph(int vertices);
  void addEdge(int src, int dest);
  void BFS(int startVertex);
};

// Create a graph with given vertices,
// and maintain an adjacency list
Graph::Graph(int vertices) {
  numVertices = vertices;
  adjLists = new list<int>[vertices];
}

// Add edges to the graph
void Graph::addEdge(int src, int dest) {
  adjLists[src].push_back(dest);
  adjLists[dest].push_back(src);
}

// BFS algorithm
void Graph::BFS(int startVertex) {
  visited = new bool[numVertices];
  for (int i = 0; i < numVertices; i++)
    visited[i] = false;

  list<int> queue;

  visited[startVertex] = true;
  queue.push_back(startVertex);

  list<int>::iterator i;

  while (!queue.empty()) {
    int currVertex = queue.front();
    cout << "Visited " << currVertex << " ";
    queue.pop_front();

    for (i = adjLists[currVertex].begin(); i != adjLists[currVertex].end(); ++i) {
      int adjVertex = *i;
      if (!visited[adjVertex]) {
        visited[adjVertex] = true;
        queue.push_back(adjVertex);
      }
    }
  }
}

int main() {
  Graph g(4);
  g.addEdge(0, 1);
  g.addEdge(0, 2);
  g.addEdge(1, 2);
  g.addEdge(2, 0);
  g.addEdge(2, 3);
  g.addEdge(3, 3);

  g.BFS(2);

  return 0;
}
*/