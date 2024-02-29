<?php

/* class Logger{
    public function log($message){
        echo "Log Message: " . $message;
    }
}

class profile{
    public function insert(){
        // insert query message
        $logger = new Logger;
        echo $logger->log("Profile Inserted Successfully");
    }
    
    public function update(){
        //  update query message
        $logger = new Logger;
        echo $logger->log("Profile Updated Successfully");
    }

    public function select(){
        // select query message
        $logger = new Logger;
        echo $logger->log("Profile Selected Successfully");
    }
}


$profile = new profile;
echo $profile->insert(); */

class Logger{
    public function log($message){
        echo "Log Message: " . $message;
    }
}

class profile{
    private $logger;
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function insert(){
        // insert query message
        echo $this->logger->log("Profile Inserted Successfully");
    }
    
    public function update(){
        //  update query message
        echo $this->logger->log("Profile Updated Successfully");
    }

    public function select(){
        // select query message
        echo $this->logger->log("Profile Selected Successfully");
    }
}

$logger = new Logger;
$profile = new profile($logger);
echo $profile->insert();