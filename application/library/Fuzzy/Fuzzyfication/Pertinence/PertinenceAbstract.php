<?php

/**
 * Description of PertinenceAbstract
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzyfication\Pertinence;

abstract class PertinenceAbstract implements PertinenceInterface
{

    protected $start;
    protected $end;
    protected $interval = array();
    protected $point;

    public function setValues(array $values)
    {
        $this->start = (int) current($values);
        end($values);
        $this->end = (int) current($values);
        $this->makeInterval();
    }

    protected function makeInterval()
    {
        $diference = $this->end - $this->start;
        $each = $diference / $this->point;
        
        $this->setIntervalValue($each);
    }

    protected function setIntervalValue($each)
    {
        $this->interval[$this->point] = $this->end;
        while ($this->point) {
            $value = $this->interval[$this->point] - $each;
            $this->point--;
            $this->interval[$this->point] = (int) $value;
        }
        
        $this->interval = array_reverse($this->interval);
    }

    abstract public function process($x);
}
