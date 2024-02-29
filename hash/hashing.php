<?php

class Hashing
{
    public $capacity;
    public $table;

    function __construct($c)
    {
        $size = $this->getPrime($c);
        $this->capacity = $size;
        $this->table = array();
    }

    public function getPrime($c): int
    {
        if ($c % 2 == 0) {
            $c++;
        }
        while (!($this->checkPrime($c))) {
            $c += 2;
        }
        return $c;
    }

    public function checkPrime($c): bool
    {
        if ($c == 0 || $c == 1) {
            return 0;
        }
        for ($i = 2; $i <= $c / 2; $i++) {
            if ($c % $i == 0) {
                return 0;
            }
        }
        return 1;
    }

    public function hashFunction($key): int
    {
        return $key % $this->capacity;
    }

    public function insertItem($key, $data): void
    {
        $index = $this->hashFunction($key);
        $this->table[$index][] = $data;
    }

    public function deleteItem($key): void
    {
        $index = $this->hashFunction($key);
        unset($this->table[$index]);
    }
}
$key = [231, 321, 212, 321, 433, 262];
$data = [123, 432, 523, 43, 423, 111];
$size = sizeof($key);
$hashing = new Hashing($size);
for ($i = 0; $i < $size; $i++) {
    $hashing->insertItem($key[$i], $data[$i]);
}
echo $hashing->capacity;
echo "<br/>";
print_r($hashing->table);
echo "<br/>";
$hashing->deleteItem(7);
print_r($hashing->table);
