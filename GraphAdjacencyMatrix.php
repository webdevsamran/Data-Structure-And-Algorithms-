<?php

class Graph
{
    public $matrix;
    public $size;

    function __construct($size)
    {
        $this->size = $size;
        $this->matrix = array();
        for ($i = 0; $i < $size; $i++) {
            $this->matrix[$i] = array();
            for ($j = 0; $j < $size; $j++) {
                $this->matrix[$i][$j] = 0;
            }
        }
    }

    public function addEdge($i, $j): void
    {
        $this->matrix[$i][$j] = 1;
        $this->matrix[$j][$i] = 1;
    }

    public function removeEdge($i, $j): void
    {
        $this->matrix[$i][$j] = 0;
        $this->matrix[$j][$i] = 0;
    }

    public function print(): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            echo $i . " => ";
            for ($j = 0; $j < $this->size; $j++) {
                echo $this->matrix[$i][$j] . " ";
            }
            echo "<br/>";
        }
    }
}

$graph = new Graph(4);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(0, 3);
$graph->addEdge(1, 0);
$graph->addEdge(1, 2);
$graph->addEdge(2, 0);
$graph->addEdge(2, 1);
$graph->addEdge(3, 0);
$graph->print();

/* 
// Adjacency Matrix representation in C++

#include <iostream>
using namespace std;

class Graph {
   private:
  bool** adjMatrix;
  int numVertices;

   public:
  // Initialize the matrix to zero
  Graph(int numVertices) {
    this->numVertices = numVertices;
    adjMatrix = new bool*[numVertices];
    for (int i = 0; i < numVertices; i++) {
      adjMatrix[i] = new bool[numVertices];
      for (int j = 0; j < numVertices; j++)
        adjMatrix[i][j] = false;
    }
  }

  // Add edges
  void addEdge(int i, int j) {
    adjMatrix[i][j] = true;
    adjMatrix[j][i] = true;
  }

  // Remove edges
  void removeEdge(int i, int j) {
    adjMatrix[i][j] = false;
    adjMatrix[j][i] = false;
  }

  // Print the martix
  void toString() {
    for (int i = 0; i < numVertices; i++) {
      cout << i << " : ";
      for (int j = 0; j < numVertices; j++)
        cout << adjMatrix[i][j] << " ";
      cout << "\n";
    }
  }

  ~Graph() {
    for (int i = 0; i < numVertices; i++)
      delete[] adjMatrix[i];
    delete[] adjMatrix;
  }
};

int main() {
  Graph g(4);

  g.addEdge(0, 1);
  g.addEdge(0, 2);
  g.addEdge(1, 2);
  g.addEdge(2, 0);
  g.addEdge(2, 3);

  g.toString();
}
*/