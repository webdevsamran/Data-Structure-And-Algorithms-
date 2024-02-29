<?php

class Node{
    public $info;
    public $priority;
    public $prev;
    public $next;

    function __construct($n,$p)
    {
        $this->info = $n;
        $this->priority = $p;
        $this->next = $this->prev = NULL;
    }
}

function peek($fr){
    return $fr->info;
}

function isEmpty($fr){
    return ($fr == NULL);
}

function push(&$fr,&$rr,$n,$p){
    $news = new Node($n,$p);

    if($fr == NULL){
        $fr = $news;
        $rr = $news;
        $news->next = NULL;
    }else{
        if($p <= $fr->priority){
            $news->next = $fr;
            $fr->prev = $news->next;
            $fr = $news;
        }else if($p > $rr->priority){
            $news->next = NULL;
            $rr->next = $news;
            $news->prev = $rr->next;
            $rr = $news;
        }else{
            $start = $fr->next;
            while ($start->priority > $p)
                $start = $start->next;
            $start->prev->next = $news;
            $news->next = $start->prev;
            $news->prev = $start->prev->next;
            $start->prev = $news->next;
        }
    }
}

function pop(&$fr, &$rr)
{
    $temp = $fr;
    $res = $temp->info;
    $fr = $fr->next;
    $temp = NULL;
    if ($fr == NULL)
        $rr = NULL;
    return $res;
}

$front = NULL;
$rear = NULL;
push($front, $rear, 2, 3);
push($front, $rear, 3, 4);
push($front, $rear, 4, 5);
push($front, $rear, 5, 6);
push($front, $rear, 6, 7);
push($front, $rear, 1, 2);

echo pop($front, $rear) . "<br/>";
echo peek($front);