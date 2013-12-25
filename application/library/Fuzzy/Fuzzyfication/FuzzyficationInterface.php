<?php
/**
 *
 * @author thiagovalentim
 */
namespace Fuzzy\Fuzzyfication;

interface FuzzyficationInterface
{
    public function addCollection($type);
    public function addGroup($type, $group, $values);
}