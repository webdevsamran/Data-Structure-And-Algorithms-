<?php

trait trait1{
    function test(){
        echo "Test Function Trait 1";
    }
}

trait trait2{
    function test(){
        echo "Test Function Trait 2";
    }
}

class Test{
    use trait1, trait2{
        trait1::test insteadOf trait2;
        trait2::test as testnew;
    }
}

$test = new Test();
$test->test();
$test->testnew();