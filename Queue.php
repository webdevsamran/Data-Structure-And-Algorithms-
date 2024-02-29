<?php

class Queue{
    public $front;
    public $rear;
    public $queue;
    public $queue_size;

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
        if($this->front == 0 && $this->rear == $this->queue_size-1){
            return true;
        }
        return false;
    }

    public function enqueue($x){
        if($this->isFull()){
            echo "Queue is Full\n";
            return;
        }
        if($this->front == -1){
            $this->front = 0;
        }
        $this->rear++;
        $this->queue[$this->rear] = $x;
    }

    public function dequeue(){
        if($this->isEmpty()){
            echo "Queue is Empty\n";
            return;
        }
        $x = $this->queue[$this->front];
        if($this->front >= $this->rear){
            $this->front = -1;
            $this->rear = -1;
        }else{
            $this->front++;
        }
        echo $x." is the element dequeued\n";
    }

    public function front(){
        echo $this->queue[$this->front]." is the front element in the queue";
    }

    public function print_queue(){
        if($this->front == -1){
            echo "Queue is Empty\n";
        }else{
            echo "Elements in Queue are: ";
            for($i = $this->front; $i <= $this->rear; $i++){
                echo $this->queue[$i]." ";
            }
            echo "\n";
        }
    }
}

$MyQueue = new Queue(3);
$MyQueue->enqueue(10);
$MyQueue->enqueue(20);
$MyQueue->enqueue(30);
$MyQueue->enqueue(40);

$MyQueue->dequeue();
$MyQueue->dequeue();
$MyQueue->print_queue();

/* 
// Queue implementation in C++

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

  bool isFull() {
    if (front == 0 && rear == SIZE - 1) {
      return true;
    }
    return false;
  }

  bool isEmpty() {
    if (front == -1)
      return true;
    else
      return false;
  }

  void enQueue(int element) {
    if (isFull()) {
      cout << "Queue is full";
    } else {
      if (front == -1) front = 0;
      rear++;
      items[rear] = element;
      cout << endl
         << "Inserted " << element << endl;
    }
  }

  int deQueue() {
    int element;
    if (isEmpty()) {
      cout << "Queue is empty" << endl;
      return (-1);
    } else {
      element = items[front];
      if (front >= rear) {
        front = -1;
        rear = -1;
      } // Q has only one element, so we reset the queue after deleting it. //
      else {
        front++;
      }
      cout << endl
         << "Deleted -> " << element << endl;
      return (element);
    }
  }

  void display() {
    // Function to display elements of Queue 
    int i;
    if (isEmpty()) {
      cout << endl
         << "Empty Queue" << endl;
    } else {
      cout << endl
         << "Front index-> " << front;
      cout << endl
         << "Items -> ";
      for (i = front; i <= rear; i++)
        cout << items[i] << "  ";
      cout << endl
         << "Rear index-> " << rear << endl;
    }
  }
};

int main() {
  Queue q;

  //deQueue is not possible on empty queue
  q.deQueue();

  //enQueue 5 elements
  q.enQueue(1);
  q.enQueue(2);
  q.enQueue(3);
  q.enQueue(4);
  q.enQueue(5);

  // 6th element can't be added to because the queue is full
  q.enQueue(6);

  q.display();

  //deQueue removes element entered first i.e. 1
  q.deQueue();

  //Now we have just 4 elements
  q.display();

  return 0;
}
*/