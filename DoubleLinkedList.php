<?php

class Node
{
    public $data;
    public $next;
    public $prev;
}

class DoubleLinkedList
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

    public function insertAfter($position, $data)
    {
        if ($position == NULL) {
            echo "Node is NULL/Empty\n";
            return;
        }
        $node = new Node;
        $node->data = $data;
        $node->next = $position->next;
        $position->next = $node;
        $node->prev = $position;
        if ($node->next != NULL) {
            $node->next->prev = $node;
        }
    }

    public function insertEnd($data)
    {
        $node = new Node;
        $node->data = $data;
        $node->next = NULL;

        $last = $this->head;
        while ($last->next != NULL) {
            $last = $last->next;
        }

        $last->next = $node;
        $node->prev = $last;
    }

    public function deleteNode($data)
    {
        $temp = new Node;
        $temp = $this->head;
        $prev = NULL;

        if ($temp != NULL && $temp->data == $data) {
            $this->head = $temp->next;
            $this->head->prev = NULL;
            $temp = NULL;
            return;
        }

        while ($temp != NULL && $temp->data != $data) {
            $prev = $temp;
            $temp = $temp->next;
        }

        if ($temp == NULL) {
            return;
        }

        if ($temp->next != NULL) {
            $temp->next->prev = $prev;
            $prev->next = $temp->next;

            $temp = NULL;
        }
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
$my_list->insertEnd(5);
$my_list->insertEnd(6);
$my_list->insertAfter($my_list->head->next, 10);
$my_list->print_list_b_e();
$my_list->print_list_e_b();
$my_list->deleteNode(10);
$my_list->print_list_b_e();
$my_list->print_list_e_b();
