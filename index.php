<?php

require './vendor/autoload.php';

echo "Hello!\n\r";
echo "\n\r";

$alphabet = readline("Въвеждане на тип на азбуката в автомата (1 - цяло число, 2 – символен тип): ");

$numStates = readline("Моля въведете брой състоянията: ");
$states = array();
for ($i=0; $i < $numStates; $i++) {
    $n = $i+1;
    $stateName = readline("Моля въведете състояние номер [$n]: ");
    $state = new State($stateName);
    $states[] = $state;
}

$numSymbols = readline("Моля въведете брой символи в азбуката на автомата: ");
$symbols = array();
for ($i=0; $i < $numSymbols; $i++) {
    $n = $i+1;
    $symbol = readline("Моля въведете символ номер [$n]: ");
    $symbols[] = $symbol;
}

$transitionTable = array();
for ($i=0; $i < count($states); $i++) {
    for ($j=0; $j < count($symbols); $j++) {
        $transitionTable[$i][$j] = readline(sprintf("Моля въведете (%s, %s): ", $states[$i]->getName(), $symbols[$j]));
    }
}

$startState = readline("Моля въведете начално състояние: ");

$numEndStates = readline("Моля въведете брой крайни състояния: ");
$endStates = array();
for ($i=0; $i < $numEndStates; $i++) {
    $n = $i+1;
    $endState = readline("Моля въведете крайно състояние номер [$n]");
    $endStates[] = $endState;
}

