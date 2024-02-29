<?php

class FileLogger implements LoggerInterface{
    public function log($message){
        echo "Log Message For File : " . $message;
    }
}