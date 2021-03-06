<?php

namespace Fuzzy\Fuzzification\Pertinence;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-11-11 at 21:46:36.
 */
class PertinenceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Pertinence
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Pertinence('trapezoid');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    /**
     * @covers Fuzzy\Fuzzification\Pertinence\Pertinence::getPertinence
     * @todo   Implement testGetPertinence().
     */
    public function testGetPertinence()
    {
        $object = $this->object->getPertinence();
        $this->assertInstanceOf('Fuzzy\Fuzzification\Pertinence\Trapezoid', $object);
    }

}
