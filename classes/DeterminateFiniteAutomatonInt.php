<?php

class DeterminateFiniteAutomatonInt extends AbstractDeterminateFiniteAutomaton
{
    protected function getType() {
        return 'integer';
    }

    /**
     * @var array[int]
     */
    private $ints = array();

    /**
     * @return array[int]
     */
    public function getInts()
    {
        return $this->ints;
    }

    /**
     * @param array[int] $ints
     *
     * @return self
     */
    public function setInts(array $ints)
    {
        $this->ints = $ints;

        return $this;
    }
}
