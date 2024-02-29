<?php

class Node
{
    public $data;
    public $next;
}

class singleLinkedList
{
    public $head;

    function __construct()
    {
        $this->head = NULL;
    }

    public function insert($data)
    {
        $node = new Node;
        $node->data = $data;
        $node->next = $this->head;
        $this->head = $node;
    }

    public function convertIntoCircular()
    {
        $first = $this->head;
        $list = $this->head->next;
        while ($list->next != NULL) {
            $list = $list->next;
        }
        $list->next = $first;
        echo "Successfully Converted into Circular List";
        $this->head = $first;
        $this->print_circular_list();
    }

    public function printList()
    {
        $temp = NULL;
        $temp = $this->head;
        if ($temp == NULL) {
            echo "Linked List is Empty\n<br/>";
            return;
        } else {
            echo "Linked List Contains: ";
            while ($temp != NULL) {
                echo $temp->data . " ";
                $temp = $temp->next;
            }
            echo "<br/>";
        }
    }

    public function print_circular_list()
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


$my_list = new singleLinkedList();
$my_list->insert(1);
$my_list->insert(2);
$my_list->insert(3);
$my_list->insert(4);
$my_list->printList();
$my_list->convertIntoCircular();
