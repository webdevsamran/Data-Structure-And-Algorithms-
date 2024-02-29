<?php

class CircularQueue{
    public $queue_size;
    public $queue;
    public $front;
    public $rear;

    function __construct($size){
        $this->front = -1;
        $this->rear = -1;
        $this->queue_size = $size;
        $this->queue = new SplFixedArray($size);
    }

    public function isEmpty(){
        if($this->front == -1){
            return true;
        }
        return false;
    }

    public function isFull(){
        if($this->front == 0 && $this->rear == $this->queue_size - 1){
            return true;
        }
        if($this->front == $this->rear + 1){
            return true;
        }
        return false;
    }

    public function enqueue($x){
        if($this->isFull()){
            echo "Circular Queue is Full\n";
            return;
        }
        if($this->front == -1){
            $this->front = 0;
        }
        $this->rear = ($this->rear + 1) % $this->queue_size;
        $this->queue[$this->rear] = $x;
    }

    public function dequeue(){
        if($this->isEmpty()){
            echo "Circular Queue is Empty";
            return;
        }
        $x = $this->queue[$this->front];
        if($this->front == $this->rear){
            $this->front = -1;
            $this->rear = -1;
        }else{
            $this->front = ($this->front + 1) % $this->queue_size;
        }
        echo $x." is the element dequeued.\n";
    }

    public function print_CQ(){
        if($this->isEmpty()){
            echo "Circular Queue is Empty";
            return;
        }else{
            echo "Circular Queue Elements are: ";
            for($i = $this->front; $i != $this->rear; $i = ($i + 1) % $this->queue_size){
                echo $this->queue[$i]." ";
            }
            echo $this->queue[$this->rear]." ";
            echo "\n";
        }
    }
}

$MyCQ = new CircularQueue(3);
$MyCQ->enqueue(3);
$MyCQ->enqueue(4);
$MyCQ->enqueue(5);
$MyCQ->enqueue(9);
$MyCQ->enqueue(2);

$MyCQ->print_CQ();

$MyCQ->dequeue();
$MyCQ->print_CQ();

/* 
// Circular Queue implementation in C++

#include <iostream>
#define SIZE 5 

using namespace std;

class Queue {
   private:
  int items[SIZE], front, rear;

   public:
  Queue() {
    front = -1;
    rear = -1;
  }
  // Check if the queue is full
  bool isFull() {
    if (front == 0 && rear == SIZE - 1) {
      return true;
    }
    if (front == rear + 1) {
      return true;
    }
    return false;
  }
  // Check if the queue is empty
  bool isEmpty() {
    if (front == -1)
      return true;
    else
      return false;
  }
  // Adding an element
  void enQueue(int element) {
    if (isFull()) {
      cout << "Queue is full";
    } else {
      if (front == -1) front = 0;
      rear = (rear + 1) % SIZE;
      items[rear] = element;
      cout << endl
         << "Inserted " << element << endl;
    }
  }
  // Removing an element
  int deQueue() {
    int element;
    if (isEmpty()) {
      cout << "Queue is empty" << endl;
      return (-1);
    } else {
      element = items[front];
      if (front == rear) {
        front = -1;
        rear = -1;
      }
      // Q has only one element,
      // so we reset the queue after deleting it.
      else {
        front = (front + 1) % SIZE;
      }
      return (element);
    }
  }

  void display() {
    // Function to display status of Circular Queue
    int i;
    if (isEmpty()) {
      cout << endl
         << "Empty Queue" << endl;
    } else {
      cout << "Front -> " << front;
      cout << endl
         << "Items -> ";
      for (i = front; i != rear; i = (i + 1) % SIZE)
        cout << items[i];
      cout << items[i];
      cout << endl
         << "Rear -> " << rear;
    }
  }
};

int main() {
  Queue q;

  // Fails because front = -1
  q.deQueue();

  q.enQueue(1);
  q.enQueue(2);
  q.enQueue(3);
  q.enQueue(4);
  q.enQueue(5);

  // Fails to enqueue because front == 0 && rear == SIZE - 1
  q.enQueue(6);

  q.display();

  int elem = q.deQueue();

  if (elem != -1)
    cout << endl
       << "Deleted Element is " << elem;

  q.display();

  q.enQueue(7);

  q.display();

  // Fails to enqueue because front == rear + 1
  q.enQueue(8);

  return 0;
}
*/