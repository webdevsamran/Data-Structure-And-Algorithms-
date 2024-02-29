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

    public function len()
    {
        $len = 0;
        $list = $this->head;
        while ($list != NULL) {
            $len++;
            $list = $list->next;
        }
        return $len;
    }

    public function getNthNodeFromEnd($positionFromEnd)
    {
        $length = $this->len();
        $list = $this->head;
        for ($i = 1; $i <= $length; $i++) {
            if ($i == ($length - $positionFromEnd + 1)) {
                echo "The Node is: " . $list->data;
                return;
            }
            $list = $list->next;
        }
        echo "The Node is not Present";
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
$my_list->getNthNodeFromEnd(4);
