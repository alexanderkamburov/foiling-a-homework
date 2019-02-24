<?php

abstract class AbstractDeterminateFinateAutomaton
{
    * Всеки автомат работи с определена азбука Σ
    const ALPHABET_TYPES = array(
        1 => DeterminateFiniteAutomatonInt::class,
        2 => DeterminateFiniteAutomatonChar::class
    );

    /**
     * @var int
     */
    protected $numSates;
    /**
     * @var array[State]
     */
    protected $states = array();

    /**
     * @var State
     */
    protected $startState;

    /**
     * @var array
     */
    protected $endStates;

    /**
     * @return State
     */
    public function getStartState()
    {
        return $this->startState;
    }

    /**
     * @param State $startState
     *
     * @return self
     */
    public function setStartState(State $startState)
    {
        $this->startState = $startState;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumSates()
    {
        return $this->numSates;
    }

    /**
     * @param int $numSates
     *
     * @return self
     */
    public function setNumSates($numSates)
    {
        $this->numSates = $numSates;

        return $this;
    }

    /**
     * @return array[State]
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param array[State] $states
     *
     * @return self
     */
    public function setStates(array $states)
    {
        $this->states = $states;

        return $this;
    }

    /**
     * @return array
     */
    public function getEndStates()
    {
        return $this->endStates;
    }

    /**
     * @param array $endStates
     *
     * @return self
     */
    public function setEndStates(array $endStates)
    {
        $this->endStates = $endStates;

        return $this;
    }
}
