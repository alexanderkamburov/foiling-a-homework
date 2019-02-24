<?php

require './vendor/autoload.php';

$automaton = new DeterminateFiniteAutomatonInt;

$startState = new State('q0');
$automaton->setStartState($startState);

$replacementStartState = new State('q1');
$automaton->replaceStartState($replacementStartState);

var_dump($automaton);
