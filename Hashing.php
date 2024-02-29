<?php
error_reporting(0);
class Hashing
{
    public $capacity;
    public $table;

    function __construct($c)
    {
        $size = $this->getPrime($c);
        $this->capacity = $size;
        // $this->table = new SplFixedArray($size);
        $this->table = array();
    }

    public function getPrime($c)
    {
        if ($c % 2 == 0) {
            $c++;
        }
        while (!($this->checkPrime($c))) {
            $c += 2;
        }
        return $c;
    }

    public function checkPrime($c)
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

    public function hashFunction($key)
    {
        return $key % $this->capacity;
    }

    public function insertItem($key, $data)
    {
        $index = $this->hashFunction($key);
        $this->table[$index][] = $data;
    }

    public function deleteItem($key)
    {
        $index = $this->hashFunction($key);
        unset($this->table[$index]);
    }

    /* public function print_table(){
        for($i=0;$i<$this->capacity;$i++){
            echo "Table [".$i."]<br/>\n";
            for($j=0;$j<sizeof($this->table[$i]);$j++){
                echo "-->".$this->table[$i][$j];
            }
            echo "<br/>\n";
        }
    } */
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

/* 
// Implementing hash table in C++

#include <iostream>
#include <list>
using namespace std;

class HashTable
{
  int capacity;
  list<int> *table;

public:
  HashTable(int V);
  void insertItem(int key, int data);
  void deleteItem(int key);

  int checkPrime(int n)
  {
  int i;
  if (n == 1 || n == 0)
  {
    return 0;
  }
  for (i = 2; i < n / 2; i++)
  {
    if (n % i == 0)
    {
    return 0;
    }
  }
  return 1;
  }
  int getPrime(int n)
  {
  if (n % 2 == 0)
  {
    n++;
  }
  while (!checkPrime(n))
  {
    n += 2;
  }
  return n;
  }

  int hashFunction(int key)
  {
  return (key % capacity);
  }
  void displayHash();
};
HashTable::HashTable(int c)
{
  int size = getPrime(c);
  this->capacity = size;
  table = new list<int>[capacity];
}
void HashTable::insertItem(int key, int data)
{
  int index = hashFunction(key);
  table[index].push_back(data);
}

void HashTable::deleteItem(int key)
{
  int index = hashFunction(key);

  list<int>::iterator i;
  for (i = table[index].begin();
   i != table[index].end(); i++)
  {
  if (*i == key)
    break;
  }

  if (i != table[index].end())
  table[index].erase(i);
}

void HashTable::displayHash()
{
  for (int i = 0; i < capacity; i++)
  {
  cout << "table[" << i << "]";
  for (auto x : table[i])
    cout << " --> " << x;
  cout << endl;
  }
}

int main()
{
  int key[] = {231, 321, 212, 321, 433, 262};
  int data[] = {123, 432, 523, 43, 423, 111};
  int size = sizeof(key) / sizeof(key[0]);

  HashTable h(size);

  for (int i = 0; i < size; i++)
  h.insertItem(key[i], data[i]);

  h.deleteItem(12);
  h.displayHash();
}
*/