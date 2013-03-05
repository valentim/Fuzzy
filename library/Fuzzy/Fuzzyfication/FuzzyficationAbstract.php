<?php
/**
 * Description of FuzzyficationAbstract
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzyfication;

use Fuzzy\Fuzzyfication\Pertinence\Pertinence;

abstract class FuzzyficationAbstract implements FuzzyficationInterface
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
        $this->fuzzyCollection[$type] = array();
    }
    
    public function addGroup($type, $group, $values)
    {
        $this->fuzzyCollection[$type][$group] = $values;
    }
    
    public function __get($name)
    {
        if (array_key_exists($name, $this->fuzzyCollection)) {
            return $this->fuzzyCollection[$name];
        }
    }

    public function run($value)
    {
        foreach ($this->fuzzyCollection as $type => $group) {
            $groupName = key($group);
            $this->pertinence->setValues(current($group));
            $this->fuzzyCollection[$type][$groupName]['pertinence'] = $this->pertinence->process($value);
        }
    }
}
