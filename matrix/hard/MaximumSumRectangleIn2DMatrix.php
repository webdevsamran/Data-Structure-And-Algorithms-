<?php


define('ROW', 4);
define('COL', 5);

function kadane(&$arr, &$start, &$finish, $n)
{
	$sum = 0;
    $maxSum = PHP_INT_MIN;
    $i = NULL;
	$finish = -1;
	$local_start = 0;

	for($i = 0; $i < $n; $i++)
	{
		$sum += $arr[$i];
		if ($sum < 0)
		{
			$sum = 0;
			$local_start = $i + 1;
		}
		else if ($sum > $maxSum)
		{
			$maxSum = $sum;
			$start = $local_start;
			$finish = $i;
		}
	}
	if($finish != -1)
		return $maxSum;
	$maxSum = $arr[0];
	$start = $finish = 0;
	for($i = 1; $i < $n; $i++)
	{
		if ($arr[$i] > $maxSum)
		{
			$maxSum = $arr[$i];
			$start = $finish = $i;
		}
	}
	return $maxSum;
}

function findMaxSum($M)
{
	$maxSum = PHP_INT_MIN;
    $finalLeft = $finalRight = $finalTop = $finalBottom = NULL;
	$left = $right = $i = $sum = $start = $finish = NULL;
	$temp = array();
	for($left = 0; $left < COL; ++$left) {
		$temp = array_fill(0,ROW,0);
		for ($right = $left; $right < COL; ++$right) {
			for ($i = 0; $i < ROW; ++$i)
				$temp[$i] += $M[$i][$right];
			$sum = kadane($temp, $start, $finish, ROW);
			if ($sum > $maxSum) {
				$maxSum = $sum;
				$finalLeft = $left;
				$finalRight = $right;
				$finalTop = $start;
				$finalBottom = $finish;
			}
		}
	}
	echo "(Top, Left) (" . $finalTop . ", " . $finalLeft . ")" . "<br/>";
	echo "(Bottom, Right) (" . $finalBottom . ", " . $finalRight . ")" . "<br/>";
	echo "Max sum is: " . $maxSum . "<br/>";
}

$M = [ 
    [ 1, 2, -1, -4, -20 ],
    [ -8, -3, 4, 2, 1 ],
    [ 3, 8, 10, 1, 3 ],
    [ -4, -1, 1, 7, -6 ] 
];

findMaxSum($M);