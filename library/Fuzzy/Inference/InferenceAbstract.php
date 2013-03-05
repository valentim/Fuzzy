<?php

/**
 * Description of InferenceAbstract
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Inference;

abstract class InferenceAbstract
{
    protected $fuzzyCollection;
    protected $rulers;
    
    public function __construct(array $fuzzyCollection)
    {
        $this->fuzzyCollection = $fuzzyCollection;
    }
}
