<?php
/**
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzification;

interface FuzzificationInterface
{
    public function addCollection($type);
    public function addGroup($type, $group, $values);
}
