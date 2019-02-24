<?php

require './vendor/autoload.php';

$automaton = new DeterminateFiniteAutomatonInt;
$states = [new State('q0')];

$automaton->setStates($states);
$endStates = [new State('q1')];
// exception
$automaton->setEndStates($endStates);
