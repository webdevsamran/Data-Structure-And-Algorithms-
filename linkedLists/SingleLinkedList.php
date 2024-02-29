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

    public function insertStart($data)
    {
        $node = new Node;
        $node->data = $data;
        $node->next = $this->head;
        $this->head = $node;
    }

    public function insertAfter($position, $data)
    {
        if ($position == NULL) {
            echo "Node can't be NULL\n<br/>";
            return;
        }
        $node = new Node;
        $node->data = $data;
        $node->next = $position->next;
        $position->next = $node;
    }

    public function insertEnd($data)
    {
        $node = new Node;
        $node->data = $data;
        $node->next = NULL;
        $last = $this->head;
        if ($last == NULL) {
            $last = $node;
            return;
        }
        while ($last->next != NULL) {
            $last = $last->next;
        }
        $last->next = $node;
    }

    public function deleteNode($data)
    {
        $temp = NULL;
        $prev = new Node;
        $temp = $this->head;
        if ($temp != NULL && $temp->data == $data) {
            $this->head = $temp->next;
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
        $prev->next = $temp->next;
        $temp = NULL;
        return;
    }

    public function searchNode($data)
    {
        $temp = NULL;
        $temp = $this->head;
        while ($temp != NULL) {
            if ($temp->data == $data) {
                echo "It is Present<br/>\n";
                break;
            }
            $temp = $temp->next;
        }
    }

    public function sorting()
    {
        $current = NULL;
        $current = $this->head;
        if ($current == NULL) {
            return;
        }
        while ($current != NULL) {
            $curr = $current->next;
            while ($curr != NULL) {
                if ($current->data > $curr->data) {
                    $temp = $current->data;
                    $current->data = $curr->data;
                    $curr->data = $temp;
                }
                $curr = $curr->next;
            }
            $current = $current->next;
        }
    }

    public function printSingleLinkedList()
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
}


$my_list = new singleLinkedList();
$my_list->insertStart(1);
$my_list->insertStart(2);
$my_list->insertEnd(3);
$my_list->insertAfter($my_list->head, 4);
$my_list->printSingleLinkedList();
$my_list->deleteNode(1);
$my_list->printSingleLinkedList();
$my_list->searchNode(2);
$my_list->sorting();
$my_list->printSingleLinkedList();
