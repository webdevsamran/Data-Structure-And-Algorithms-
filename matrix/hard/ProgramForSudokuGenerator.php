<?php

define('RAND_MAX',2147483647);

class Sudoku{
    public $N;
    public $K;
    public $mat;
    public $SRN;

    function __construct($N,$K)
    {
        $this->N = $N;
        $this->K = $K;
        $srnq = sqrt($N);
        $this->SRN = (int)$srnq;
        $this->mat = array();
        for($i = 0; $i < $N; $i++){
            $this->mat[$i] = array_fill(0,$N,0);
        }
    }

    function fillValues(){
        $this->fillDiagonal();
        $this->fillRemaining(0,$this->SRN);
        $this->removeKDigits();
    }

    function fillDiagonal()
    {
        for ($i = 0; $i < $this->N; $i = $i + $this->SRN)
        {
            $this->fillBox($i, $i);
        }
    }

    function fillBox($row, $col)
    {
        $num = NULL;
        for($i = 0; $i < $this->SRN; $i++) {
            for($j = 0; $j < $this->SRN; $j++) {
                do {
                    $num = $this->randomGenerator($this->N);
                } while (!$this->unUsedInBox($row, $col, $num));
                $this->mat[$row + $i][$col + $j] = $num;
            }
        }
    }

    function randomGenerator($num)
    {
        return (int)floor((float)(rand(0,RAND_MAX) / (float)(RAND_MAX) * $num + 1));
    }

    function unUsedInBox($rowStart, $colStart, $num)
    {
        for ($i = 0; $i < $this->SRN; $i++) {
            for ($j = 0; $j < $this->SRN; $j++) {
                if ($this->mat[$rowStart + $i][$colStart + $j] == $num) {
                    return false;
                }
            }
        }
        return true;
    }

    function unUsedInRow($i, $num)
    {
        for ($j = 0; $j < $this->N; $j++) {
            if ($this->mat[$i][$j] == $num) {
                return false;
            }
        }
        return true;
    }

    function unUsedInCol($j, $num)
    {
        for ($i = 0; $i < $this->N; $i++) {
            if ($this->mat[$i][$j] == $num) {
                return false;
            }
        }
        return true;
    }

    function fillRemaining($i, $j)
    {
        if ($j >= $this->N && $i < $this->N - 1) {
            $i = $i + 1;
            $j = 0;
        }
        if ($i >= $this->N && $j >= $this->N) {
            return true;
        }
        if ($i < $this->SRN) {
            if ($j < $this->SRN) {
                $j = $this->SRN;
            }
        }
        else if ($i < $this->N - $this->SRN) {
            if ($j == (int)($i / $this->SRN) * $this->SRN) {
                $j = $j + $this->SRN;
            }
        }
        else {
            if ($j == $this->N - $this->SRN) {
                $i = $i + 1;
                $j = 0;
                if ($i >= $this->N) {
                    return true;
                }
            }
        }
        for ($num = 1; $num <= $this->N; $num++) {
            if ($this->CheckIfSafe($i, $j, $num)) {
                $this->mat[$i][$j] = $num;
                if ($this->fillRemaining($i, $j + 1)) {
                    return true;
                }
                $this->mat[$i][$j] = 0;
            }
        }
        return false;
    }

    function CheckIfSafe($i, $j, $num)
    {
        return ($this->unUsedInRow($i, $num) && $this->unUsedInCol($j, $num) && $this->unUsedInBox($i - $i % $this->SRN, $j - $j % $this->SRN, $num));
    }

    function removeKDigits()
    {
        $count = $this->K;
        while ($count != 0) {
            $cellId = $this->randomGenerator($this->N * $this->N) - 1;
            $i = ($cellId / $this->N);
            $j = $cellId % 9;
            if ($j != 0) {
                $j = $j - 1;
            }
            if ($this->mat[$i][$j] != 0) {
                $count--;
                $this->mat[$i][$j] = 0;
            }
        }
    }
    function printSudoku()
    {
        for($i = 0; $i < $this->N; $i++) {
            for($j = 0; $j <$this-> N; $j++) {
                echo (string)($this->mat[$i][$j]) . " ";
            }
            echo "<br/>";
        }
        echo "<br/>";
    }
}

$N = 9;
$K = 20;
$sudoku = new Sudoku($N, $K);
$sudoku->fillValues();
$sudoku->printSudoku();