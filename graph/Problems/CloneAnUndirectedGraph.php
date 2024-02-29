<?php
error_reporting(0);

class GraphNode{
    public $val;
    public $neighbours;
}

function buildGraph(){
    $node1 = new GraphNode();
    $node1->val = 1;
    $node2 = new GraphNode();
    $node2->val = 2;
    $node3 = new GraphNode();
    $node3->val = 3;
    $node4 = new GraphNode();
    $node4->val = 4;
    $v = array();
    array_push($v,$node2);
    array_push($v,$node4);
    $node1->neighbours = $v;
    $v = array();
    array_push($v,$node1);
    array_push($v,$node3);
    $node2->neighbours = $v;
    $v = array();
    array_push($v,$node2);
    array_push($v,$node4);
    $node3->neighbours = $v;
    $v = array();
    array_push($v,$node3);
    array_push($v,$node1);
    $node4->neighbours = $v;
    return $node1;
}

function bfs($src){
    $visit = array();
    $visit[serialize($src)] = true;
    $queue = new SplQueue;
    $queue->enqueue($src);

    while(!$queue->isEmpty()){
        $u = $queue->dequeue();
        echo "Value of Node " . $u->val . "<br/>";
        $v = $u->neighbours;
        $size = sizeof($v);
        for($i = 0; $i < $size; $i++){
            if(!$visit[serialize($v[$i])]){
                $visit[serialize($v[$i])] = true;
                $queue->enqueue($v[$i]);
            }
        }
    }
    echo "<br/>";
}

function cloneGraph($src){
    $map = array();
    $queue = new SplQueue;
    $queue->enqueue($src);
    $node = new GraphNode();
    $node->val = $src->val;
    $map[serialize($src)] = $node;

    while(!$queue->isEmpty()){
        $u = $queue->dequeue();
        $v = $u->neighbours;
        $n = sizeof($v);
        for($i = 0; $i < $n; $i++){
            if(!array_key_exists(serialize($v[$i]),$map)){
                $node = new GraphNode();
                $node->val = $v[$i]->val;
                $map[serialize($v[$i])] = $node;
                $queue->enqueue($v[$i]);
            }
            $map[serialize($u)]->neighbours[] = $map[serialize($v[$i])];
        }
    }

    return $map[serialize($src)];
}

$src = buildGraph();
echo "BFS Traversal before cloning.<br/>";
bfs($src);
$newsrc = cloneGraph($src);
echo "BFS Traversal after cloning.<br/>";
bfs($newsrc);