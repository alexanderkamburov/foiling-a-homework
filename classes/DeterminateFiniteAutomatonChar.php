<?php

class DeterminateFiniteAutomatonChar extends AbstractDeterminateFiniteAutomaton
{
    protected function getType() {
        return 'string';
    }

    /**
     * @var array[string]
     */
    private $chars = array();

    /**
     * @return array[string]
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * @param array[string] $chars
     *
     * @return self
     */
    public function setChars(array $chars)
    {
        $this->chars = $chars;

        return $this;
    }
}
