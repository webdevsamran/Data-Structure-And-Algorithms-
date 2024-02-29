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
        $list = $this->head;
        $len = 0;
        while ($list != NULL) {
            $len++;
            $list = $list->next;
        }
        echo "Length is: " . $len;
        return;
    }

    public function len_rec($node)
    {
        if ($node == NULL) {
            return 0;
        }
        return 1 + $this->len_rec($node->next);
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
$my_list->len();
echo "<br/>";
echo $my_list->len_rec($my_list->head);
