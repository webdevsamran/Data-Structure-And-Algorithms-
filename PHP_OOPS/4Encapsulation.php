<?php

class Mobile{
    protected $model;
    private $volume;

    function __construct($m, $v)
    {
        $this->model = $m;
        $this->volume = $v;
    }

    function getVolume(){
        return $this->volume;
    }

    function volumeUp(){
        $this->volume++;
    }

    function volumeDown(){
        $this->volume--;
    }
}

class sony extends Mobile{
    function getModel(){
        return $this->model;
    }
}

$mb = new sony('ABC',1);
echo $mb->getModel();