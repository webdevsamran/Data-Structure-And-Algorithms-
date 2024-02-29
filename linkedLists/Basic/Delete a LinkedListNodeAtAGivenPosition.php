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

    public function deleteNode($position)
    {
        $temp = NULL;
        $temp = $this->head;
        if ($position == 0) {
            $this->head = $temp->next;
            $temp = NULL;
            return;
        }
        for ($i = 0; $temp != NULL && $i < $position - 1; $i++) {
            $temp = $temp->next;
        }
        if ($temp == NULL || $temp->next == NULL) {
            return;
        }
        $next = $temp->next->next;
        $temp->next = NULL;
        $temp->next = $next;
        return;
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
}


$my_list = new singleLinkedList();
$my_list->insert(1);
$my_list->insert(2);
$my_list->insert(3);
$my_list->insert(4);
$my_list->printList();
$my_list->deleteNode(3);
$my_list->printList();
