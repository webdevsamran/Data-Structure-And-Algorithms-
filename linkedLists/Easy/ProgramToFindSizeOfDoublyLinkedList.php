<?php

class Node
{
    public $data;
    public $next;
    public $prev;
}

class doubleLinkedList
{
    public $head;

    function __construct()
    {
        $this->head = NULL;
    }

    public function insertBeginning($data)
    {
        $node = new Node;
        $node->data = $data;
        $node->next = $this->head;
        $node->prev = NULL;
        if ($this->head != NULL) {
            $this->head->prev = $node;
        }
        $this->head = $node;
    }

    public function len()
    {
        $len = 0;
        $list = $this->head;
        while ($list != NULL) {
            $len++;
            $list = $list->next;
        }
        echo $len;
    }

    public function print_list_b_e()
    {
        $temp = new Node;
        $temp = $this->head;
        if ($temp == NULL) {
            echo "Double Linked List is Empty<br/>\n";
        } else {
            echo "Double Linked List Contains Elements From Beginning TO End: ";
            while ($temp != NULL) {
                echo $temp->data . " ";
                $temp = $temp->next;
            }
            echo "<br/>\n";
        }
    }

    public function print_list_e_b()
    {
        $temp = new Node;
        $temp = $this->head;
        if ($temp == NULL) {
            echo "Double Linked List is Empty<br/>\n";
        } else {
            while ($temp->next != NULL) {
                $temp = $temp->next;
            }
            echo "Double Linked List Contains Elements From End TO Beginning: ";
            while ($temp != NULL) {
                echo $temp->data . " ";
                $temp = $temp->prev;
            }
            echo "<br/>\n";
        }
    }
}

$my_list = new DoubleLinkedList();
$my_list->insertBeginning(1);
$my_list->insertBeginning(2);
$my_list->insertBeginning(3);
$my_list->insertBeginning(4);
$my_list->print_list_b_e();
$my_list->len();
