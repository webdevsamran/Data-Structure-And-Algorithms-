<?php

spl_autoload_register('registerMyClasses');

function registerMyClasses($class){
    include "11$class.php";
}

function getLogger($type){
    return new $type;
}

$logger = getLogger('FileLogger');
$profile = new profile($logger);
echo $profile->insert();

?>