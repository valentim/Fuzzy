<?php
/**
 * Description of Fuzzification
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzification;

class Fuzzification extends FuzzificationAbstract
{
    public function getFuzzyCollection()
    {
        return $this->fuzzyCollection;
    }
    
    public function getPertinence()
    {
        return $this->pertinence;
    }
}
