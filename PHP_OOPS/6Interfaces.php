<?php

interface abc{
    public function test();
    public function xyz();
}

interface def{
    public function test1();
    public function xyz1();
}

class child implements abc, def{
    public function test()
    {
        echo "test";
    }

    public function xyz()
    {
        echo "xyz";
    }

    public function test1()
    {
        echo "test1";
    }

    public function xyz1()
    {
        echo "xyz1";
    }
}

$obj = new child;
$obj->test();
$obj->xyz();
$obj->test1();
$obj->xyz1();