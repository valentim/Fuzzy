<?php

/**
 * Description of MethodAbstract
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Inference\Method;

abstract class MethodAbstract implements MethodInterface
{
    const PARSEDATA = '/\[(.*?\((.*?)\))\]|[|&:]/';
    
    protected $rules = array(
        'data' => array(),
        'max' => array(),
        'min' => array(),
        'then' => array()
    );
    
    /**
     * 
     * [tamanho(medio)]|[sabor(bom)]:[satisfação(boa)], [tamanho(medio)]|[sabor(bom)]:[satisfação(boa)]
     */
    public function __construct($linguisticRules)
    {
        $rules = explode(",", $linguisticRules);
        $this->parseRule($rules);
    }
    
    public function getRules()
    {
        return $this->rules;
    }
    
    private function parseRule(array $linguisticRules)
    {
        foreach ($linguisticRules as $rule) {
            preg_match_all(self::PARSEDATA, $rule, $structures, PREG_SET_ORDER);
        }
        
        $this->rules['data'] = $structures;
        $this->handlerRules();
    }
    
    abstract protected function handlerRules();
}
