<?php

class m_parent{
    function test(){
        echo "This is Parent Test";
    }
}

class m_child extends m_parent{
    function test(){
        echo "This is Child Test";
        parent::test();
    }
}

$test = new m_child;
$test->test();