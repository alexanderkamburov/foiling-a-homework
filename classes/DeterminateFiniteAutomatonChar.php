<?php

class DeterminateFiniteAutomatonChar extends AbstractDeterminateFiniteAutomaton
{
    /**
     * @var array[string]
     */
    private $chars = array();

    /**
     * @return mixed
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * @param mixed $chars
     *
     * @return self
     */
    public function setChars(array $chars)
    {
        $this->chars = $chars;

        return $this;
    }
}
