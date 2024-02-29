<?php


function prePrint($arr): void
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function LCS($str1, $str2, $n1, $n2)
{
    $str1_arr = str_split($str1);
    $str2_arr = str_split($str2);
    $lcs = array(array());
    for ($i = 0; $i <= $n1; $i++) {
        for ($j = 0; $j <= $n2; $j++) {
            if ($i == 0 || $j == 0) {
                $lcs[$i][$j] = 0;
            } else if ($str1_arr[$i - 1] == $str2_arr[$j - 1]) {
                $lcs[$i][$j] = 1 + $lcs[$i - 1][$j - 1];
            } else {
                $lcs[$i][$j] = max($lcs[$i - 1][$j], $lcs[$i][$j - 1]);
            }
        }
    }

    // prePrint($lcs);
    $index = $lcs[$n1][$n2];
    $lcsAlgo = array();
    $lcsAlgo[$index] = '';
    $i = $n1;
    $j = $n2;
    while ($i > 0 && $j > 0) {
        if ($str1_arr[$i - 1] == $str2_arr[$j - 1]) {
            $lcsAlgo[$index - 1] = $str1_arr[$i - 1];
            $i--;
            $j--;
            $index--;
        } else if ($lcs[$i - 1][$j] > $lcs[$i][$j - 1]) {
            $i--;
        } else {
            $j--;
        }
    }
    echo "String 1: " . implode("", $str1_arr) . " String 2: " . implode("", $str2_arr) . " lcsAlgo: " . strrev(implode("", $lcsAlgo));
}

$str1 = "ACADB";
$str2 = "CBDAD";
LCS($str1, $str2, strlen($str1), strlen($str2));

/* 
// The longest common subsequence in C++

#include <iostream>
using namespace std;

void lcsAlgo(char *S1, char *S2, int m, int n) {
  int LCS_table[m + 1][n + 1];


  // Building the mtrix in bottom-up way
  for (int i = 0; i <= m; i++) {
    for (int j = 0; j <= n; j++) {
      if (i == 0 || j == 0)
        LCS_table[i][j] = 0;
      else if (S1[i - 1] == S2[j - 1])
        LCS_table[i][j] = LCS_table[i - 1][j - 1] + 1;
      else
        LCS_table[i][j] = max(LCS_table[i - 1][j], LCS_table[i][j - 1]);
    }
  }

  int index = LCS_table[m][n];
  char lcsAlgo[index + 1];
  lcsAlgo[index] = '\0';

  int i = m, j = n;
  while (i > 0 && j > 0) {
    if (S1[i - 1] == S2[j - 1]) {
      lcsAlgo[index - 1] = S1[i - 1];
      i--;
      j--;
      index--;
    }

    else if (LCS_table[i - 1][j] > LCS_table[i][j - 1])
      i--;
    else
      j--;
  }
  
  // Printing the sub sequences
  cout << "S1 : " << S1 << "\nS2 : " << S2 << "\nLCS: " << lcsAlgo << "\n";
}

int main() {
  char S1[] = "ACADB";
  char S2[] = "CBDA";
  int m = strlen(S1);
  int n = strlen(S2);

  lcsAlgo(S1, S2, m, n);
}
*/