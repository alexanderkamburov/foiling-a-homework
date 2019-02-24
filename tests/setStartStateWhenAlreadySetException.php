<?php

require './vendor/autoload.php';

$automaton = new DeterminateFiniteAutomatonInt;

$state1 = new State('q0');
$state2 = new State('q1');
$states = [$state1, $state2];
$automaton->setStates($states);

$startState = $state1;
$automaton->setStartState($startState);

$switchStartState = $state2;
$automaton->setStartState($switchStartState);
