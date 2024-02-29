<?php

class Dequeue{
    public $queue;
    public $queue_size;
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

    public function insertFront($x){
        if($this->isFull()){
            echo "Dequeue is Full\n";
            return;
        }
        if($this->front == -1){
            $this->front = 0;
            $this->rear = 0;
        }else if($this->front == 0){
            $this->front = $this->queue_size - 1;
        }else{
            $this->front = $this->front + 1;
        }
        $this->queue[$this->front] = $x;
    }

    public function insertRear($x){
        if($this->isFull()){
            echo "Dequeue is Full\n";
            return;
        }
        if($this->front == -1){
            $this->front = 0;
            $this->rear = 0;
        }else if($this->rear == $this->queue_size - 1){
            $this->rear = 0;
        }else{
            $this->rear = $this->rear + 1;
        }
        $this->queue[$this->rear] = $x;
    }

    public function deleteFront(){
        if($this->isEmpty()){
            echo "Dequeue is Empty\n";
            return;
        }
        if($this->front == $this->rear){
            $this->front = -1;
            $this->rear = -1;
        }else if($this->front == $this->queue_size - 1){
            $this->front = 0;
        }else{
            $this->front = $this->front + 1;
        }
    }

    public function deleteRear(){
        if($this->isEmpty()){
            echo "Dequeue is Empty\n";
            return;
        }
        if($this->front == $this->rear){
            $this->front = -1;
            $this->rear = -1;
        }else if($this->rear == 0){
            $this->rear = $this->queue_size - 1;
        }else{
            $this->rear = $this->rear - 1;
        }
    }

    public function getFront(){
        if($this->isEmpty()){
            echo "Dequeue is Empty\n";
            return;
        }
        echo $this->queue[$this->front]." is the Front Element.\n";
    }

    public function getRear(){
        if($this->isEmpty()){
            echo "Dequeue is Empty\n";
            return;
        }
        echo $this->queue[$this->rear]." is the Rear Element.\n";
    }
}

$MyDequeue = new Dequeue(4);
$MyDequeue->insertRear(10);
$MyDequeue->insertRear(20);
$MyDequeue->getRear();
$MyDequeue->deleteRear();
$MyDequeue->getRear();
$MyDequeue->insertFront(40);
$MyDequeue->getFront();
$MyDequeue->deleteFront();
$MyDequeue->getFront();

/* 
// Deque implementation in C++

#include <iostream>
using namespace std;

#define MAX 10

class Deque {
  int arr[MAX];
  int front;
  int rear;
  int size;

   public:
  Deque(int size) {
    front = -1;
    rear = 0;
    this->size = size;
  }

  void insertfront(int key);
  void insertrear(int key);
  void deletefront();
  void deleterear();
  bool isFull();
  bool isEmpty();
  int getFront();
  int getRear();
};

bool Deque::isFull() {
  return ((front == 0 && rear == size - 1) ||
      front == rear + 1);
}

bool Deque::isEmpty() {
  return (front == -1);
}

void Deque::insertfront(int key) {
  if (isFull()) {
    cout << "Overflow\n"
       << endl;
    return;
  }

  if (front == -1) {
    front = 0;
    rear = 0;
  }

  else if (front == 0)
    front = size - 1;

  else
    front = front - 1;

  arr[front] = key;
}

void Deque ::insertrear(int key) {
  if (isFull()) {
    cout << " Overflow\n " << endl;
    return;
  }

  if (front == -1) {
    front = 0;
    rear = 0;
  }

  else if (rear == size - 1)
    rear = 0;

  else
    rear = rear + 1;

  arr[rear] = key;
}

void Deque ::deletefront() {
  if (isEmpty()) {
    cout << "Queue Underflow\n"
       << endl;
    return;
  }

  if (front == rear) {
    front = -1;
    rear = -1;
  } else if (front == size - 1)
    front = 0;

  else
    front = front + 1;
}

void Deque::deleterear() {
  if (isEmpty()) {
    cout << " Underflow\n"
       << endl;
    return;
  }

  if (front == rear) {
    front = -1;
    rear = -1;
  } else if (rear == 0)
    rear = size - 1;
  else
    rear = rear - 1;
}

int Deque::getFront() {
  if (isEmpty()) {
    cout << " Underflow\n"
       << endl;
    return -1;
  }
  return arr[front];
}

int Deque::getRear() {
  if (isEmpty() || rear < 0) {
    cout << " Underflow\n"
       << endl;
    return -1;
  }
  return arr[rear];
}

int main() {
  Deque dq(4);

  cout << "insert element at rear end \n";
  dq.insertrear(5);
  dq.insertrear(11);

  cout << "rear element: "
     << dq.getRear() << endl;

  dq.deleterear();
  cout << "after deletion of the rear element, the new rear element: " << dq.getRear() << endl;

  cout << "insert element at front end \n";

  dq.insertfront(8);

  cout << "front element: " << dq.getFront() << endl;

  dq.deletefront();

  cout << "after deletion of front element new front element: " << dq.getFront() << endl;
}
*/