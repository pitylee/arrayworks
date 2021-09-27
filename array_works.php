<?php

// Part one - same as php bin/console app:assessment 1
$l1 = [0, 2, 1, 3, 8, 5, 4];
$l2 = [1, 2, 7, 4, 10];

$result = array_intersect($l1, $l2);
asort($result);

echo json_encode(array_values($result)) . PHP_EOL;
