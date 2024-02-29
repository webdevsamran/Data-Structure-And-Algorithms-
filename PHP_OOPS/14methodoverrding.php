<?php

trait Testt{
    function test(){
        echo "Test Function";
    }
}

class Test1{
    use Testt;
    function test(){
        echo "This is Overridden";
    }
}

class Test2{
    use Testt;
}

$test = new Test1();
$test->test();