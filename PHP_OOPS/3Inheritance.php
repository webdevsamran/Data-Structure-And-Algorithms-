<?php

class Mobile{
    public $model;
    public $volume;

    function __construct($m, $v)
    {
        $this->model = $m;
        $this->volume = $v;
    }

    function volumeUp(){
        $this->volume++;
    }

    function volumeDown(){
        $this->volume--;
    }
}

class sony extends Mobile{
    function sleep_mode(){
        echo "Mobile Auto Shutdown after 10 mins";
    }
}

$mb_one = new sony('Samian', 10);
echo $mb_one->model;
echo $mb_one->volume;
$mb_one->sleep_mode();
$mb_one->volumeUp();
echo $mb_one->volume;