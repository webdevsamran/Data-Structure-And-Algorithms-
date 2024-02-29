<?php

/* class abc{
    public static $data = 'xyz';
    public static function def(){
        return self::$data;
    }
}

class a extends abc{
    public static function xyz(){
        parent::def();
    }
}

echo a::xyz(); */

class car{
    public static $objCount = 0;
    public function getCount(){
        return self::$objCount;
    }
    public function __construct()
    {
        self::$objCount++;
    }
}
$a = new car;
$b = new car;
$c = new car;
echo $a->getCount();
// echo $b->getCount();
// echo $c->getCount();