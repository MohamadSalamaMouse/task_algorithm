<?php

function insertion_sort($arr, $n)
{
    for ($j = 1; $j < $n; $j++) {
        $key = $arr[$j];
        $i = $j - 1;
        while ($i >= 0 and $arr[$i] > $key) {
            $arr[$i + 1] = $arr[$i];
            $i = $i - 1;
        }
        $arr[$i + 1] = $key;
    }
    return $arr;
}

$arr = [5, 3, 2, 6, 1, 8, 4, 9];
$n = count($arr);
echo  "arr before sort " . "<br>";
print_r($arr);
$result = insertion_sort($arr, $n);
echo  "arr after sort " . "<br>";
print_r($result);
