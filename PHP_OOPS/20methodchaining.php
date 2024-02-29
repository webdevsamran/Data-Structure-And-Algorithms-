<?php

class abc{
    function A(){
        echo "Method A<br/>";
        return $this;
    }
    function B(){
        echo "Method B<br/>";
        return $this;
    }
    function C(){
        echo "Method C<br/>";
    }
}

$obj = new abc;
$obj->A()->B()->C();