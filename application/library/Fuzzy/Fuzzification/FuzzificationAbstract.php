<?php
/**
 * Description of FuzzificationAbstract
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzification;

use Fuzzy\Fuzzification\Pertinence\Pertinence;

abstract class FuzzificationAbstract implements FuzzificationInterface
{
    protected $fuzzyCollection = array();
    protected $pertinence;
    
    public function __construct($function)
    {
        $pertinence = new Pertinence($function);
        $this->pertinence = $pertinence->getPertinence();
    }
    
    public function addCollection($type)
    {
        if (!array_key_exists($type, $this->fuzzyCollection)) {
            $this->fuzzyCollection[$type] = array();
        }
    }
    
    public function addGroup($type, $group, $values)
    {
        $this->fuzzyCollection[$type][$group] = $values;
    }

    public function run($value)
    {
        $pertinence = $this->pertinence->getPertinenceName();
        foreach ($this->fuzzyCollection as $type => $group) {
            $groupName = key($group);
            $this->pertinence->setValues(current($group));
            $this->fuzzyCollection[$type][$groupName][$pertinence] = $this->pertinence->process($value);
        }
    }
}
