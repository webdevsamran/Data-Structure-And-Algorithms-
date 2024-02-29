<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function areAnagrams($root1,$root2){
    if($root1 == NULL && $root2 == NULL){
        return true;
    }

    if($root1 == NULL || $root2 == NULL){
        return false;
    }
    
    $queue1 = new SplQueue();
    $queue1->enqueue($root1);

    $queue2 = new SplQueue();
    $queue2->enqueue($root2);

    while(true){
        $n1 = $queue1->count();
        $n2 = $queue2->count();

        if($n1 != $n2){
            return false;
        }

        if($n1 == 0){
            break;
        }

        $curr_level_1 = $curr_level_2 = array();

        while($n1 > 0){
            $node1 = $queue1->dequeue();
            if($node1->left != NULL){
                $queue1->enqueue($node1->left);
            }
            if($node1->right != NULL){
                $queue1->enqueue($node1->right);
            }
            $n1--;

            $node2 = $queue2->dequeue();
            if($node2->left != NULL){
                $queue2->enqueue($node2->left);
            }
            if($node2->right != NULL){
                $queue2->enqueue($node2->right);
            }

            array_push($curr_level_1,$node1->data);
            array_push($curr_level_2,$node2->data);
        }

        sort($curr_level_1);
        sort($curr_level_2);

        if($curr_level_1 != $curr_level_2){
            return false;
        }
    }

    return true;
}

$root1 = new Node(1);
$root1->left = new Node(3);
$root1->right = new Node(2);
$root1->right->left = new Node(5);
$root1->right->right = new Node(4);

$root2 = new Node(1);
$root2->left = new Node(2);
$root2->right = new Node(3);
$root2->left->left = new Node(4);
$root2->left->right = new Node(5);
 
echo areAnagrams($root1, $root2) ? "Yes" : "No";