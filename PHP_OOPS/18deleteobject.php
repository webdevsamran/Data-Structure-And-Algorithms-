<?php

class Test{
    function test(){
        echo "Hi";
    }
}

$test = new Test;
$test->test();
unset($test);