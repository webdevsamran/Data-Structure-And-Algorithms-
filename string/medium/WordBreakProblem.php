<?php

error_reporting(0);

define('ALPHABET_SIZE',26);

class Trie{
    public $children;
    public $isEndOfWord;

    function __construct()
    {
        $this->children = new SplFixedArray(ALPHABET_SIZE);
        $this->isEndOfWord = NULL;
    }
}

function getTrieNode(){
    $pNode = new Trie;
    $pNode->isEndOfWord = false;
    for($i = 0; $i < ALPHABET_SIZE; $i++){
        $pNode->children[$i] = NULL;
    }
    return $pNode;
}

function insertTrieNode(&$root,$key){
    $pCrawl = $root;
    for($i = 0; $i < strlen($key); $i++){
        $index = ord($key[$i]) - ord('a');
        if(!$pCrawl->children[$index]){
            $pCrawl->children[$index] = getTrieNode();
        }
        $pCrawl = $pCrawl->children[$index];
    }
    $pCrawl->isEndOfWord = true;
}

function searchTrieNode(&$root,$key){
    $pCrawl = $root;
    for($i = 0; $i < strlen($key); $i++){
        $index = ord($key[$i]) - ord('a');
        if(!$pCrawl->children[$index]){
            return false;
        }
        $pCrawl = $pCrawl->children[$index];
    }
    return ($pCrawl != NULL && $pCrawl->isEndOfWord);
}

function display(&$root,$str,$level){
    if($root->isEndOfWord){
        echo $str . "<br/>";
    }
    for($i = 0; $i < ALPHABET_SIZE; $i++){
        if($root->children[$i]){
            $str[$level] = chr($i + ord('a'));
            display($root->children[$i],$str,$level+1);
        }
    }
}

function wordBreak(&$str,&$root){
    $size = strlen($str);

    if($size == 0){
        return false;
    }

    for($i = 1; $i <= $size; $i++){
        $str1 = substr($str,0,$i);
        $str2 = substr($str,$i,$size-$i);
        if(searchTrieNode($root,$str1) && wordBreak($str2,$root)){
            return true;
        }
    }
    return false;
}

$dictionary = [ "mobile", "samsung", "sam", "sung", "ma", "mango", "icecream", "and", "go", "i", "like", "ice", "cream" ];
$size = sizeof($dictionary);

$root = getTrieNode();
for ($i = 0; $i < $size; $i++)
    insertTrieNode($root, $dictionary[$i]);

$str1 = "ilikesamsung";
$str2 = "iiiiiiii";
echo wordBreak($str1, $root) ? "Yes<br/>" : "No<br/>";
echo wordBreak($str2, $root) ? "Yes<br/>" : "No<br/>";

display($root,'',0);