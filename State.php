<?php

/**
 * Един от елементите на автомат е множеството от състояния Q. Всяко състояние се реализира със съответен клас (State), който има член-данна - символен низ за име на състоянието.
 */
class State
{
    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
}
