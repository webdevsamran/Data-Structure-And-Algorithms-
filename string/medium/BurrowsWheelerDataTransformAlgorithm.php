<?php

class rotation{
    public $index;
    public $suffix;

    function __construct($index,$suffix)
    {
        $this->index = $index;
        $this->suffix = $suffix;
    }
}

function cmpfunc($a,$b){
    return strcmp($b->suffix,$a->suffix);
}

function computeSuffixArray($input,$len){
    $suff = array();

    for($i = 0; $i < $len; $i++){
        $rot = new rotation($i,($input.(string)$i));
        array_push($suff,$rot);
    }

    echo "<pre>";
    print_r($suff);

    usort($suff,"cmpfunc");

    print_r($suff);
}

$input_text = "banana$";
$len_text = strlen($input_text);

$suffix_arr = computeSuffixArray($input_text, $len_text);

// Rbwt_arr = findLastChar($input_text, $suffix_arr, $len_text);

echo "Input text : " . $input_text ."<br/>";
// echo "Burrows - Wheeler Transform : ". $bwt_arr . "<br/>";