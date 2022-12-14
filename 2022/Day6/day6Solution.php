<?php
echo "<pre>";
echo "<h2>Day 6</h2>";

$myFile = file_get_contents("input.txt");
/**
 * @param string $file
 * @param int $start
 * @param int $depth
 * @return array
 */
function getArray(string $file, int $start, int $depth): array{
    $array = [];
    for ($i = $start; $i < $depth; $i++){
        $array[] = $file[$i];
    }
    return $array;
}

// --------------------------------------------
//// Part 1
$i = 0;
while(true){
    $array = getArray($myFile, $i, $i+4);
    if (count($array) === count(array_unique($array))) {
        break;
    }
    $i++;
}
$Part1Solution = $i + 4;
echo "Part 1: " . $Part1Solution . "<br>";
echo "------------<br>";


//// --------------------------------------------
//// Part 2
$i = 0;
while(true){
    $array = getArray($myFile, $i, $i+14);
    if (count($array) === count(array_unique($array))) {
        break;
    }
    $i++;
}
$part2Solution = $i+14;
echo "Part 2: " . $part2Solution . "<br>";
echo "</pre>";