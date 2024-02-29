<?php

class profile{
    private $logger;
    public function __construct(LoggerInterface $logger)
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