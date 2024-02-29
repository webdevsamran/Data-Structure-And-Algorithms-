<?php

class Mobile{
    public $model;
    public $volume;

    function __construct($model = NULL, $volume = NULL)
    {
        $this->model = $model;
        $this->volume = $volume;
    }

    function VolumeUp(){
        $this->volume++;
    }

    function VolumeDown(){
        $this->volume--;
    }
}

$mb_one = new Mobile('Samian', 10);
echo $mb_one->model;
$mb_one->VolumeDown();
echo $mb_one->volume;