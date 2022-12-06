<?php

/**
 * Rules
 *
 * Opponent
 * A: Rock
 * B: Paper
 * C: Scissors
 *
 * Me:
 * X: Rock (1)
 * Y: Paper (2)
 * Z: Scissors (3)
 *
 * Outcome:
 * Lost: 0
 * Draw: 3
 * Won: 6
 */
$lines = file('input.txt');
$all = [];
$count = 0;
echo "<pre>";
foreach ($lines as $key=>$line){
    $temp = explode(" ", $line);
    $all[$key]["Opponent"] = str_replace(" ", "", $temp[0]);
    $all[$key]["Me"] = substr($temp[1],0,1);
}
$results = [];
$sum = 0;
foreach ($all as $key=>$match){
    $all[$key]["result"] = 0;
    switch ($match["Opponent"]){
        case "A":
            switch ($match["Me"]){
                case "X":
                    $all[$key]["result"] += 1;
                    $all[$key]["result"] += 3;
                    break;
                case "Y":
                    $all[$key]["result"] += 2;
                    $all[$key]["result"] += 6;
                    break;
                case "Z":
                    $all[$key]["result"] += 3;
                    break;
            }
            break;
        case 'B':
            switch ($match["Me"]){
                case 'X':
                    $all[$key]["result"] += 1;
                    break;
                case 'Y':
                    $all[$key]["result"] += 2;
                    $all[$key]["result"] += 3;
                    break;
                case 'Z':
                    $all[$key]["result"] += 3;
                    $all[$key]["result"] += 6;
                    break;
            }
            break;
        case 'C':
            switch ($match["Me"]){
                case 'X':
                    $all[$key]["result"] += 1;
                    $all[$key]["result"] += 6;
                    break;
                case 'Y':
                    $all[$key]["result"] += 2;
                    break;
                case 'Z':
                    $all[$key]["result"] += 3;
                    $all[$key]["result"] += 3;
                    break;
            }
            break;
    }
    $sum += $all[$key]["result"];
}
echo "Sum of all matches: " . $sum . "<br>--------------------------<br>";

// Part 2
$sum = 0;
foreach ($all as $key=>$match){
    $all[$key]["result"] = 0;
    switch ($match["Opponent"]){
        case "A":   // Rock 1
            switch ($match["Me"]){
                case "X":   // Lose 0 + Scissors 3
                    $all[$key]["result"] += 3;
                    break;
                case "Y":   // Draw 3 + Rock 1
                    $all[$key]["result"] += 3;
                    $all[$key]["result"] += 1;
                    break;
                case "Z":   // Win 6 + Paper 2
                    $all[$key]["result"] += 6;
                    $all[$key]["result"] += 2;
                    break;
            }
            break;
        case 'B':   // Paper 2
            switch ($match["Me"]){
                case 'X':   // Lose 0 + Rock 1
                    $all[$key]["result"] += 1;
                    break;
                case 'Y':   // Draw 3 + Paper 2
                    $all[$key]["result"] += 3;
                    $all[$key]["result"] += 2;
                    break;
                case 'Z':   // Win 6 + Scissors 3
                    $all[$key]["result"] += 6;
                    $all[$key]["result"] += 3;
                    break;
            }
            break;
        case 'C':   // Scissors 3
            switch ($match["Me"]){
                case 'X':   // Lose 0 + Paper 2
                    $all[$key]["result"] += 2;
                    break;
                case 'Y':   // Draw 3 + Scissors 3
                    $all[$key]["result"] += 3;
                    $all[$key]["result"] += 3;
                    break;
                case 'Z':   // Win 6 + Rock 1
                    $all[$key]["result"] += 6;
                    $all[$key]["result"] += 1;
                    break;
            }
            break;
    }
    $sum += $all[$key]["result"];
}
echo "Sum of all matches, but correct: " . $sum;

echo "</pre>";