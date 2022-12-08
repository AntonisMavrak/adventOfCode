<?php
echo "<pre>";
echo "<h2>Day 5</h2>";
$steps = [];
$lines = file('input.txt');
foreach ($lines as $key=>$line){
    $lines[$key] = preg_replace('/[[:^print:]]/', '', $line);
}
$lines[0] .= '    ';
for ($i = 10, $iMax = count($lines); $i < $iMax; $i++){
    $steps[] = $lines[$i];
}
foreach ($steps as $key=>$step){
    preg_match_all('/\d{1,2}/',$step, $helps[]);
}
foreach ($helps as $key=>$command){
    $commands[$key]['quantity'] = $command[0][0];
    $commands[$key]['from'] = $command[0][1];
    $commands[$key]['to'] = $command[0][2];
}
// 9 containers
for($i = 0, $iMax = 8; $i < $iMax; $i++){
    $startingContainers[] = $lines[$i];
}


// --------------------------------------------
// Part 1
foreach ($startingContainers as $container){
    $offset = 0;
    for ($i = 1, $iMax = 10; $i < $iMax; $i++){
        $containers[$i][] = substr($container, $offset, 3) !== '   ' ? substr($container, $offset, 3) : null;
        $offset += 4;
    }
}
foreach ($containers as $key => $container) {
    foreach ($container as $key2 => $item) {
        if ($item === null) {
            unset($containers[$key][$key2]);
        }
    }
}

foreach ($commands as $command) {
    for ($i = 1, $iMax = $command['quantity']; $i <= $iMax; $i++) {
        if (count($containers[$command['to']]) === 0) {
            $containers[$command['to']][0] = $containers[$command['from']][key($containers[$command['from']])];
        }

        array_unshift($containers[$command['to']], $containers[$command['from']][key($containers[$command['from']])]);
        unset($containers[$command['from']][key($containers[$command['from']])]);
    }
}
foreach ($containers as $container){
    echo $container[key($container)] . "<br>";
}


// --------------------------------------------
// Part 2
// --------------------------------------------
// End
echo "</pre>";
