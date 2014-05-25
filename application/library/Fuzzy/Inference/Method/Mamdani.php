<?php
namespace Fuzzy\Inference\Method;

use Fuzzy\Defuzzification\DefuzzificationInterface;
use Fuzzy\Fuzzification\FuzzificationInterface;

/**
 *
 * @author Thiago Valentim
 *        
 */
class Mamdani extends MethodAbstract
{
    private $defuzzify;
    private $fuzzify;
    
    public function __construct($linguisticRules, FuzzificationInterface $fuzzify, DefuzzificationInterface $defuzzify)
    {
        $this->fuzzify = $fuzzify;
        $this->defuzzify = $defuzzify;
        parent::__construct($linguisticRules);
    }
    
    public function defuzzify()
    {
        $this->defuzzify->calculate();
    }
    
    /**
     * array(max=>array(),'' 
     * @see \Fuzzy\Inference\Method\MethodAbstract::handlerRules()
     */
    protected function handlerRules()
    {
        $temp = array();
        $operator = array(
            '|' => 'max',
            '&' => 'min',
            ':' => 'then'
        );
        
        $fuzzyCollection = $this->fuzzify->getFuzzyCollection();
        foreach ($this->rules['data'] as $structure) {
            if (count($structure) > 1) {
                $collection = substr($structure[1], 0, strpos($structure[1], "("));
                array_push($temp, $fuzzyCollection[$collection][$structure[2]]);
                
                continue;
            }

            if ($structure[0] != ":") {
                $temp = array($temp[0][$this->fuzzify->getPertinence()->getPertinenceName()]);
            }
                        
            $this->rules[$operator[$structure[0]]] = array_merge($this->rules[$operator[$structure[0]]], $temp);
            $temp = array();
        }
    }
}
