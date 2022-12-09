<?php
echo "<pre>";
echo "<h2>Day 4</h2>";
// --------------------------------------------
// Part 1
$count = 0;
$lines = file('input.txt');
foreach ($lines as $key=>$line){
    preg_match('/\d.*\d/', $line, $lines[$key]);
}
foreach ($lines as $key=>$line) {
    $lines[$key] = explode(',', $line[0]);
    $lines[$key][0] = explode('-', $lines[$key][0]);
    $lines[$key][1] = explode('-', $lines[$key][1]);
}
foreach ($lines as $key=>$line){
    if (($line[0][0] <= $line[1][0] && $line[0][1] >= $line[1][1]) || ($line[0][0] >= $line[1][0] && $line[0][1] <= $line[1][1])){
        $lines[$key]['result'] = 'true';
        $count++;
    } else {
        $lines[$key]['result'] = 'false';
    }
}
echo "Number of fully overlap results: " . $count . "<br>--------------------------<br>";
// --------------------------------------------
// Part 2
$partialCount = 0;
foreach ($lines as $key=>$line){
    if (!(($line[0][1] < $line[1][0]) || ($line[0][0] > $line[1][1]))) {
        $partialCount++;
    }
}
echo "Number of partially overlap results: " . $partialCount . "<br>";
// --------------------------------------------
// End
echo "</pre>";
