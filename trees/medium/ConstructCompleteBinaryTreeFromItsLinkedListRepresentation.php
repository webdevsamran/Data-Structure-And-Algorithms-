<?php

class BinaryTreeNode{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

class ListNode{
    public $data;
    public $next;
}

function push(&$root,$data){
    $node = new ListNode;
    $node->data = $data;
    $node->next = $root;
    $root = $node;
}

function inorderTraversal($root){
    if($root){
        inorderTraversal($root->left);
        echo $root->data." ";
        inorderTraversal($root->right);
    }
}

function convertList2Binary($list,&$root){
    if($list == NULL){
        $root = NULL;
        return $root;
    }
    $queue = new SplQueue;
    $root = new BinaryTreeNode($list->data);
    $queue->enqueue($root);
    $list = $list->next;
    while($list){
        $parent = $queue->dequeue();
        $leftChild = new BinaryTreeNode($list->data);
        $rightChild = NULL;
        $queue->enqueue($leftChild);
        $list = $list->next;
        if($list){
            $rightChild = new BinaryTreeNode($list->data);
            $queue->enqueue($rightChild);
            $list = $list->next;
        }
        $parent->left = $leftChild;
        $parent->right = $rightChild;
    }
}

$head = NULL;
push($head, 36);  /* Last node of Linked List */
push($head, 30);
push($head, 25);
push($head, 15);
push($head, 12);
push($head, 10); /* First node of Linked List */

$root = NULL;
convertList2Binary($head, $root);

echo "Inorder Traversal of the constructed Binary Tree is: <br/>\n";
inorderTraversal($root);