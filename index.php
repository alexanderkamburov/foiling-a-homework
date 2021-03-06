<?php

require './vendor/autoload.php';

$alphabet = readline("Въвеждане на тип на азбуката в автомата (1 - цяло число, 2 – символен тип): ");

if (!array_key_exists($alphabet, AbstractDeterminateFiniteAutomaton::ALPHABET_TYPES)) {
    throw new \InvalidArgumentException;
}

$automatonClass = AbstractDeterminateFiniteAutomaton::ALPHABET_TYPES[$alphabet];
$automaton = new $automatonClass;

$numStates = readline("Моля въведете брой състоянията: ");
$states = array();
for ($i=0; $i < $numStates; $i++) {
    $n = $i+1;
    $stateName = readline("Моля въведете състояние номер [$n]: ");
    $state = new State($stateName);
    $states[] = $state;
}
$automaton->setNumStates($numStates);
$automaton->setStates($states);

$numSymbols = readline("Моля въведете брой символи в азбуката на автомата: ");
$symbols = array();
for ($i=0; $i < $numSymbols; $i++) {
    $n = $i+1;
    $symbol = readline("Моля въведете символ номер [$n]: ");
    $symbols[] = $symbol;
}
$automaton->setAlphabet($symbols);

$transitionTable = array();
for ($i=0; $i < count($states); $i++) {
    for ($j=0; $j < count($symbols); $j++) {
        $transitionTable[$i][$j] = readline(sprintf("Моля въведете (%s, %s)->", $states[$i]->getName(), $symbols[$j]));
    }
}
$automaton->setTransitionTable($transitionTable);

$startState = new State(readline("Моля въведете начално състояние: "));
$automaton->setStartState($startState);

$numEndStates = readline("Моля въведете брой крайни състояния: ");
$endStates = array();
for ($i=0; $i < $numEndStates; $i++) {
    $n = $i+1;
    $endState = new State(readline("Моля въведете крайно състояние номер [$n]: "));
    $endStates[] = $endState;
}
$automaton->setNumEndStates($numEndStates);
$automaton->setEndStates($endStates);

var_dump($automaton);
