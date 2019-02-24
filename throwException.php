<?php

require './vendor/autoload.php';

$automaton = new DeterminateFiniteAutomatonInt;

$startState = new State('q0');
$automaton->setStartState($startState);

$switchStartState = new State('q1');
$automaton->setStartState($switchStartState);
