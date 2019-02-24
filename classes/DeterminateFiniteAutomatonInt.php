<?php

class DeterminateFiniteAutomatonInt extends AbstractDeterminateFiniteAutomaton
{
    /**
     * @var array[int]
     */
    private $ints = array();

    /**
     * @return mixed
     */
    public function getInts()
    {
        return $this->ints;
    }

    /**
     * @param mixed $ints
     *
     * @return self
     */
    public function setInts(array $ints)
    {
        $this->ints = $ints;

        return $this;
    }
}
