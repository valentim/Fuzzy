<?php

/**
 * Description of PertinenceAbstract
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzification\Pertinence;

abstract class PertinenceAbstract implements PertinenceInterface
{

    protected $start;
    protected $end;
    protected $point;
    protected $interval = array();
    protected $set = array();

    public function getPertinenceName()
    {
        $anatomyClass = explode("\\", get_class($this));

        return strtolower(end($anatomyClass));
    }
    
    public function getSet()
    {
        if (empty($this->set)) {
            for ($i = $this->end; $i > $this->start; $i--) {
                $this->addPertinence($i);
            }
        }
        
        return $this->set;
    }
    
    public function setValues(array $values)
    {
        $this->start = (int) current($values);
        end($values);
        $this->end = (int) current($values);
        $this->makeInterval();
    }
    
    protected function addPertinence($value)
    {
        $pertinence = (String) $this->process($value);
        if (!isset($this->set[$pertinence])) {
            $this->set[$pertinence] = array();
        }
        array_push($this->set[$pertinence], $value);
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
        
        $tmpPoint = $this->point;
        while ($tmpPoint) {
            $value = $this->interval[$tmpPoint] - $each;
            $tmpPoint--;
            $this->interval[$tmpPoint] = (int) $value;
        }
        
        sort($this->interval);
    }

    abstract public function process($x);
}
