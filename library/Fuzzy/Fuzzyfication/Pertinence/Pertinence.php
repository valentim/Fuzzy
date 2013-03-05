<?php

/**
 * Description of Pertinence
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzyfication\Pertinence;

class Pertinence
{
    protected $namespace = 'Fuzzy\\Fuzzyfication\\Pertinence\\';
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
