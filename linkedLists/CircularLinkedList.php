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

    public function addAfter($position, $data)
    {
        if ($position == NULL) {
            echo "Node can't be NULL\n";
            return;
        }
        $node = new Node;
        $node->data = $data;
        $node->next = $position->next;
        $position->next = $node;
    }

    public function addEnd($data)
    {
        if ($this->head == NULL) {
            return $this->addToEmpty($data);
        }
        $temp = $this->head;
        do {
            $temp = $temp->next;
        } while ($temp->next != $this->head);
        $node = new Node;
        $node->data = $data;
        $node->next = $temp->next;
        $temp->next = $node;
    }

    public function deleteNode($data)
    {
        if ($this->head == NULL) {
            echo "Node can't be NULL\n<br/>";
            return;
        }
        if ($this->head->next == $this->head && $this->head->data == $data) {
            $this->head = NULL;
            return;
        }
        if ($this->head->data == $data) {
            $ptr = $this->head;
            while ($this->head->next != $ptr) {
                $this->head = $this->head->next;
            }
            $this->head->next = $ptr->next;
            $ptr = NULL;
            return;
        }
        $temp = $this->head;
        $prev = NULL;
        do {
            $prev = $temp;
            $temp = $temp->next;
        } while ($temp->next != $this->head && $temp->data != $data);
        if ($temp->next == $this->head && $temp->data != $data) {
            return;
        }

        $prev->next = $temp->next;
        $temp = NULL;
        return;
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
$my_list->addEnd(6);
$my_list->addEnd(7);
$my_list->addAfter($my_list->head, 8);
$my_list->print_list();
$my_list->deleteNode(8);
$my_list->print_list();
