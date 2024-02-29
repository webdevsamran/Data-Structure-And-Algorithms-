<?php


function shortestChainLen($start, $target, $words): int
{
    if ($start == $target) {
        return 0;
    }
    if (!in_array($target, $words)) {
        return 0;
    }
    $level = 0;
    $wordsLength = strlen($start);
    $queue = new SplQueue;
    $queue->enqueue($start);
    while (!$queue->isEmpty()) {
        $level++;
        $word = $queue->dequeue();
        for ($p = 0; $p < $wordsLength; $p++) {
            $or_char = $word[$p];
            for ($i = 97; $i <= 122; $i++) {
                $word[$p] = chr($i);
                if ($word == $target) {
                    return $level + 1;
                }
                if (!in_array($word, $words)) {
                    continue;
                }
                $key = array_search($word, $words);
                if ($key != -1) {
                    unset($words[$key]);
                }
                $queue->enqueue($word);
            }
            $word[$p] = $or_char;
        }
    }
}

$wordArr = array();
array_push($wordArr, "poon");
array_push($wordArr, "plee");
array_push($wordArr, "same");
array_push($wordArr, "poie");
array_push($wordArr, "plie");
array_push($wordArr, "poin");
array_push($wordArr, "plea");
$start = "toon";
$target = "plea";
echo "Length of shortest chain is: " . shortestChainLen($start, $target, $wordArr);
