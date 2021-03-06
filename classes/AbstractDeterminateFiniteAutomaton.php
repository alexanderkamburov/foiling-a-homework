<?php

abstract class AbstractDeterminateFiniteAutomaton
{
    /**
     * Всеки автомат работи с определена азбука Σ
     * При избор на стойност 1, към указателя от тип абстрактен автомат се прикрепя обект от тип DeterminateFiniteAutomatonInt. При избор на стойност 2, ще се инициализира указателят с обект от тип DeterminateFiniteAutomatonChar
     */
    const ALPHABET_TYPES = array(
        1 => DeterminateFiniteAutomatonInt::class,
        2 => DeterminateFiniteAutomatonChar::class
    );

    /**
     * @var int
     */
    protected $numStates;

    /**
     * @var array[State]
     */
    protected $states = array();

    /**
     * @var State
     */
    protected $startState;

    /**
     * @var int
     */
    protected $numEndStates;

    /**
     * @var array
     */
    protected $endStates;

    /**
     * @var array
     */
    protected $alphabet;

    /**
     * @var array
     */
    protected $transitionTable;

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
     * @throws  AutomatonException Ако състояние вече е маркирано като начално или ако даденото състояние не е указано в масива допустими състояния
     * @return self
     */
    public function setStartState(State $startState)
    {
        if ($this->startState && $this->startState != $startState) {
            throw new AutomatonException(sprintf("Опит да се маркира второ състояние за начално: заложено начално състояние [%s], маркирано ново състояние [%s]", $this->startState->getName(), $startState->getName()));
        }

        if (!in_array($startState, $this->states)) {
            throw new AutomatonException(sprintf("Подаденото състояние [%s] липсва в масива със състояния", $startState->getName()));
        }

        $this->startState = $startState;

        return $this;
    }

    /**
     * Ясно показва на потребителя текущото начално състояние и позволява то да се смени, като се размаркира като начално, а на негово място потребителят посочва ново начално състояние
     */
    public function replaceStartState(State $replacementStartState)
    {
        if (!$this->startState) {
            echo "Текущо начално състояние не е маркирано. Прекъсване на операцията.\n\r";
            return;
        }


        echo "Текущо начално състояние (ще бъде размаркирано като начално) " . $this->startState->getName() . "\n\r";
        $this->startState = $replacementStartState;
        echo 'Ново начално състояние ' . $replacementStartState->getName() . "\n\r";
    }

    /**
     * @return int
     */
    public function getNumStates()
    {
        return $this->numStates;
    }

    /**
     * @param int $numStates
     *
     * @return self
     */
    public function setNumStates($numStates)
    {
        $this->numStates = $numStates;

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

        for ($i = 0; $i < count($endStates); $i++) {
            if ($endStates[$i] instanceof State === false) {
                throw new \InvalidArgumentException('Всяко крайно състояниет трябва да е обект от клас State');
            }

            if (!in_array($endStates[$i], $this->states)) {
                throw new AutomatonException(sprintf("Подаденото състояние [%s] липсва в масива със състояния", $endStates[$i]->getName()));
            }
        }


        return $this;
    }

    /**
     * @return int
     */
    public function getNumEndStates()
    {
        return $this->numEndStates;
    }

    /**
     * @param int $numEndStates
     *
     * @return self
     */
    public function setNumEndStates(int $numEndStates)
    {
        $this->numEndStates = $numEndStates;

        return $this;
    }

    /**
     * @return array
     */
    public function getAlphabet()
    {
        return $this->alphabet;
    }

    /**
     * @param array $alphabet
     *
     * @return self
     */
    public function setAlphabet(array $alphabet)
    {
        $requiredType = $this->getType();
        foreach ($alphabet as $symbol) {
            $actualType = gettype($symbol);
            if ($actualType !== $requiredType && !settype($alphabet, $requiredType)) {
                throw new \InvalidArgumentException(sprintf('Елемент от азбуката e от тип %s, а не е от очаквания тип %s', $actualType, $requiredType));
            }
        }

        $this->alphabet = $alphabet;

        return $this;
    }

    /**
     * @return string
     */
    abstract protected function getType();

    /**
     * @return array
     */
    public function getTransitionTable()
    {
        return $this->transitionTable;
    }

    /**
     * @param array $transitionTable
     *
     * @return self
     */
    public function setTransitionTable(array $transitionTable)
    {
        $this->transitionTable = $transitionTable;

        return $this;
    }
}
