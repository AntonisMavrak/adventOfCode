<?php
echo "<pre>";
echo "<h2>Day 3</h2>";
// --------------------------------------------
// Part 1
$lines = file('input.txt');
$count = 0;
$alphabet = ['a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5, 'f'=>6, 'g'=>7, 'h'=>8, 'i'=>9, 'j'=>10, 'k'=>11, 'l'=>12, 'm'=>13,
    'n'=>14, 'o'=>15, 'p'=>16, 'q'=>17, 'r'=>18, 's'=>19, 't'=>20, 'u'=>21, 'v'=>22, 'w'=>23, 'x'=>24, 'y'=>25, 'z'=>26,
    'A'=>27, 'B'=>28, 'C'=>29, 'D'=>30, 'E'=>31, 'F'=>32, 'G'=>33, 'H'=>34, 'I'=>35, 'J'=>36, 'K'=>37, 'L'=>38, 'M'=>39,
    'N'=>40, 'O'=>41, 'P'=>42, 'Q'=>43, 'R'=>44, 'S'=>45, 'T'=>46, 'U'=>47, 'V'=>48, 'W'=>49, 'X'=>50, 'Y'=>51, 'Z'=>52];
$sum = 0;

foreach ($lines as $key=>$line){
    preg_match('/[A-Za-z]*/', $line, $lines[$key]);
}
foreach ($lines as $key=>$line) {
    $length = strlen($line[0]);
    $wordChars = $length / 2;
    $lines[$key] = str_split($line[0], $wordChars);
}
foreach ($lines as $key=>$line){
    for ($i = 0, $iMax = strlen($line[0]); $i < $iMax; ++$i) {
        if (strpos($lines[$key][1], $lines[$key][0][$i]) !== false){
            $lines[$key]['result'] = $lines[$key][0][$i];
        }
    }
}
foreach ($lines as $line){
    foreach (array_keys($alphabet) as $letter){
        if ($letter === $line['result']){
            $sum += $alphabet[$letter];
        }
    }
}
echo "Sum of all items: " . $sum . "<br>--------------------------<br>";


// --------------------------------------------
// Part 2

// --------------------------------------------
// End
echo "</pre>";
