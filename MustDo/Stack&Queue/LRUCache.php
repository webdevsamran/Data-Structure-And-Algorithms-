<?php

class LRUCache{
    public $v;
    public $f;
    public $capacity;
    public $size;
    public $queue;

    function __construct($capacity)
    {
        $this->v = array_fill(0,100001,-1);
        $this->f = array_fill(0,100001,0);
        $this->capacity = $capacity;
        $this->size = 0;
        $this->queue = new SplQueue;
    }

    function GET($key){
        if($this->v[$key] != -1){
            $this->queue->enqueue($key);
            $this->f[$key]++;
        }
        return $this->v[$key];
    }

    function SET($key, $value){
        if($this->size == $this->capacity){
            if($this->v[$key] != -1){
                $this->f[$key]++;
                $this->v[$key] = $value;
                $this->queue->enqueue($key);
            }else{
                $x = $this->queue->top();
                $this->f[$x]--;
                while($this->f[$x] > 0){
                    $this->queue->dequeue();
                    $x = $this->queue->top();
                    $this->f[$x]--;
                }
                $this->v[$x] = -1;
                $this->queue->dequeue();
                $this->v[$key] = $value;
                $this->f[$key]++;
                $this->queue->enqueue($key);
            }
        }else{
            $this->size++;
            $this->queue->enqueue($key);
            $this->v[$key] = $value;
            $this->f[$key]++;
        }
    }
}