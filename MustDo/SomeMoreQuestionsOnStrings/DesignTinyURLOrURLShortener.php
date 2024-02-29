<?php

function idToShortURL($n){
    $map = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $shortUrl = '';
    while($n){
        $shortUrl .= $map[$n % 62];
        $n = (int)($n / 62);
    }
    $shortUrl = strrev($shortUrl);
    return $shortUrl;
}

function shortURLtoID($shortUrl){
    $id = 0;
    for($i = 0; $i < strlen($shortUrl); $i++){
        if('a' <= $shortUrl[$i] && $shortUrl[$i] <= 'z'){
            $id = $id * 62 + ord($shortUrl[$i]) - ord('a');
        }
        if('A' <= $shortUrl[$i] && $shortUrl[$i] <= 'Z'){
            $id = $id * 62 + ord($shortUrl[$i]) - ord('A') + 26;
        }
        if('0' <= $shortUrl[$i] && $shortUrl[$i] <= '9'){
            $id = $id * 62 + ord($shortUrl[$i]) - ord('0') + 52;
        }
    }
    return $id;
}

$n = 12345;
$shorturl = idToShortURL($n);
echo "Generated short url is " . $shorturl . "<br/>";
echo "Id from url is " . shortURLtoID($shorturl);