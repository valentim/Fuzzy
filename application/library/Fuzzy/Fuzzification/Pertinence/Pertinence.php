<?php

/**
 * Description of Pertinence
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzification\Pertinence;

class Pertinence
{
    protected $namespace = 'Fuzzy\\Fuzzification\\Pertinence\\';
    protected $function;
    
    public function __construct($function)
    {
        $this->factory($function);
    }
    
    public function getPertinence()
    {
        return $this->function;
    }
    
    protected function factory($function)
    {
        $class = $this->namespace.ucfirst($function);
        $this->function = new $class;
    }
}
