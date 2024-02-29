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

    public function getMiddle()
    {
        $len = 0;
        $temp = array();
        $list = $this->head;
        while ($list != NULL) {
            $len++;
            array_push($temp, $list->data);
            $list = $list->next;
        }
        echo $temp[(int)($len / 2)];
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
$my_list->getMiddle();
