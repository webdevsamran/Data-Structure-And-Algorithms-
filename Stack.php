<?php

class Stack{
    public $top;
    public $stack;
    public $stack_size;

    function __construct($size){
        $this->top = -1;
        $this->stack_size = $size;
        $this->stack = new SplFixedArray($size);
    }

    public function isEmpty(){
        if($this->top == -1){
            return true;
        }
        return false;
    }

    public function isFull(){
        if($this->top == $this->stack_size - 1){
            return true;
        }
        return false;
    }

    public function push($x){
        if($this->isFull()){
            echo "Stack is Full \n";
            return;
        }
        $this->stack[++$this->top] = $x;
    }

    public function pop(){
        if($this->isEmpty()){
            echo "Stack is Empty\n";
            return;
        }
        $x = $this->stack[$this->top--];
        echo $x." is the element popped";
    }

    public function top(){
        if($this->isEmpty()){
            echo "Stack is Empty\n";
            return;
        }
        echo $this->stack[$this->top];
    }

    public function print_stack(){
        if($this->isEmpty()){
            echo "Stack is Empty\n";
            return;
        }
        echo "Element in Stack are: ";
        for($i = 0; $i <= $this->top; $i++){
            echo $this->stack[$i]." ";
        }
        echo "\n";
    }
}

$MyStack = new Stack(3);
$MyStack->push(10);
$MyStack->push(20);
$MyStack->push(30);
$MyStack->push(40);

$MyStack->pop();
$MyStack->print_stack();


/* 
// Stack implementation in C++

#include <stdlib.h>
#include <iostream>

using namespace std;

#define MAX 10
int size = 0;

// Creating a stack
struct stack {
  int items[MAX];
  int top;
};
typedef struct stack st;

void createEmptyStack(st *s) {
  s->top = -1;
}

// Check if the stack is full
int isfull(st *s) {
  if (s->top == MAX - 1)
    return 1;
  else
    return 0;
}

// Check if the stack is empty
int isempty(st *s) {
  if (s->top == -1)
    return 1;
  else
    return 0;
}

// Add elements into stack
void push(st *s, int newitem) {
  if (isfull(s)) {
    cout << "STACK FULL";
  } else {
    s->top++;
    s->items[s->top] = newitem;
  }
  size++;
}

// Remove element from stack
void pop(st *s) {
  if (isempty(s)) {
    cout << "\n STACK EMPTY \n";
  } else {
    cout << "Item popped= " << s->items[s->top];
    s->top--;
  }
  size--;
  cout << endl;
}

// Print elements of stack
void printStack(st *s) {
  printf("Stack: ");
  for (int i = 0; i < size; i++) {
    cout << s->items[i] << " ";
  }
  cout << endl;
}

// Driver code
int main() {
  int ch;
  st *s = (st *)malloc(sizeof(st));

  createEmptyStack(s);

  push(s, 1);
  push(s, 2);
  push(s, 3);
  push(s, 4);

  printStack(s);

  pop(s);

  cout << "\nAfter popping out\n";
  printStack(s);
}
*/