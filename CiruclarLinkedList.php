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
        $node->next = $this->head->next;
        $this->head->next = $node;
    }

    public function addAfter($position, $data)
    {
        if ($position == NULL) {
            echo "Node can't be NULL/EMPTY<br/>\n";
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

        $temp = new Node;
        $temp = $this->head;
        $ptr = $temp;
        $temp = $temp->next;
        while ($temp->next != $ptr) {
            $temp = $temp->next;
        }

        $node = new Node;
        $node->data = $data;
        $node->next = $temp->next;
        $temp->next = $node;
    }

    public function deleteNode($data)
    {
        if ($this->head == NULL) {
            echo "Node can't be NULL/EMPTY<br/>\n";
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
        $ptr = $temp;
        $temp = $temp->next;
        $prev = NULL;

        while ($temp->next != $ptr && $temp->data != $data) {
            $prev = $temp;
            $temp = $temp->next;
        }

        $prev->next = $temp->next;
        $temp = NULL;
    }

    public function print_list()
    {
        $temp = new Node;
        $temp = $this->head;
        $ptr = $temp;
        if ($temp == NULL) {
            echo "Circular Linked Lost is Empty<br/>\n";
        } else {
            echo "Circular Linked List contains Elements: \n";
            echo $ptr->data . " ";
            $temp = $temp->next;
            while ($temp != NULL && $temp != $ptr) {
                echo $temp->data . " ";
                $temp = $temp->next;
            }
            echo "<br/>\n";
        }
    }
}

$my_list = new CircularLinkedList();
$my_list->addFront(1);
$my_list->addFront(2);
$my_list->addFront(3);
$my_list->addFront(4);
$my_list->addFront(5);
// $my_list->addEnd(6);
// $my_list->addEnd(7);
// $my_list->addAfter($my_list->head->next,9);
$my_list->print_list();
// $my_list->deleteNode(1);
// $my_list->print_list();
// $my_list->deleteNode(7);
// $my_list->print_list();