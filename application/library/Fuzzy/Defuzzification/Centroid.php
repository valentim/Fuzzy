<?php
namespace Fuzzy\Defuzzification;

class Centroid implements DefuzzificationInterface
{
    private $aggregation = array();
    
    public function __construct(array $aggregation)
    {
        $this->aggregation = $aggregation;
    }
    
    public function calculate()
    {
        $numerator = 0;
        $denumerator = 0;
        
        foreach ($this->aggregation as $pertinence => $values) {
            $numerator += array_reduce($values, function ($v, $w) use ($pertinence, &$denumerator) {
                $v += $w * $pertinence;
                $denumerator += $pertinence;
                
                return $v;
            });
        }
        
        return round($numerator/$denumerator, 2);
    }
}
