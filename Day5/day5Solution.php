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
for($i = 0, $iMax = 8; $i < $iMax; $i++){
    $startingContainers[] = $lines[$i];
}
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
$containersPartTwo = $containers;
// --------------------------------------------
// Part 1
foreach ($commands as $command) {
    for ($i = 1, $iMax = $command['quantity']; $i <= $iMax; $i++) {
        if (count($containers[$command['to']]) === 0) {
            $containers[$command['to']][0] = $containers[$command['from']][key($containers[$command['from']])];
        }
        array_unshift($containers[$command['to']], $containers[$command['from']][key($containers[$command['from']])]);
        unset($containers[$command['from']][key($containers[$command['from']])]);
    }
}
echo "Top containers in each column: <br><br>";
foreach ($containers as $container){
    echo $container[key($container)];
}
echo "<br> 1  2  3  4  5  6  7  8  9";
echo "<br>----------------------------<br>";
// --------------------------------------------
// Part 2
foreach ($commands as $key=>$command) {
    $arrayToBeMoved[] = array_slice($containersPartTwo[$command['from']], 0, $command['quantity'], true);
    $keysToBeRemoved[] = array_keys($arrayToBeMoved[$key]);
    foreach (array_reverse($arrayToBeMoved[$key]) as $container){
        array_unshift($containersPartTwo[$command['to']], $container);
    }
    foreach ($keysToBeRemoved[$key] as $keyToBeRemoved){
        unset($containersPartTwo[$command['from']][$keyToBeRemoved]);
    }
}
foreach ($containersPartTwo as $container){
    echo $container[key($container)];
}
echo "<br> 1  2  3  4  5  6  7  8  9";
// --------------------------------------------
// End
echo "</pre>";
