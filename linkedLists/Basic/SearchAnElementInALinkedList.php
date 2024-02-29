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

    public function search($data)
    {
        $list = $this->head;
        while ($list->next != NULL) {
            if ($list->data == $data) {
                echo "Yes";
                return;
            }
            $list = $list->next;
        }
        echo "No";
        return;
    }

    public function search_rec($head, $data)
    {
        if ($head == NULL) {
            echo "Not Found";
            return;
        }
        if ($head->data == $data) {
            echo "Yes! Found";
            return;
        }
        $this->search_rec($head->next, $data);
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
echo "<br/>";
$my_list->search(2);
echo "<br/>";
$my_list->search_rec($my_list->head, 3);
echo "<br/>";
$my_list->search_rec($my_list->head, 5);
