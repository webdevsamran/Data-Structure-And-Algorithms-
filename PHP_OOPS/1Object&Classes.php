<?php

class Mobile{
    public $model = "XYZ";
    public $volume = 1;

    public function VolumeUp(){
        $this->volume++;
    }

    public function VolumeDown(){
        $this->volume--;
    }
}

$mb_one = new Mobile;
echo $mb_one->model;
$mb_one->VolumeUp();
echo $mb_one->volume;
$mb_one->VolumeDown();
echo $mb_one->volume;