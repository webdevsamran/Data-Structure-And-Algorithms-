<?php

trait trait1{
    private function test(){
        echo "Test Function Trait 1";
    }
}

class abc{
    use trait1{
        trait1::test as public abctest;
    }
}

$test = new abc();
$test->abctest();