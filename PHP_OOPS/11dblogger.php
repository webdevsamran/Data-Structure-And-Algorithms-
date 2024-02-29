<?php

class DBLogger implements LoggerInterface{
    public function log($message){
        echo "Log Message for DB : " . $message;
    }
}