<?php

/**
 * Description of Trapezoid
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzyfication\Pertinence;

class Trapezoid extends PertinenceAbstract
{
    public function __construct()
    {
        $this->point = 5;
    }
    
    /**
     * max ( min ( x-a/b-a, 1, d-x/d-c ), 0 )
     */
    public function process($x)
    {
        $a = $this->interval[0];
        $b = $this->interval[1];
        $c = $this->interval[4];
        $d = $this->interval[5];

        $e = ($x - $a) / ($b - $a);
        $f = ($d - $x) / ($d - $c);

        return max(min(array($e, 1, $f)), 0 );
    }
}
