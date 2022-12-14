<?php
echo "<pre>";
echo "<h2>Day 7</h2>";
$lines = file("input.txt", FILE_SKIP_EMPTY_LINES);
$count=0;
for ($i = 1; $i < 8; $i++){
    $seperated = explode(" ", trim($lines[$i]));

    if ($seperated[1] !== "ls") {
        if ($seperated[0] === "dir") {
            $fileSystem['/'][$seperated[1]] = [];
        } else {
            $fileSystem['/']["file".$count] = ['size' => $seperated[0], 'name' => $seperated[1]];
            $count++;
        }
    }
}
$root = $fileSystem['/'];

for($i = 8, $iMax = count($lines); $i < $iMax; $i++){
    $seperated = explode(" ", trim($lines[$i]));
    if ($seperated[1] === "cd") {
        if ($seperated[2] === "..") {

        } else {
            $previousRoot = $root;
            $root[$seperated[2]] = [];
            $root = $root[$seperated[2]];
        }
    }elseif ($seperated[1] !== "ls") {
        if ($seperated[0] === "dir") {
            $root = [];
        } else {
            $root["file".$count][] = ['size' => $seperated[0], 'name' => $seperated[1]];
            $count++;
        }
    }
}
var_dump($root);
echo "</pre>";
