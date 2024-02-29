<?php

class Node
{
    public $data;
    public $next;
}

class CircularLinkedList
{
    public $head;

    function __construct()
    {
        $this->head = NULL;
    }

    public function addToEmpty($data)
    {
        if ($this->head != NULL) {
            return $this->head;
        }
        $node = new Node;
        $node->data = $data;
        $this->head = $node;
        $this->head->next = $this->head;
    }

    public function addFront($data)
    {
        if ($this->head == NULL) {
            return $this->addToEmpty($data);
        }
        $node = new Node;
        $node->data = $data;
        $node->next = $this->head;
        $last = $this->head;
        do {
            $last = $last->next;
        } while ($last->next != $this->head);
        $last->next = $node;
        $this->head = $node;
    }

    public function exchangeNodes()
    {
        $first = $this->head;
        $list = $this->head->next;
        while ($list->next != $first) {
            $list = $list->next;
        }
        $temp = $list->data;
        $list->data = $first->data;
        $first->data = $temp;
        $this->head = $first;
        $this->print_list();
    }

    public function print_list()
    {
        $temp = $this->head;
        if ($temp == NULL) {
            echo "List is Empty\n<br/>";
            return;
        } else {
            echo "List Contains: \n";
            do {
                echo $temp->data . " ";
                $temp = $temp->next;
            } while ($temp != $this->head);
            echo "<br/>";
        }
    }
}

$my_list = new CircularLinkedList();
$my_list->addFront(1);
$my_list->addFront(2);
$my_list->addFront(3);
$my_list->addFront(4);
$my_list->addFront(5);
$my_list->print_list();
$my_list->exchangeNodes();
